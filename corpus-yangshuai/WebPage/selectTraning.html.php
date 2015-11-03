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
<!--     <th><div id="MtitleChar"><a href="?Untitled">上传</a></div></th>-->
     <th><div id="MtitleCharF"><a href="?selectTraning">查询</a></div></th>
     <th><div id="MtitleChar"><a href="?judgement">判断</a></div></th>
     </tr>
    </table>
    </div>
</div>

<!--选择训练集文件-->
<div id="traningSetF">
<div id="selectTraningSet">
    <div id="traningSetWord"></div>
<form action="Index.php" method="post">
    <select name="TrainingSet" id="traningSetSelect">
        <option value="">---请选择---</option>
        <?php foreach($trainingSetShowHTML as $item):?>
            <?php if($item[1] == 1):?>
                <option value="<?php htmlout($item[0]);?>" selected="selected"><?php htmlout($item[0]);?></option>
            <?php else:?>
                <option value="<?php htmlout($item[0]);?>"><?php htmlout($item[0]);?></option>
            <?php endif;?>
        <?php endforeach;?>
    </select>
    <input type="submit" name="action" value="提交">
</form>
</div>

<!--显示训练集文件-->
<div id="traningSetS">
<div id="traningSetSS">
<?php if(isset($trainingDataArr)):?>
<div id="ShowTraningSet">
    <?php foreach($trainingDataArr as $item):?>
        <?php htmlout($item);?>
        </br>
    <?php endforeach;?>

</div>

<div id="traningSetT">
<div id="pageFooter">
    <form action="Index.php" method="post">

        <?php foreach($namedPage as $item):?>
            <?php if($item[1] == 1):?>
                <input id="footerBtn" type="submit" name="action" disabled="disabled" value="<?php htmlout($item[0]);?>">
            <?php else:?>
                <input id="footerBtn" type="submit" name="action" value="<?php htmlout($item[0]);?>">
            <?php endif;?>
        <?php endforeach;?>

        <label>共<?php htmlout($_SESSION['$trainingSetArr'][1])?>页</label>
        <label>到第</label>

        <select name="footerSkipPage" id="footerSkipPage">
            <?php foreach($trainingFooterPageArr as $item):?>
                <?php if($item[1] == 1):?>
                    <option value="<?php htmlout($item[0]);?>" selected="selected"><?php htmlout($item[0]);?></option>
                <?php else:?>
                    <option value="<?php htmlout($item[0]);?>"><?php htmlout($item[0]);?></option>
                <?php endif;?>
            <?php endforeach;?>
        </select>

        <input id="footerBtn" type="submit" name="action" value="确定">

    </form>
</div>
</div>
<?php endif;?>
</div>
</div>
</div>

</body>
</html>