__author__ = 'minmin'
#coding:utf-8
import re,urllib,sgmllib

#根据当前的url获取html
def getHtml(url):
    page = urllib.urlopen(url)
    html = page.read()
    page.close()
    return html

#根据html获取想要的文章内容
def func(str):
     result =   re.findall(r"<p.*?>([^<>]*)</p>",getHtml(url),re.M)
     artical =''

     for j in result:
         if len(j)<>0:
             j = j.replace("<strong>","    ")
             j = j.replace("</strong>","    ")
             j = j.replace("<br>","   ")
             j = j.replace("&nbsp;"," ")
             j = j.replace("&ldquo;"," ")
             j = j.replace("&rdquo;"," ")
             j = j.replace("&middot;"," ")
             artical = artical + j + '\n'
     return  artical

#html链接的标签是“a”，链接的属性是“href”，也就是要获得html中所有tag=a，attrs=href 值。
class URLPaser(sgmllib.SGMLParser):
    def reset(self):
        sgmllib.SGMLParser.reset(self)
        self.urls = []

    def start_a(self,attrs):
        href = [v for k,v in attrs if k == 'href']
        if href:
            self.urls.extend(href)

IParser = URLPaser()
socket = urllib.urlopen("http://www.cnta.gov.cn/xxfb/xxfb_dfxw/")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://www.cnta.gov.cn/xxfb/xxfb_dfxw/2015.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
i = 0
url2 = []
for url in IParser.urls:#链接都存在urls里
    url = "http://www.cnta.gov.cn/xxfb/xxfb_dfxw"+url
    url = url.replace("dfxw.","dfxw")
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("cnta_travel/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()

IParser = URLPaser()
socket = urllib.urlopen("http://www.cnta.gov.cn/xxfb/xxfb_dfxw/index_1.shtml")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://www.cnta.gov.cn/xxfb/xxfb_dfxw/2015.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://www.cnta.gov.cn/xxfb/xxfb_dfxw"+url
    url = url.replace("dfxw.","dfxw")
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("cnta_travel/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://www.cnta.gov.cn/xxfb/xxfb_dfxw/index_2.shtml")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://www.cnta.gov.cn/xxfb/xxfb_dfxw/2015.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://www.cnta.gov.cn/xxfb/xxfb_dfxw"+url
    url = url.replace("dfxw.","dfxw")
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("cnta_travel/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://www.cnta.gov.cn/xxfb/xxfb_dfxw/index_3.shtml")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://www.cnta.gov.cn/xxfb/xxfb_dfxw/2015.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://www.cnta.gov.cn/xxfb/xxfb_dfxw"+url
    url = url.replace("dfxw.","dfxw")
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("cnta_travel/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://www.cnta.gov.cn/xxfb/xxfb_dfxw/index_4.shtml")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://www.cnta.gov.cn/xxfb/xxfb_dfxw/2015.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://www.cnta.gov.cn/xxfb/xxfb_dfxw"+url
    url = url.replace("dfxw.","dfxw")
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("cnta_travel/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://www.cnta.gov.cn/xxfb/xxfb_dfxw/index_5.shtml")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://www.cnta.gov.cn/xxfb/xxfb_dfxw/2015.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://www.cnta.gov.cn/xxfb/xxfb_dfxw"+url
    url = url.replace("dfxw.","dfxw")
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("cnta_travel/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()