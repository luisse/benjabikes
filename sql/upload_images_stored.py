#Upload image to ftp server, optimize images for use in opencart or wordpress
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

#mywidth = 300

#img = Image.open('someimage.jpg')
#wpercent = (mywidth/float(img.size[0]))
#hsize = int((float(img.size[1])*float(wpercent)))
#img = img.resize((mywidth,hsize), PIL.Image.ANTIALIAS)
#img.save('resized.jpg')
#https://opensource.com/life/15/2/resize-images-python


import os
import sys
import ConfigParser
from ftplib import FTP
from PIL import Image, ImageFile
from resizeimage import resizeimage
import shutil
import logging

logging.basicConfig(filename='uploader.log', format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
						level=logging.INFO)


ImageFile.LOAD_TRUNCATED_IMAGES = True

class UploadImages(object):
	def __init__(self):
		self.Config   = None
		self.dirpath  = os.path.dirname(os.path.abspath(__file__))
		self.read_config()
		self.connected = False
		self.basewidth  = 600;

		
		
		self.files = []
		self.path  = self.ConfigSectionMap("UPLOADER")['pathimages']
		self.path_optimize = self.ConfigSectionMap("UPLOADER")['pathoptimize']
		try:
			self.ftp   = FTP( self.ConfigSectionMap("UPLOADER")['ftpserver']);
			self.ftp.login( self.ConfigSectionMap("UPLOADER")['ftpuser'], self.ConfigSectionMap("UPLOADER")['ftppassword']);
		except Exception, e:
			logging.critical("Process can't connect to remote server: %s", e)
			sys.exit()	
	
	def read_config(self):
		self.Config = ConfigParser.ConfigParser()
		self.Config.read(self.dirpath+"/uploader_image.ini")

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

	def read_dir(self):
		for r, d, f in os.walk(self.path):
			for file in f:
				if "upload" in r:
					logging.info('Leyendo imagenes:'+self.path+'/upload/'+file)
					self.files.append({'path': os.path.join(r, file), 'file_name': file})

	def optimizeImages(self):
		logging.info('Image risize...')
		for f in self.files:
			is_valid = False
			with Image.open(f['path']) as image:
				wpercent = (self.basewidth/float(image.size[0]))
				hsize = int((float(image.size[1]) * float(wpercent)))
				#cover = resizeimage.resize_cover(image, [self.basewidth, hsize])
				logging.info('Image optimized: %s', self.path_optimize+'/'+f['file_name'])
				cover = image.resize((self.basewidth, hsize), Image.ANTIALIAS)
				cover.save(self.path_optimize+'/'+f['file_name'], image.format)

	def upload_images(self):
		for f in self.files:
			logging.info('Uploading file from: %s', f['file_name'])
			with open(self.path_optimize+'/'+f['file_name'], 'r') as fimg:  
	    			self.ftp.storbinary('STOR %s' % f['file_name'], fimg)
			#if os.path.exists(self.path_optimize+'/'+f['file_name']):
			#	os.remove(self.path_optimize+'/'+f['file_name'])
			#else:
			#	logging.critical("File not exists: %s", self.path_optimize+'/'+f['file_name'])
			"""Move image processed"""
			if os.path.exists(f['path']):
				shutil.move(f['path'], self.path+'/process/'+f['file_name'])
		self.ftp.quit()


if __name__ == '__main__':
	# TODO: Show usage
	uploadImage= UploadImages()
	uploadImage.read_dir()
	uploadImage.optimizeImages()
	uploadImage.upload_images()
	
