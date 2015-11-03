<?php include_once $_SERVER['DOCUMENT_ROOT'].'/corpus/WebPage/Util.php';?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<!--                <th><div id="MtitleChar"><a href="?Untitled">上传</a></div></th>-->
                <th><div id="MtitleChar"><a href="?selectTraning">查询</a></div></th>
                <th><div id="MtitleCharF"><a href="?judgement">判断</a></div></th>
            </tr>
        </table>
    </div>
</div>
<div id="judgeBackground">
    <div id="judgeBackgroundLeft">
        <div id="judgeBackgroundLeftEdit">
            <!--上传文件-->
            <div id="judgeUpLoadFile">
                <form action="Index.php" method="post" enctype="multipart/form-data">
                    <input type="text" id="judgeUploadFileTxt" name="textfield"/>
                    <input type="button" id="judgeUploadFileLookBtn" value='浏览...' />
                    <input type="file" id="judgeUploadFileFile" name="uploadfile" value="upload file" onchange="document.getElementById('judgeUploadFileTxt').value=this.value"/>
                    <input type="submit" id="judgeUploadFileBtn" name="action" value="判断"/>
                </form>
            </div>
            <div id="judgeShowFile">
                <div id="judgeShowFileDis"></div>
                <?php if(count($_SESSION['fileName'])>1):?>
                    <?php foreach($_SESSION['fileName'] as $item):?>
                        <div id="judgeShowFileContent">
                            <?php htmlout($item[0])?>  <?php htmlout($item[2])?>
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
            </div>
        </div>
    </div>
    <div id="judgeBackgroundRight">

    </div>
</div>

</body>
</html>