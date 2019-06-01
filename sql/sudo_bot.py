#Server command and function to required data from server
#copyright (C) 2018  Oppe Luis
#
#This program is free software: you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation, either version 3 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#but WITHOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#
#You should have received a copy of the GNU General Public License
#along with this program.  If not, see <http://www.gnu.org/licenses/>.

import sys
import os
import subprocess
import ConfigParser
import ast
from telegram.ext import Updater, CommandHandler, MessageHandler, Filters, InlineQueryHandler, CallbackQueryHandler
from telegram import InlineQueryResultArticle, ChatAction, InputTextMessageContent, InlineKeyboardButton, InlineKeyboardMarkup, ParseMode
import time
import logging
import pymysql
import gzip
import shutil

logging.basicConfig(format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
						level=logging.INFO)

class BotServerMaintenence(object):
	def __init__(self):
		self.Config   = None
		self.dirpath  = os.path.dirname(os.path.abspath(__file__))
		self.read_config()
		self.commands = []


		self.updater  = Updater(self.ConfigSectionMap("SERVER_CONFIG")['telegramtoken'])
		#Enabled or disble command for validaction sub-parm send in execute
		self.disabled_command = self.ConfigSectionMap("SERVER_CONFIG")['enabledcommand'].split(',')
		self.enabled_command = self.ConfigSectionMap("SERVER_CONFIG")['permitedcommand'].split(',')
		self.enabled_user = self.ConfigSectionMap("SERVER_CONFIG")['authorizeusers'].split(',')

		self.dispatcher = self.updater.dispatcher
		self.logger     = logging.getLogger(__name__)
		self.commands   = {'status':'systemctl status {}',
							'start': 'systemctl start {}',
							'disc_usage': 'df -m',
							'memory_usage': 'free -m',
							'restart': 'systemctl restart {}',
							'renew_cert': 'certbot renew',
							'status_cert': 'certbot certificates',
							'get_log': 'tail -n10000 '+self.ConfigSectionMap("SERVER_CONFIG")['serverlog']+' | grep {}',
							'backup_db': 'sh /root/backups.sh {}',
							'statics': 'sh /root/statics.sh',
							'unauthorized': 'awk \'($9 ~ /401/)\' /var/log/nginx/access.log | awk \'{print $7 " " $1}\' | sort | uniq -c | sort -rn'}

	def error(self, bot, update, error):
		self.logger.warn('Update "%s" caused error "%s"' % (update, error))

	def build_menu(self,
				buttons,
				n_cols,
				header_buttons=None,
				footer_buttons=None):
		menu = [buttons[i:i + n_cols] for i in range(0, len(buttons), n_cols)]
		if header_buttons:
			menu.insert(0, header_buttons)
		if footer_buttons:
			menu.append(footer_buttons)
		return menu

	def databases_list(self, bot, update):
		buttons=[]
		bot.sendChatAction(chat_id=update.message.chat_id,
					action=ChatAction.TYPING)
		conn = pymysql.connect( host=self.ConfigSectionMap("DB")['hostname'], user=self.ConfigSectionMap("DB")['username'], passwd=self.ConfigSectionMap("DB")['password'], db='' )
		cur = conn.cursor()
		cur.execute( "SHOW DATABASES" )
		for database in cur.fetchall() :
			buttons.append(InlineKeyboardButton("{}".format(database[0]), callback_data="backup_db {}".format(database[0])))

		conn.close()
                if len(buttons) > 0:
                       reply_markup = InlineKeyboardMarkup(self.build_menu(buttons, n_cols=1))
                       bot.sendMessage(chat_id=update.message.chat_id, text = "<b>Select Db for backup</>", reply_markup=reply_markup, parse_mode=ParseMode.HTML)
                else:
                       bot.sendMessage(chat_id=update.message.chat_id, text = "No databases found")

	def ip_list(self, bot, update):
		buttons=[]
		bot.sendChatAction(chat_id=update.message.chat_id,
					action=ChatAction.TYPING)
                output = subprocess.Popen('awk \'($9 ~ /401/)\' /var/log/nginx/access.log | awk \'{print $7 " " $1}\' | sort | uniq -c | sort -rn', shell=True, stdout=subprocess.PIPE, stderr=subprocess.STDOUT)
                stdout_list = output.communicate()[0].split('\n')

                for line in stdout_list:
                    str_ip = line.strip().split(' ')
		    	if len(str_ip) > 2 :
		    		buttons.append(InlineKeyboardButton("{}".format(str_ip[0]+"-"+str_ip[2]), callback_data="unauthorized {}".format(str_ip[2])))
                if len(buttons) > 0:
                       reply_markup = InlineKeyboardMarkup(self.build_menu(buttons, n_cols=1))
                       bot.sendMessage(chat_id=update.message.chat_id, text = "<b>IP for block with IPTABLES</>", reply_markup=reply_markup, parse_mode=ParseMode.HTML)
                else:
                       bot.sendMessage(chat_id=update.message.chat_id, text = "No IP-LOG found")

	def read_config(self):
		self.Config = ConfigParser.ConfigParser()
		self.Config.read(self.dirpath+"/bot_server_maintenence.ini")

	def start(self, bot, update):
		bot.sendChatAction(chat_id=update.message.chat_id,
					action=ChatAction.TYPING)
		bot.sendMessage(chat_id=update.message.chat_id, text="Hi I'm a <b>{}</b> Server!".format(self.ConfigSectionMap("SERVER_CONFIG")['servername']),
					parse_mode=ParseMode.HTML )
		self.logger.warn('In start command waiting "%i"!!!!' % (update.message.from_user.id))
		print(self.enabled_user[0])
		if any(str(update.message.from_user.id) in s for s in self.enabled_user):
			button_list = [
				InlineKeyboardButton("Status Nginx", callback_data="status nginx"),
				InlineKeyboardButton("Status Mysql", callback_data="status mysql"),
				InlineKeyboardButton("Disck Usage", callback_data="disc_usage"),
				InlineKeyboardButton("Memory Usage", callback_data="memory_usage"),
				InlineKeyboardButton("SSL status", callback_data="status_cert"),
				InlineKeyboardButton("Log", callback_data="get_log"),
				InlineKeyboardButton("Server Statics", callback_data="statics"),
				InlineKeyboardButton("Log 401", callback_data="unauthorized"),
			]
			reply_markup = InlineKeyboardMarkup(self.build_menu(button_list, n_cols=2))
			bot.sendMessage(chat_id=update.message.chat_id, text = "<b>Select option</>", reply_markup=reply_markup, parse_mode=ParseMode.HTML)

			bot.sendChatAction(chat_id=update.message.chat_id,
								action=ChatAction.TYPING)
			time.sleep(1)
			bot.sendMessage(chat_id=update.message.chat_id,
					text="<b>For execute special command or name service</b>\nYou can use /execute\n<b>*status</b>\n<b>*disc_usage</b>\n<b>*status_cert</b>\n<b>*get_log</b>\n<b>*backup_db</b>\n<b>statics - New! See statis server</b>\nAnd parm for name service or other parm.\nExample\n/execute status mysdlq\nYou can use /databases for create a bkp",
					parse_mode=ParseMode.HTML)
		else:
			bot.sendChatAction(chat_id=update.message.chat_id,
						action=ChatAction.TYPING)
			bot.sendMessage(chat_id=update.message.chat_id,
			text='Enabled user for use these options: '+str(update.message.from_user.id))

	def ejecutar_comando(self, bot, update, command):
		comando = ''
		servicio = ''
		if any(str(update.message.from_user.id) in s for s in self.enabled_user):
			bot.sendChatAction(chat_id=update.message.chat_id,
						action=ChatAction.TYPING)
			bot.sendMessage(chat_id=update.message.chat_id,
			text='Enabled user for use these options: '+str(update.message.from_user.id))
			return
		if len(command) > 1:
			comando = command[0]
			servicio = command[1]
		else:
			comando = command[0]
		try:
			print('COMANDO A EJECUTAR 111: '+comando)
			print(self.commands[comando].format(servicio));
			output = subprocess.Popen(self.commands[comando].format(servicio), shell=True, stdout=subprocess.PIPE, stderr=subprocess.STDOUT)
			stdout_list = output.communicate()[0].split('\n')

			bot.sendMessage(chat_id=update.message.chat_id,text="<b>Response {}</b>".format(self.ConfigSectionMap("SERVER_CONFIG")['servername']),parse_mode=ParseMode.HTML)
			message=""
			for line in stdout_list:
				message = message+"\n"+line

			if comando == "get_log":
				photo = open(('/root/log_to.send').encode('utf-8'), 'r')
				bot.send_file(chat_id=update.message.chat_id, file=photo)
			if comando == "statics":
				bot.sendMessage(chat_id=update.message.chat_id,text="For see statics visit: {}".format(self.ConfigSectionMap("SERVER_CONFIG")['urlstatics']))
			bot.sendMessage(chat_id=update.message.chat_id,text=message)
		except KeyError:
				bot.sendMessage(chat_id=update.message.chat_id,
				text='1 - Command send not supported: %s' % (KeyError))


	def execute(self, bot, update, args):
		self.logger.warn('Execute commands....')
		services=''
		if len(args) > 1:
			services = args[1]
		if services == '':
			bot.sendChatAction(chat_id=update.message.chat_id,
						action=ChatAction.TYPING)
			bot.sendMessage(chat_id=update.message.chat_id,
			text='Command required command + service name')
			return
		print(services)
		if any(services in s for s in self.disabled_command):
			print('bloqueando comando')
			bot.sendChatAction( chat_id= update.message.chat_id,
							action = ChatAction.TYPING)
			bot.sendMessage(chat_id = update.message.chat_id,
							text='Security risk for command. Enabled operation')
			return

		try:
			user_id = update.message.from_user.id
			command = update.message.text
			inline = False
		except AttributeError:
			# Using inline
			user_id = update.inline_query.from_user.id
			command = update.inline_query.query
			inline = True
		#Only my user can accee to server
		if any(str(user_id) in s for s in self.enabled_user):
			for command in args:
				bot.sendChatAction(chat_id=update.message.chat_id,
							action=ChatAction.TYPING)
				try:
					message=""
					if command != "get_log":
						output = subprocess.Popen(self.commands[command].format(services), shell=True, stdout=subprocess.PIPE, 							stderr=subprocess.STDOUT)
						stdout_list = output.communicate()[0].split('\n')
                	                        for line in stdout_list:
        	                                        message = message+"\n"+line
						bot.sendMessage(chat_id=update.message.chat_id,text="<b>Response {}</b>".format(self.ConfigSectionMap("SERVER_CONFIG")['servername']),parse_mode=ParseMode.HTML)
	                                        bot.sendMessage(chat_id=update.message.chat_id,text=message)
					else:
						self.logger.warn('Ejecutando comando: '+self.commands[command].format(services));
						if command == "get_log":
							exists =  os.path.isfile('/tmp/log.txt')
						if exists:
							os.remove('/tmp/log.txt')
						#DROP FILE
						exists = os.path.isfile('/tmp/log.txt.gz')
						if exists:
							os.remove('/tmp/log.txt.gz')
						with open('/tmp/log.txt', "wr") as log:
							subprocess.Popen(self.commands[command].format(services), shell=True, universal_newlines=True, stdout=log).wait()
							log.close()
							subprocess.Popen('gzip /tmp/log.txt', shell=True, stdout=subprocess.PIPE, stderr=subprocess.STDOUT).wait()
							bot.send_document(chat_id=update.message.chat_id, document=open('/tmp/log.txt.gz', 'rb'))
				except KeyError:
						bot.sendMessage(chat_id=update.message.chat_id,
						text='2-Command send not supported: %s' % (command))

	def button(self, bot, update):
		query = update.callback_query
		command = query.data.split(" ")

		self.logger.warn('Comando a ejecutar "%s"!!!!' % query.data)

		bot.sendChatAction(chat_id=query.message.chat_id,
					action=ChatAction.TYPING)
		bot.sendMessage(chat_id=query.message.chat_id,
					text='Excuting command: %s' % (query.data))
		self.ejecutar_comando(bot, query, command)

	def ConfigSectionMap(self, section):
		dict1 = {}
		options = self.Config.options(section)
		for option in options:
			try:
				dict1[option] = self.Config.get(section, option)
				if dict1[option] == -1:
					DebugPrint("skip: %s" % option)
			except:
				print("exception on %s!" % option)
				dict1[option] = None
		return dict1


	def run_bot(self):
		start_handler = CommandHandler('start', self.start)
		#COMMAND DOR BOT
		self.dispatcher.add_handler(CommandHandler('start', self.start))
		self.dispatcher.add_handler(CommandHandler('databases', self.databases_list))
        self.dispatcher.add_handler(CommandHandler('iphacks', self.ip_list))
		self.dispatcher.add_handler(CommandHandler('execute',self.execute, pass_args=True))
		self.dispatcher.add_handler(CallbackQueryHandler(self.button))
		self.dispatcher.add_error_handler(self.error)
		self.updater.start_polling()
		self.updater.idle()


if __name__ == '__main__':
	# TODO: Show usage
	bot_service = BotServerMaintenence()
	bot_service.run_bot();
