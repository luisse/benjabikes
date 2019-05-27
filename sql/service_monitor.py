#!/bin/python
#
# Copyright 2018 Oppe Luis Sebastian
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#    http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.
#
# Usage: monitor_process.py
# Changed:
#        soppe: add proccesso so send message to telegram for live data.
#               How to install:
#                              https://pypi.org/project/telegram-send/
#        add file configs for message and config server for can use in distintc servers
#
# Example(crontab, every 5 minutes):
# */5 * * * * /root/bin/monitor_service.py /dev/null 2>&1
#

import sys
import os
import subprocess
import telegram_send
import ConfigParser

class ServiceMonitor(object):


    def __init__(self):
        self.Config = None
        self.dirpath = os.path.dirname(os.path.abspath(__file__))
        self.read_config()
        self.service = ''

    def is_service_active(self):
        cmd = '/bin/systemctl list-unit-files | grep {} '.format(self.service)
        proc = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE)
        stdout_list = proc.communicate()[0].split('\n')
        for line in  stdout_list:
            if self.service in line:
                if 'enabled' in line:
                    return True
        return False

    def is_active(self):
        if not self.is_service_active():
            telegram_send.send( [ self.ConfigSectionMap("SERVER_MESSAGE")['mensajeorigen'] + self.ConfigSectionMap("SERVER_CONFIG")['servername'] ], self.ConfigSectionMap("SERVER_CONFIG")['telegramconf'])
            telegram_send.send( [ self.ConfigSectionMap("SERVER_MESSAGE")['servicenotexists'].format(self.service) ] , self.ConfigSectionMap("SERVER_CONFIG")['telegramconf'])
            return True
        """Return True if service is running"""
        cmd = '/bin/systemctl status %s.service' % self.service
        proc = subprocess.Popen(cmd, shell=True,stdout=subprocess.PIPE)
        stdout_list = proc.communicate()[0].split('\n')

        for line in stdout_list:
            if 'Active:' in line:
                if '(running)' in line:
                    return True
        message = self.ConfigSectionMap("SERVER_MESSAGE")['mensajeorigen']+self.ConfigSectionMap("SERVER_CONFIG")['servername']
        message = message.format(self.service)
        telegram_send.send([message], self.ConfigSectionMap("SERVER_CONFIG")['telegramconf'])
        telegram_send.send([self.ConfigSectionMap("SERVER_MESSAGE")['servicedown'].format(self.service)], self.ConfigSectionMap("SERVER_CONFIG")['telegramconf'])
        self.sendLog()
        return False

    def start(self):
        cmd = '/bin/systemctl start %s.service' % self.service
        proc = subprocess.Popen(cmd, shell=True,stdout=subprocess.PIPE)
        proc.communicate()
        self.status()

    def status(self):
        cmd = '/bin/systemctl status %s.service' % self.service
        proc = subprocess.Popen(cmd, shell=True,stdout=subprocess.PIPE)
        stdout_list = proc.communicate()[0].split('\n')
        for line in stdout_list:
            if 'Active' in line:
                if '(running)' in line:
                    telegram_send.send(['Restart {} is ok!'.format(self.service)],self.ConfigSectionMap("SERVER_CONFIG")['telegramconf'])
                    telegram_send.send([line],self.ConfigSectionMap("SERVER_CONFIG")['telegramconf'])
                    return True

        telegram_send.send([self.ConfigSectionMap("SERVER_MESSAGE")['servicerestart']],self.ConfigSectionMap("SERVER_CONFIG")['telegramconf'])
        self.sendLog()
	return False

    def read_config(self):
        self.Config = ConfigParser.ConfigParser()
        print(self.dirpath+"/service_monitor.ini")
        self.Config.read(self.dirpath+"/service_monitor.ini")

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

    def sendLog(self):
        cmd  = 'tail -n100 %s | grep %s' % ( self.ConfigSectionMap("SERVER_CONFIG")['serverlog'], self.service.replace('_pre','') )
        proc = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE)
        stdout_list = proc.communicate()[0].split('\n')
        telegram_send.send(stdout_list, self.ConfigSectionMap("SERVER_CONFIG")['telegramconf'])

    def getServices(self):
        services = self.ConfigSectionMap("SERVER_CONFIG")['servicesstatus'].split(',')
        output = subprocess.Popen('systemctl list-unit-files | grep enabled | grep {}'.format(self.ConfigSectionMap("SERVER_CONFIG")['enviroment']), shell=True, stdout=subprocess.PIPE, stderr=subprocess.STDOUT)
        stdout_list = output.communicate()[0].split('\n')
        #Load all service in system if exists?
        for line in stdout_list:
            parse_line = line.split(' ')
	    print(parse_line[0].strip())
            services.append(parse_line[0].strip().replace('.service',''))

        for service in services:
            self.service = service
            print(self.service)
            if self.service != '':
                if not self.is_active():
                    self.start()
            else:
                print('No Services found!')


if __name__ == '__main__':
    # TODO: Show usage
    monitor = ServiceMonitor()
    monitor.getServices()
