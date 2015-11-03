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
     result = re.findall(r"<P style=.TEXT-INDENT: 2em.>([^<>]*)<\/P>",getHtml(url),re.M)
     artical =''
     for j in result:
         if len(j)<>0:
             j = j.replace("&#183;","")#去掉<STRONG>,换成"     "
             j = j.replace("<STRONG>","   ")#去掉<STRONG>,换成"     "
             j = j.replace("</STRONG>","   ")#去掉</STROGN>换成"     "
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
socket = urllib.urlopen("http://sports.qq.com/")#打开这个网页

#fout = file('qq_art_urls.txt','w')#要把这个链接写到这个文件中
IParser.feed(socket.read())#分析啦

reg = 'http://sports.qq.com/a/.*'#这个是用来匹配符合条件的链接，使用正则表达式匹配

pattern = re.compile(reg)

i = 0

for url in IParser.urls:#链接都存在urls里

    if pattern.match(url):
        artical = func(url)
        if len(artical)<>0:
           print artical
           i = i + 1
           f = open("qq/qq_sport/"+str(i) + '.txt','a+')
           f.write(artical)
           f.close()


