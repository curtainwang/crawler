<meta charset="utf-8">
<?php
session_start();
require_once "Util.php";
require_once "../Single_Judge.php";

//显示训练集的正确率
$trainingSetAccuracy = array(array(null, null));
$trainingSetAccuracy = array(
    array('经济', getTraningSetAccuracy('Economy')),
    array('教育', getTraningSetAccuracy('Education')),
    array('娱乐', getTraningSetAccuracy('Entertainment')),
    array('健康', getTraningSetAccuracy('Health')),
    array('军事', getTraningSetAccuracy('Military')),
    array('体育', getTraningSetAccuracy('Sport')),
    array('科技', getTraningSetAccuracy('Technology')),
    array('旅游', getTraningSetAccuracy('Travel')),
    array('总正确率', getTraningSetAllAccuracy()));

//显示训练集和测试集
$trainingSetShowHTML = array(array(null, null));
$trainingSetShowHTML = array(
    array('训练集 经济', 0 ),
    array('训练集 教育', 0 ),
    array('训练集 娱乐', 0 ),
    array('训练集 健康', 0 ),
    array('训练集 军事', 0 ),
    array('训练集 体育', 0 ),
    array('训练集 科技', 0 ),
    array('训练集 旅游', 0 ),
    array('测试集 经济', 0 ),
    array('测试集 教育', 0 ),
    array('测试集 娱乐', 0 ),
    array('测试集 健康', 0 ),
    array('测试集 军事', 0 ),
    array('测试集 体育', 0 ),
    array('测试集 科技', 0 ),
    array('测试集 旅游', 0 ));

if(isset($_GET['homePage']))
{
    include "homePage.html.php";
    exit();
}
if(isset($_GET['selectTraning']))
{
    include "selectTraning.html.php";
    exit();
}
if(isset($_GET['Untitled']))
{
    include "Untitled.html.php";
    exit();
}
if(isset($_GET['judgement']))
{
    include "judgement.html.php";
    exit();
}
if(!isset($_SESSION['fileName']))        //上传文件的名字，文件内容，以及匹配的结果
{
    $_SESSION['fileName'] = array(array(null, null, null));
    $_SESSION['fileNameId'] = 0;
}


//选择训练集类别 提交以后的操作
if (isset($_POST['action']) and ($_POST['action']=='提交'))
{
    $trainingSetArr = array(null);
    $trainingDataArr = array(null);
    $trainingSet = $_POST['TrainingSet'];
    $_SESSION['$trainingSetArr'] = chMatchEn($trainingSet);       //获取训练集类别和数目
    for($i=0; $i<count($trainingSetShowHTML); $i++)
    {
        if($trainingSetShowHTML[$i][0] == $trainingSet)
        {
            $trainingSetShowHTML[$i][1] = 1;
        }
    }

    $_SESSION['getPage'] = 1;
    if($_SESSION['$trainingSetArr'][2] == 'train')
    {
        $trainingDataArr = selectData($_SESSION['$trainingSetArr'][0], 1, 1);           //输出
    }
    else
    {
        $trainingDataArr = selectTestData($_SESSION['$trainingSetArr'][0], 1, 1);           //输出
    }

    $trainingFooterPageArr = pageNum($_SESSION['$trainingSetArr'][1], $_SESSION['getPage']);             //输出
    $namedPage = array(array("首页", 1), array("上一页", 1),
        array("下一页", 0),array("尾页", 0));                    //输出
    include "selectTraning.html.php";
    exit();

}

//选择页数 确定以后的操作
if (isset($_POST['action']) and ($_POST['action']=='确定'))
{
    $trainingDataArr = array(null);
    $footerSkipPage = $_POST['footerSkipPage'];
    $_SESSION['getPage'] = $footerSkipPage;
    $trainingDataArr = selectData($_SESSION['$trainingSetArr'][0], $footerSkipPage, $footerSkipPage);             //输出
    $trainingFooterPageArr = pageNum($_SESSION['$trainingSetArr'][1], $_SESSION['getPage']);              //输出

    if( $_SESSION['getPage'] ==1 )
    {
        $namedPage = array(array("首页", 1), array("上一页", 1),
            array("下一页", 0),array("尾页", 0));                    //输出
    }
    else
    {
        if( $_SESSION['getPage'] ==$_SESSION['$trainingSetArr'][1] )
        {
            $namedPage = array(array("首页", 0), array("上一页", 0),
                array("下一页", 1),array("尾页", 1));                    //输出
        }
        else
        {
            $namedPage = array(array("首页", 0), array("上一页", 0),
                array("下一页", 0),array("尾页", 0));                    //输出
        }
    }
    include "selectTraning.html.php";
    exit();

}

//选择首页
if(isset($_POST['action']) and ($_POST['action']=='首页'))
{
    $_SESSION['getPage'] = 1;
    $trainingDataArr = selectData($_SESSION['$trainingSetArr'][0], 1, 1);       //输出
    $trainingFooterPageArr = pageNum($_SESSION['$trainingSetArr'][1],  $_SESSION['getPage']);              //输出
    $namedPage = array(array("首页", 1), array("上一页", 1),
        array("下一页", 0),array("尾页", 0));                    //输出
    include "selectTraning.html.php";
    exit();

}

//选择上一页
if(isset($_POST['action']) and ($_POST['action']=='上一页'))
{
    if( $_SESSION['getPage'] !=1 )
    {
        $_SESSION['getPage'] = $_SESSION['getPage']-1;
        $trainingDataArr = selectData($_SESSION['$trainingSetArr'][0], $_SESSION['getPage'], $_SESSION['getPage']);   //输出
        $trainingFooterPageArr = pageNum($_SESSION['$trainingSetArr'][1],  $_SESSION['getPage']);              //输出
    }
    else
    {
        $_SESSION['getPage'] = 1;
        $trainingDataArr = selectData($_SESSION['$trainingSetArr'][0], $_SESSION['getPage'], $_SESSION['getPage']);   //输出
        $trainingFooterPageArr = pageNum($_SESSION['$trainingSetArr'][1],  $_SESSION['getPage']);              //输出
    }
    if( $_SESSION['getPage'] ==1 )
    {
        $namedPage = array(array("首页", 1), array("上一页", 1),
            array("下一页", 0),array("尾页", 0));                    //输出
    }
    else
    {
        $namedPage = array(array("首页", 0), array("上一页", 0),
            array("下一页", 0),array("尾页", 0));                    //输出
    }

    include "selectTraning.html.php";
    exit();

}

//选择下一页
if(isset($_POST['action']) and ($_POST['action']=='下一页'))
{
    if($_SESSION['getPage'] != $_SESSION['$trainingSetArr'][1])
    {
        $_SESSION['getPage'] = $_SESSION['getPage']+1;
        $trainingDataArr = selectData($_SESSION['$trainingSetArr'][0], $_SESSION['getPage'], $_SESSION['getPage']);   //输出
        $trainingFooterPageArr = pageNum($_SESSION['$trainingSetArr'][1],  $_SESSION['getPage']);              //输出
    }
    else
    {
        $_SESSION['getPage'] = $_SESSION['$trainingSetArr'][1];
        $trainingDataArr = selectData($_SESSION['$trainingSetArr'][0], $_SESSION['getPage'], $_SESSION['getPage']);   //输出
        $trainingFooterPageArr = pageNum($_SESSION['$trainingSetArr'][1],  $_SESSION['getPage']);              //输出
    }
    if( $_SESSION['getPage'] ==$_SESSION['$trainingSetArr'][1] )
    {
        $namedPage = array(array("首页", 0), array("上一页", 0),
            array("下一页", 1),array("尾页", 1));                    //输出
    }
    else
    {
        $namedPage = array(array("首页", 0), array("上一页", 0),
            array("下一页", 0),array("尾页", 0));                    //输出
    }

    include "selectTraning.html.php";
    exit();

}

//选择尾页
if(isset($_POST['action']) and ($_POST['action']=='尾页'))
{
    $_SESSION['getPage'] = $_SESSION['$trainingSetArr'][1];
    $trainingDataArr = selectData($_SESSION['$trainingSetArr'][0],
        $_SESSION['$trainingSetArr'][1], $_SESSION['$trainingSetArr'][1]);       //输出
    $trainingFooterPageArr = pageNum($_SESSION['$trainingSetArr'][1],  $_SESSION['getPage']);              //输出
    $namedPage = array(array("首页", 0), array("上一页", 0),
        array("下一页", 1),array("尾页", 1));
    include "selectTraning.html.php";
    exit();

}

//上传文件 文件路径为WebPage/upload/
//$_SESSION['fileName'] 下标从1开始
if(isset($_POST['action']) and ($_POST['action']=='判断'))
{
    if(is_uploaded_file($_FILES["uploadfile"]["tmp_name"]))
    {
            $upFile = $_FILES["uploadfile"];
            //  print_r($upFile);
            $upFileName = $upFile["name"];
            $upFileType = $upFile["type"];
            $upFileSize = $upFile["size"];
            $upFileTmpName = $upFile["tmp_name"];
            $upFileError = $upFile["error"];
            $sign = 0;
            switch($upFileType)
            {
                case "text/plain":
                    $sign = 1;
                    break;
                default:
                    $sign = 0;
                    break;
            }
            if(($sign==1) && ($upFileError=='0'))
            {
                move_uploaded_file($upFileTmpName,"upload/".$upFileName);
                $content = file_get_contents("upload/".$upFileName);
				$e=mb_detect_encoding($contents, array('UTF-8', 'CP936'));
		//print $e."<br>";
		switch($e){
			case 'UTF-8': 
				break;
			case 'CP936':
				 $contents=iconv("GB2312", "UTF-8", $contents);  
				break;
		}
                $matchResult = Category($content);
                array_push($_SESSION['fileName'], array($upFileName, $content, $matchResult));
                $_SESSION['fileNameId'] = count($_SESSION['fileName']);
//                echo "<pre>";
//                print_r($_SESSION['fileName']);
//                echo "</pre>";
//                print_r($_SESSION['fileNameId']."hy</br>");

            }
            else
            {
                echo "文件上传出错！";
            }
    }

    include "judgement.html.php";
    exit();
}

include "homePage.html.php";
?>