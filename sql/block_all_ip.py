#!/usr/bin/env python
#UPGRADE PRIMIVO BACKEND
#sudo iptables -I INPUT 2 -p tcp -s 181.105.125.207 -j DROP -i eth0
import sys
import os
import optparse
import subprocess
import os.path
import ast
import ipaddress
import socket

class bcolors:
	HEADER = '\033[95m'
	OKBLUE = '\033[94m'
	OKGREEN = '\033[92m'
	WARNING = '\033[93m'
	FAIL = '\033[91m'
	ENDC = '\033[0m'
	BOLD = '\033[1m'
	UNDERLINE = '\033[4m'


def msg_error(msg):
	print (bcolors.FAIL+'[ERROR] '+bcolors.ENDC+msg)
	sys.exit()

def msg_ok(msg):
	print (bcolors.OKGREEN+'[OK]   '+bcolors.ENDC+msg)    

def validate_user():
	uid_user = os.getegid();
	if uid_user != 0:
		msg_error("You need be super user for run this script")

def is_valid_ipv4_address(address):
    try:
        socket.inet_pton(socket.AF_INET, address)
    except AttributeError:  # no inet_pton here, sorry
        try:
            socket.inet_aton(address)
        except socket.error:
            return False
        return address.count('.') == 3
    except socket.error:  # not a valid address
        return False
    return True

#FUNCTION: kill all node app existing
def search_bad_user():
        msg_ok('Search bad user log and block these fucking users.')
        proc = subprocess.Popen(['lastb'], stdout = subprocess.PIPE)
        ip_list =  []
        ips=''
        for line in proc.stdout.readlines():
            array_list = line.split(" ")
            result = filter(lambda a: a.strip() != '', array_list)
            result = filter(lambda a: a.strip() != '\n', result)
            result = filter(lambda a: a.strip() != '\t', result)
            for l in result:
                res = is_valid_ipv4_address(l)
                if res:
                    if ips.find(l) == -1:
                        ips = l+'-'+ips
                        ip_list.append(l.strip())
        if len(ip_list) > 0:
                msg_ok('Bloqueando las IP recuperadas: '+str(len(ip_list)))
                subprocess.call(["iptables","-F"])
                subprocess.call(["iptables","-A","INPUT","-s",','.join(ip_list),"-j","DROP","-i","eth0"])


validate_user()      
search_bad_user()  
