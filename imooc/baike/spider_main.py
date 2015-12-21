# coding:utf-8

import urllib2

from baike import url_manager, html_downloader, html_parser, html_outputer

class SpiderMain(object):
	"""docstring for SpiderMain"""
	def __init__(self):
		self.urls = url.manager.UrlManager()
		self.downloader = html_downloader.HtmlDownloader()
		self.parser = html_parser.HtmlParser()
		self.outputer = html_outputer.HtmlOupter()
		
	def craw(self, root_url):
		self.urls.add_new_utl(root_url)
		while self.urls.has_new_url():
			new_url = self.url



if __name__=="__main__":
    root_url = "http://baike.baidu.com/view/21087.htm"
    obj_spider = SpiderMain()
    obj_spider.craw(root_url)
