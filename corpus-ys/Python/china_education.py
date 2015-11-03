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
socket = urllib.urlopen("http://edu.china.com/matric/")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)
i = 0
url2 = []
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_1.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_2.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_3.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_4.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_5.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()




IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_6.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_7.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_8.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_9.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_10.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()




IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_11.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_12.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_13.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_14.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()




IParser = URLPaser()
socket = urllib.urlopen("http://edu.china.com/matric/index_15.html")#打开这个网页
IParser.feed(socket.read())#分析啦
reg = 'http://edu.china.com/matric/daodu/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配
pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://edu.china.com"+url
    if pattern.match(url):
        if url not in url2:
            url2.append(url)
        #url = url.replace(".html","_all.html#page_2")
            print url
            artical = func(url)
            print artical
            if len(artical)<>0:
                  i = i + 1
                  f = open("china_news/Education/"+str(i) + '.txt','a+')
                  f.write(artical)
                  f.close()