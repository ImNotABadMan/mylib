<?php
/**
 * @Author: anchen
 * @Date:   2017-11-15 11:25:42
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-18 16:21:34
 */

// id | name | sex | age | learn | salary | extramoney | nativeplace
// insert into student(name,sex,age,learn,salary,extramoney,nativeplace) (select name,sex,age,learn,salary,extramoney,nativeplace from student);
//
$page = isset($_GET["page"]) ? $_GET["page"] : 1;

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
    <form action="http://www.lib.com/php/php_bootstrap/inserth.php" method="post" class="form-horizontal container" style="margin-top: 20px;">
        <div class="form-group">
            <label for="username" class="control-label col-xs-2">name: </label>
            <div class="col-xs-6">
                <input type="text" name="username" value="我好" class="form-control" id="username" />
            </div>
        </div>
        <div class="form-group">
            <label for="sex" class="col-xs-2 control-label">sex:</label>
            <div class="col-xs-6">
                <input id="sex" type="number" name="sex" value="<?php echo mt_rand(1,2); ?>" class="form-control"  />
            </div>
        </div>
        <div class="form-group">
            <label for="age" class="col-xs-2 control-label">age:</label>
            <div class="col-xs-6">
                <input type="number" name="age" value="<?php echo mt_rand(16,26); ?>"  class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="learn" class="col-xs-2 control-label">learn:</label>
            <div class="col-xs-6">
                <input id="learn" type="text" name="learn" value="IT/PHP" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="ssalaryex" class="col-xs-2 control-label">salary:</label>
            <div class="col-xs-6">
                <input id="salary" type="number" name="salary" value="<?php echo mt_rand(10000,20000); ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="extramoney" class="col-xs-2 control-label">extramoney:</label>
            <div class="col-xs-6">
                <input id="extramoney" type="number" name="extramoney" value="<?php echo mt_rand(10000,20000); ?>" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label for="nativeplace" class="col-xs-2 control-label">nativeplace:</label>
            <div class="col-xs-6">
                <input id="nativeplace" type="text" name="nativeplace" value="杭州" class="form-control"  />
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6">
                <input type="submit" value="新增" class="btn btn-primary" />
            </div>
        </div>
    </form>
    <div class="container"><a href="http://www.lib.com/php/php_bootstrap/list.php?page=<?php echo $page; ?>">返回列表</a></div>
</body>
</html>