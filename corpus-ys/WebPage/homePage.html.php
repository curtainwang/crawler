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
                <th><div id="MtitleCharF"><a href="?homePage">首页</a></div></th>
<!--                <th><div id="MtitleChar"><a href="?Untitled">上传</a></div></th>-->
                <th><div id="MtitleChar"><a href="?selectTraning">查询</a></div></th>
                <th><div id="MtitleChar"><a href="?judgement">判断</a></div></th>
            </tr>
        </table>
    </div>
</div>

<div id="homebackground">
    <div id="homeRightFrame">
        <div id="homeRightFrameTitle">
           <label>正确率:</label>
        </div>
        <div id="homeRightFrameTitleMain">
            <?php foreach($trainingSetAccuracy as $item):?>
                <div id="homeRightFrameContent">
                    <?php htmlout($item[0])?>: <?php htmlout($item[1])?>
                </div>
            <?php endforeach;?>
        </div>
    </div>

</div>

</body>
</html>