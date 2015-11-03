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
     result= re.findall(r"<div>(.*?)</div>",getHtml(url),re.M)
     artical =''
     for j in result:
         if len(j)<>0:
             j = j.replace("<strong>","   ")
             j = j.replace("</strong>","   ")
             j = j.replace("<br>","   ")
             j = j.replace("<img src=\"(.*?)\" alt=\"(.*?)\">","   ")
             #temp = re.findall(r"<img src=\"(.*?)\" alt=\"(.*?)\">",j,re.M)

             temp = re.findall(r"<img.(.*?)>",j,re.M)
             if temp ==[]:
                 temp2 =  re.findall(r"<span.(.*?)>",j,re.M)
                 if temp2==[]:
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
socket = urllib.urlopen("http://news.cncn.net/list_2836")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)

i = 0
url2 = []
for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-2")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-3")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-4")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()




IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-5")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-6")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-7")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-8")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-9")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-10")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-11")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()




IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-12")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-13")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-14")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-15")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-16")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-17")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-18")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)


for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-19")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)

for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()



IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-20")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)

for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-21")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)

for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-22")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-23")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)

for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-24")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-25")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-26")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)
for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()


IParser = URLPaser()
socket = urllib.urlopen("http://news.cncn.net/list_2836-27")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://news.cncn.net/c.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)

for url in IParser.urls:#链接都存在urls里
    url = "http://news.cncn.net" + url
    if pattern.match(url):
        if url not in url2:
            print url
            url2.append(url)
            artical = func(url)
            print artical
            if len(artical)<>0:
                 i = i + 1
                 f = open("newscn/"+ str(i) + '.txt','a+')
                 f.write(artical)
                 f.close()
