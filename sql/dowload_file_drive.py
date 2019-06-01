#Get File from googledrive python
#copyright (C) 2019  Oppe Luis
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
from __future__ import print_function
import pickle
import os.path
import io
import ConfigParser
import logging
import googleapiclient.errors
import smtplib, ssl
from googleapiclient.discovery import build
from google_auth_oauthlib.flow import InstalledAppFlow
from google.auth.transport.requests import Request
from apiclient import errors
from apiclient import http
from apiclient.http import MediaIoBaseDownload
from email.mime.multipart import MIMEMultipart


SCOPES = ["https://www.googleapis.com/auth/drive"]

logging.basicConfig(filename='downloader_files.log', format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
						level=logging.INFO)
logging.getLogger('googleapicliet.discovery_cache').setLevel(logging.ERROR)						

class DowloadCsvFile(object):
	def __init__(self):
		self.port	  = 465
		self.context  = ssl.create_default_context()
		self.Config   = None
		self.dirpath  = os.path.dirname(os.path.abspath(__file__))
		self.creds    = None
		self.service  = None
		self.read_config()
		self.connectDrive()
		
	def read_config(self):
		self.Config = ConfigParser.ConfigParser()
		self.Config.read(self.dirpath+"/downloader_csv.ini")

	def ConfigSectionMap(self, section):
		dict1 = {}
		options = self.Config.options(section)
		for option in options:
			try:
				dict1[option] = self.Config.get(section, option)
				if dict1[option] == -1:
					DebugPrint("skip: %s" % option)
			except:
				logging.error("exception on %s!", option)
				dict1[option] = None
		return dict1		

	def connectDrive(self):
		pickleFile = self.ConfigSectionMap("TOKENS")['pathtoken']+'/token.pickle';
		if os.path.exists('token.pickle'):
			with open('token.pickle', 'rb') as token:
				self.creds = pickle.load(token)
		if not self.creds or not self.creds.valid:
			if self.creds and self.creds.expired and self.creds.refresh_token:
				self.creds.refresh(Request())
			else:
				flow  = InstalledAppFlow.from_client_secrets_file(self.ConfigSectionMap("TOKENS")['pathtoken']+'/credentials.json', SCOPES)
				self.creds = flow.run_local_server()
			with open('token.pickle','wb') as token:
				pickle.dump(self.creds, token)
		try:				
			self.service = build('drive', 'v3', credentials = self.creds)
		except oauth2client.client.HttpAccessTokenRefreshError as e:
			self.emailSend(e.message)
			logging.critical("Process can't connect to remote server: %s", e.message)
		except googleapiclient.errors.HttpError as e:
			reason = str(e._get_reason).split("\"")[-2]
			logging.critical("Error when try connect to server: %s", reason)
			self.emailSend(reason)

	def emailSend(self, message):
		local_message = MIMEMultipart("alternative")
		local_message["Subject"] = "RENTOKIL-BACKEND ERROR"
		local_message["From"]    = 'monitor.viveogroup@gmail.com'
		local_message["To"]      = self.ConfigSectionMap("EMAILS")['dest']


		server = smtplib.SMTP_SSL(self.ConfigSectionMap("EMAILS")['servermail'], self.port)
		try:
			server.login(self.ConfigSectionMap("EMAILS")['usermail'], self.ConfigSectionMap("EMAILS")['password'])
			local_message = "<p><span style='color: #808080;'><strong>Dowload csv from rentokil report:</strong></span>"+message
			server.sendmail('importcsv@primivogroup.com.au', self.ConfigSectionMap("EMAILS")['dest'], message)
			server.quit()
		except SMTPException as e:
			loggin.critical("Whe can not connect to email service")

	def dowloadFiles(self):
		results = self.service.files().list(
				pageSize = 10, 
				fields="nextPageToken, files(id, name)",
							q ="'"+self.ConfigSectionMap("RENTOKIL")['remotefolderid']+"' in parents and  trashed = false").execute()
		items = results.get('files', [])
		if not items:
			logging.info("Proccess not found files to dowload")
		else:
			for item in items:
				logging.info('Process File: '+format(item['name']))
				print (u'{0} ({1})'.format(item['name'], item['id']))
				self.getfiles(item['id'], item['name'].replace(' ','_'))
	
	def getfiles(self, file_id, file_name):
		self.emailSend("Processing file from rentokil")
		try:
			request = self.service.files().get_media(fileId=file_id)
			fh = io.BytesIO()
			downloader = MediaIoBaseDownload(fh, request)
			done = False
			while done is False:
				status, done = downloader.next_chunk()
				print ("Download %d%%." % int(status.progress() * 100))
			with io.open(self.ConfigSectionMap("RENTOKIL")['csvnewpath']+'/'+file_name,'wb') as f:
				fh.seek(0)	
				f.write(fh.read())
		except errors.HttpError, error:
			print(error)		
			self.emailSend(error)
	
if __name__ == '__main__':
	dowloadcsvfile = DowloadCsvFile()
	dowloadcsvfile.dowloadFiles()

