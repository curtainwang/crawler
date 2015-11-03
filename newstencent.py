__author__ = 'minmin'
#coding=utf-8
import re,urllib,sgmllib
def getHtml(url):
    page = urllib.urlopen(url)
    html = page.read()
    page.close()
    return html
url = "http://cul.qq.com/a/20151021/008882.htm"
htmltext="<P style=.TEXT-INDENT: 2emx>联书店、《观察》杂志纷纷北上，还过去了一大批杭州等二线城市。</P>"

def func(str):

     n = re.findall(r"<P style=.TEXT-INDENT: 2em.>(.*?)<\/P>",htmltext,re.M)   #htmltext  ===> getHtml(url)

     artical =''
     for j in n:
         if len(j)<>0:
             j = j.replace("<STRONG>","   ")
             j = j.replace("</STRONG>","   ")
             artical = artical + j + '\n'
     return  artical 
    # print n
artical = func(url)
print artical

