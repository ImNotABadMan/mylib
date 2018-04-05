<?php
/**
 * @Author: anchen
 * @Date:   2017-11-15 14:32:48
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-18 15:45:38
 */

include "./load.php";

header("content-type:text/html;charset=utf-8");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id == 0){
    echo "没有id";
    header("Refresh:2;url=http://www.lib.com/php/php_bootstrap/list.php?page");
}

$host = "localhost:3306";
$user = "root";
$psw = "123456789";
$db = "itcast";

$mysql = new MysqlDB($host, $user, $psw, $db);

$sql = "delete from student where id = {$id}";
$re = $mysql->query($sql);

if($re){
    echo "删除成功";
}else{
    echo "删除失败";
}

header("Refresh:2;url=http://www.lib.com/php/php_bootstrap/list.php?page");

