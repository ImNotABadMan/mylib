<?php
/**
 * @Author: anchen
 * @Date:   2017-11-15 14:18:37
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-18 15:46:46
 */

include "./load.php";
header("content-type:text/html;charset=utf-8");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;
if($id == 0){
    echo "没有id";
    header("Refresh:2;url=http://www.lib.com/php/php_bootstrap/list.php?page");
}
$page = isset($_GET["page"]) ? $_GET["page"] : 1;

$name = isset($_POST["username"]) ? $_POST["username"] : "";
$sex = isset($_POST["sex"]) ? $_POST["sex"] : "";
$age = isset($_POST["age"]) ? $_POST["age"] : "";
$learn = isset($_POST["learn"]) ? $_POST["learn"] : "";
$salary = isset($_POST["salary"]) ? $_POST["salary"] : "";
$extramoney = isset($_POST["extramoney"]) ? $_POST["extramoney"] : "";
$nativeplace = isset($_POST["nativeplace"]) ? $_POST["nativeplace"] : "";

$host = "localhost:3306";
$user = "root";
$psw = "123456789";
$db = "itcast";

$mysql = new MysqlDB($host, $user, $psw, $db);

$sql = "update student set name = '{$name}', sex = {$sex}, age = {$age}, learn = '{$learn}', salary = {$salary}, extramoney={$extramoney}, nativeplace = '{$nativeplace}' where id = {$id}";
$re = $mysql->query($sql);

if($re){
    echo "更新成功";
    header("Refresh:2;url=http://www.lib.com/php/php_bootstrap/list.php?page={$page}");
}else{
    echo "更新失败";
    header("Refresh:2;url=http://www.lib.com/php/php_bootstrap/update.php?id={$id}&page={$page}");
}


