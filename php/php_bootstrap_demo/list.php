<?php
/**
 * @Author: anchen
 * @Date:   2017-11-20 19:34:52
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-12-02 10:42:09
 */

header("content-type:text/html;charset=utf-8");

include "./smarty/Smarty.class.php";
include "./autoload.php";

//id  | name | sex | age | learn  | salary | extramoney | nativeplace
function getData(){
    $name = isset($_POST["name"]) ? $_POST["name"] : " ";
    $sex = isset($_POST["sex"]) ? $_POST["sex"] : 0;
    $age = isset($_POST["age"]) ? $_POST["age"] : 0;
    $learn = isset($_POST["learn"]) ? $_POST["learn"] : " ";
    $salary = isset($_POST["salary"]) ? $_POST["salary"] : 0;
    $extramoney = isset($_POST["extramoney"]) ? $_POST["extramoney"] : 0;
    $nativeplace = isset($_POST["nativeplace"]) ? $_POST["nativeplace"] : " ";
    return array(
        ':name' => $name,
        ':sex' => (int)$sex,
        ':age' => (int)$age,
        ':learn' => $learn,
        ':salary' => (int)$salary,
        ':extramoney' => (int)$extramoney,
        ':nativeplace' => $nativeplace
        );
}

//smarty
$smarty = new Smarty;
// $smarty->setTemplateDir("../templates");
// var_dump($smarty);
// var_dump(__FILE__);
// echo "<hr />";
// var_dump(dirname(__FILE__));
// exit;

// if(!defined("SMARTY_DIR")){
//     define("SMARTY_DIR", dirname(__FILE__) . "/smarty/");
// }
$db = new PDOdb();

/************************操作*****************************/
$flag = isset($_GET["flag"]) ? $_GET["flag"] : 0;
$smarty->assign("flag", $flag);
//11增 22改 33删 0查1条
switch($flag){
    case 2:
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $upData = $db->getRow("*", "student", "id={$id}");
        $smarty->assign("upData", $upData);
        break;
    case 11:
        $arr = getData();
        $re = $db->insert($arr, "student");
        $smarty->assign("re", $re ? 11 : 10);
        break;
    case 22:
        $arr = getData();
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $re = $db->update($arr, "student", $id);
        $smarty->assign("re", $re ? 22 : 20);
        break;
    case 33:
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $re = $db->del("student", $id);
        $smarty->assign("re", $re ? 33 : 30);
        break;
    default:
        break;
}
// var_dump($flag);



/***********************显示S********************************/
//获得数据的总行数
$countResult = $db->getRow("count(id) as num", "student", 1);
// var_dump($countResult);die;
$pageRows = 10;//显示条数
$pageCount = (int)ceil( ((int)$countResult["num"])/$pageRows);//总页数
$page = isset($_GET["page"]) ? $_GET["page"] : 1;//page,当前页
$offsetRow = ($page - 1) * $pageRows;//偏移量

$list = $db->getRows("*", "student", 1, $offsetRow, $pageRows, PDO::FETCH_ASSOC);

$cols = $db->getColumns("student");
$pageHtml = PageHtml::pageOutput($page, $pageCount, "http://www.smarty.com/stuMajor/list.php");

//行
$smarty->assign("list", $list);
//列
$smarty->assign("cols", $cols);

$smarty->assign("pageHtml", $pageHtml);//分页
$smarty->assign("page", $page);
$smarty->assign("pageCount", $pageCount);


/***********************显示E*********************************/

$smarty->display("list.html");


