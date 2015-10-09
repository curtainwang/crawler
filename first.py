#encoding:UTF-8
import urllib2, urllib, HTMLParser, re
from urllib import urlencode
from urllib import urlparse
url = "http://www.baidu.com"
data = urllib2.urlopen(url).read()
print("This should be the baidu's website's code")

a=urllib2.urlopen(url)
type(a)

#
data={} #
data['word']='Jecvay Notes'

url="http://www.baidu.com/s?"
data=urllib.urlencode(data)
url_values=urllib.urlparse(data)

url_full=url+url_values

data=urllib2.urlopen(url_full).read()
data=data.decode('UTF-8')
printf(data)
