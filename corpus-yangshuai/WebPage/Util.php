<meta charset="utf-8">
<?php
$conn =mysql_connect( "localhost", "root", "root");
if(!$conn)
{
    die('Could not connect: ' . mysql_error());
}

$db_selected = mysql_select_db("corpus", $conn);
 if(!$db_selected)
 {
     die('Can\'t use corpus ' . mysql_error());
 }

mysql_query("set names UTF8");

/*
 * 查询数据库里的数据
 * 数据库数据 均为下标从1开始
*/
function selectData($trainCategory, $snum, $enum)
{
    $result = array(null);
    for ($i=$snum; $i<=$enum; $i++)
    {
        $sql = "select Train_Text from train where Train_Cg_Id='$i' and Train_Category='$trainCategory'";
        $str = mysql_query($sql) or die(mysql_error());
        $data = mysql_fetch_array($str);
        array_push($result, $data[0]);

    }
    return $result;
}

/*
 * 查询测试集的数据
 */
function selectTestData($TestCategory, $snum, $enum)
{
    $result = array(null);
    for ($i=$snum; $i<=$enum; $i++)
    {
        $sql = "select Test_Text from test where Test_Cg_Id='$i' and Test_Category='$TestCategory'";
        $str = mysql_query($sql) or die(mysql_error());
        $data = mysql_fetch_array($str);
        array_push($result, $data[0]);

    }
    return $result;
}
/*
 * 将训练集为汉字的转化为英文
 * 以及对应的文章数目
 */
function chMatchEn($chinese)
{
    $englishArr = array(null);
    switch($chinese)
    {
        case "训练集 经济":
            $englishArr[0] = 'Economy';
            $englishArr[1] = trainingSetNum('Economy');
            $englishArr[2] = 'train';
            break;
        case "训练集 教育":
            $englishArr[0] = 'Education';
            $englishArr[1] = trainingSetNum('Education');
            $englishArr[2] = 'train';
            break;
        case "训练集 娱乐":
            $englishArr[0] = 'Entertainment';
            $englishArr[1] = trainingSetNum('Entertainment');
            $englishArr[2] = 'train';
            break;
        case "训练集 健康":
            $englishArr[0] = 'Health';
            $englishArr[1] = trainingSetNum('Health');
            $englishArr[2] = 'train';
            break;
        case "训练集 军事":
            $englishArr[0] = 'Military';
            $englishArr[1] = trainingSetNum('Military');
            $englishArr[2] = 'train';
            break;
        case "训练集 体育":
            $englishArr[0] = 'Sport';
            $englishArr[1] = trainingSetNum('Sport');
            $englishArr[2] = 'train';
            break;
        case "训练集 科技":
            $englishArr[0] = 'Technology';
            $englishArr[1] = trainingSetNum('Technology');
            $englishArr[2] = 'train';
            break;
        case "训练集 旅游":
            $englishArr[0] = 'Travel';
            $englishArr[1] = trainingSetNum('Travel');
            $englishArr[2] = 'train';
            break;
        case "测试集 经济":
            $englishArr[0] = 'Economy';
            $englishArr[1] = testSetNum('Economy');
            $englishArr[2] = 'test';
            break;
        case "测试集 教育":
            $englishArr[0] = 'Education';
            $englishArr[1] = testSetNum('Education');
            $englishArr[2] = 'test';
            break;
        case "测试集 娱乐":
            $englishArr[0] = 'Entertainment';
            $englishArr[1] = testSetNum('Entertainment');
            $englishArr[2] = 'test';
            break;
        case "测试集 健康":
            $englishArr[0] = 'Health';
            $englishArr[1] = testSetNum('Health');
            $englishArr[2] = 'test';
            break;
        case "测试集 军事":
            $englishArr[0] = 'Military';
            $englishArr[1] = testSetNum('Military');
            $englishArr[2] = 'test';
            break;
        case "测试集 体育":
            $englishArr[0] = 'Sport';
            $englishArr[1] = testSetNum('Sport');
            $englishArr[2] = 'test';
            break;
        case "测试集 科技":
            $englishArr[0] = 'Technology';
            $englishArr[1] = testSetNum('Technology');
            $englishArr[2] = 'test';
            break;
        case "测试集 旅游":
            $englishArr[0] = 'Travel';
            $englishArr[1] = testSetNum('Travel');
            $englishArr[2] = 'test';
            break;
        default:
            $englishArr[0] = '';
            $englishArr[1] = '0';
            $englishArr[2] = '';
            break;
    }
    return $englishArr;
}

/*
 * 网页上显示数据
 */
function html($text){
    return htmlspecialchars($text,ENT_QUOTES,'UTF-8');
}

function htmlout($text){
    echo html($text);
}

/*
 * 制造页脚的下标数
 */
function pageNum($num, $selected)
{
    $result = array(array(null,null));
    $j = 0;
    for ($i=1; $i<=$num; $i++)
    {
        $j = $i-1;
        if ($i == $selected)
        {
            $result[$j][0] = $i;
            $result[$j][1] = 1;
        }
        else
        {
            $result[$j][0] = $i;
            $result[$j][1] = 0;
        }

    }
    return $result;
}

/*
 * 获得训练集的正确率
 */
function getTraningSetAccuracy($trainingSetName)
{
	$sql = "select count(*) from result where Result_Category='$trainingSetName' and Result_Test_cg='$trainingSetName'";
	$str = mysql_query($sql) or die(mysql_error());
	$numerator = mysql_fetch_array($str);             //在指定测试集中，匹配成功的测试集数目
	
	$sql = "select count(*) from result where Result_Test_cg='$trainingSetName'";
	$str = mysql_query($sql) or die(mysql_error());
	$denominator = mysql_fetch_array($str);           //指定的测试集数目
    if( $denominator[0]==0 )
    {
        $result = 0;
    }
    else
    {
        $result = round($numerator[0]/$denominator[0]*100,3).'%';
    }

	return $result;
}

/*
 * 获得训练集的总体正确率
 */
function getTraningSetAllAccuracy()
{
    $traningSetName = array('Economy', 'Education', 'Entertainment', 'Health', 'Military', 'Sport', 'Technology', 'Travel');
    $numeratorNum = 0;
    $denominatorNum = 0;
    for($i=0; $i<count($traningSetName); $i++)
    {
        $sql = "select count(*) from result where Result_Category='$traningSetName[$i]' and Result_Test_cg='$traningSetName[$i]'";
        $str = mysql_query($sql) or die(mysql_error());
        $numerator = mysql_fetch_array($str);
        $numeratorNum += $numerator[0];

        $sql = "select count(*) from result where Result_Test_cg='$traningSetName[$i]'";
        $str = mysql_query($sql) or die(mysql_error());
        $denominator = mysql_fetch_array($str);
        $denominatorNum += $denominator[0];
    }

    if($denominatorNum == 0)
    {
        $result = 0;
    }
    else
    {
        $result = round($numeratorNum/$denominatorNum*100,3).'%';
    }
    return $result;

}
/*
 * 获取某个类别训练集 的数目
 */
function trainingSetNum($trainingSet)
{
    $sql = "select count(*) from train where Train_Category='$trainingSet'";
    $str = mysql_query($sql) or die(mysql_error());
    $result = mysql_fetch_array($str);             //在指定测试集中，匹配成功的测试集数目
    print_r($result);
    return $result[0];
}

/*
 * 获取某个类别测试集 的数目
 */
function testSetNum($testSet)
{
    $sql = "select count(*) from test where Test_Category='$testSet'";
    $str = mysql_query($sql) or die(mysql_error());
    $result = mysql_fetch_array($str);             //在指定测试集中，匹配成功的测试集数目
    return $result[0];
}


?>