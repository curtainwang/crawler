<?php include_once $_SERVER['DOCUMENT_ROOT'].'/corpus/WebPage/Util.php';?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "
http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Unname</title>
</head>
<link rel="stylesheet" type="text/css" href="Untitled.css"/>
<body>

<div id="Mtitle">
    <div id="subMtitle">
    <table>    
     <tr>
     <th><div id="MtitleChar"><a href="?homePage">首页</a></div></th>
<!--     <th><div id="MtitleCharF"><a href="?Untitled">上传</a></div></th>-->
     <th><div id="MtitleChar"><a href="?selectTraning">查询</a></div></th>
     <th><div id="MtitleChar"><a href="?judgement">判断</a></div></th>
     </tr>
    </table>
    </div>
</div>

<div id="Mbackground">
<!--上传文件-->
<div id="upLoadFile">
    <form action="Index.php" method="post" enctype="multipart/form-data">
        <input type="text" id="uploadFileTxt" name="textfield"/> 
        <input type="button" id="uploadFileLookBtn" value='浏览...' />
        <input type="file" id="uploadFileFile" name="uploadfile" value="upload file" onchange="document.getElementById('uploadFileTxt').value=this.value"/>
        <input type="submit" id="uploadFileBtn" name="action" value="上传"/>
    </form>
</div>
</div>

</body>
</html>