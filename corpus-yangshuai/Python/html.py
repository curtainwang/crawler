__author__ = 'minmin'
#coding=utf-8
import re,urllib,sgmllib
def getHtml(url):
    page = urllib.urlopen(url)
    html = page.read()
    page.close()
    return html
url = "http://www.cnta.gov.cn/xxfb/xxfb_dfxw/201510/t20151029_750326.shtml"
def func(str):
     n =   re.findall(r"<p.*?>([^<>]*)</p>",getHtml(url),re.M)
     artical =''

     for j in n:
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
    # print n
artical = func(url)
f = open("success.txt","w+")
f.write(artical)
f.close()
print artical
