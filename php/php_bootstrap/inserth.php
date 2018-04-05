<?php
/**
 * @Author: anchen
 * @Date:   2017-11-15 11:34:56
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-18 15:46:03
 */
// id | name | sex | age | learn | salary | extramoney | nativeplace

header("content-type:text/html;charset=utf-8");

include "./load.php";
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

$sql = "insert into student values(null, '{$name}', {$sex}, {$age}, '{$learn}', {$salary}, {$extramoney}, '{$nativeplace}')";
$re = $mysql->query($sql);
// echo $sql;
// exit;
if($re){
    echo "插入成功";
    header("Refresh:2;url=http://www.lib.com/php/php_bootstrap/list.php?page={$page}");
}else{
    echo "插入失败";
    header("Refresh:2;url=http://www.lib.com/php/php_bootstrap/insert.php?page={$page}");
}


