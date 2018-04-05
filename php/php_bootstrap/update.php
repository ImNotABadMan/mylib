<?php
/**
 * @Author: anchen
 * @Date:   2017-11-15 11:25:42
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-18 16:27:06
 */

// id | name | sex | age | learn | salary | extramoney | nativeplace


include "./load.php";

header("content-type:text/html;charset=utf-8");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$host = "localhost:3306";
$user = "root";
$psw = "123456789";
$db = "itcast";

$mysql = new MysqlDB($host, $user, $psw, $db);

$sql = "select * from student where id = {$id}";
$result = $mysql->query($sql);
$arr = $mysql->fetch_to_assocArray($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>新增</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css" />
    <script src="./bootstrap/jQuery.js"></script>
    <script src="./bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <form action="http://www.lib.com/php/php_bootstrap/updateh.php?id=<?php echo $arr[0]['id']; ?>" method="post" class="form-horizontal container" style="margin-top: 20px;">
        <div class="form-group">
            <label for="username" class="control-label col-xs-2">name: </label>
            <div class="col-xs-6">
                <input type="text" name="username" value="<?php echo $arr[0]['name']; ?>" class="form-control" id="username" />
            </div>
        </div>
        <div class="form-group">
            <label for="sex" class="col-xs-2 control-label">sex:</label>
            <div class="col-xs-6">
                <input id="sex" type="number" name="sex" value="<?php echo $arr[0]['sex']; ?>" class="form-control"  />
            </div>
        </div>
        <div class="form-group">
            <label for="age" class="col-xs-2 control-label">age:</label>
            <div class="col-xs-6">
                <input type="number" name="age" value="<?php echo $arr[0]['age']; ?>"  class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="learn" class="col-xs-2 control-label">learn:</label>
            <div class="col-xs-6">
                <input id="learn" type="text" name="learn" value="<?php echo $arr[0]['learn']; ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="ssalaryex" class="col-xs-2 control-label">salary:</label>
            <div class="col-xs-6">
                <input id="salary" type="number" name="salary" value="<?php echo $arr[0]['salary']; ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="extramoney" class="col-xs-2 control-label">extramoney:</label>
            <div class="col-xs-6">
                <input id="extramoney" type="number" name="extramoney" value="<?php echo $arr[0]['extramoney']; ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="nativeplace" class="col-xs-2 control-label">nativeplace:</label>
            <div class="col-xs-6">
                <input id="nativeplace" type="text" name="nativeplace" value="<?php echo $arr[0]['nativeplace']; ?>" class="form-control"  />
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
                <input type="submit" value="更新" class="btn btn-primary" />
            </div>
        </div>
    </form>
    <div class="container"><a href="http://www.lib.com/php/php_bootstrap/list.php?page=<?php echo $page; ?>">返回列表</a></div>
    </body>
</html>