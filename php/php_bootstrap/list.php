<?php
/**
 * @Author: anchen
 * @Date:   2017-11-15 09:10:37
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-18 20:54:21
 */
header("content-type:text/html;charset=utf-8");
include "./load.php";


$host = "localhost:3306";
$user = "root";
$psw = "123456789";
$db = "itcast";
$mysql = new MysqlDB($host, $user, $psw, $db);

$sql = "select count(id) as num from student";
$result = $mysql->query($sql);
$arr = $mysql->fetch_to_assocArray($result);

$page = isset($_GET["page"]) ? $_GET["page"] : 1;//当前页
$count = $arr[0]["num"];//总行数
$row_count = 10;//一页的条数
$offset_num = ($page - 1) * $row_count;//偏移量是
$pageAll = (int)ceil($count/$row_count);//页数
$url = "http://www.lib.com/php/php_bootstrap/list.php";

$pageTool = new PageTool;
$pageHtml = $pageTool->pageHTml($page, $pageAll, $url);

$sql = "select * from student where 1 order by id limit {$offset_num},{$row_count}";
$result = $mysql->query($sql);

$arr = $mysql->fetch_to_assocArray($result);
$field_arr = $mysql->get_fields($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>list</title>
    <style>
        p{
            transition-duration: 0.5s;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css" />
    <script src="./bootstrap/jQuery.js"></script>
    <script src="./bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <p class="h3"><a href="http://www.lib.com/php/php_bootstrap/insert.php?page=<?php echo $page;?>">添加学生</a></p>
        <table align="center" cellpadding="5" width="800" class="table table-striped table-hover table-bordered">
            <tr align="center" style="font-weight: bold;">
            <?php foreach($field_arr as $key => $value){ ?>
                <td><?php echo $value; ?></td>
            <?php } ?>
                <td>操作</td>
            </tr>

            <?php foreach($arr as $key => $value){ ?>
                <tr align="center">
                    <?php foreach($value as $assoc => $value_value){ ?>
                        <td><?php echo $value_value; ?></td>
                    <?php }?>
                    <td><a href="http://www.lib.com/php/php_bootstrap/update.php?id=<?php echo $value['id']; ?>&page=<?php echo $page;?>">编辑</a>&nbsp;&nbsp;<a href="javascript:isDel()" >删除</a></td>
                </tr>
            <?php } ?>
        </table>
        <div class="row h4">
            <div class="" style="text-align: center;"><?php echo $pageHtml; ?></div>
        </div>
    </div>

</body>
    <script>
        function isDel(){
            if(confirm("是否删除？")){
                location.href = "http://www.lib.com/php/php_bootstrap/delete.php?id=<?php echo $value['id']; ?>&page=<?php echo $page;?>";
            }else{
                return false;
            }
        }

        var pre = document.getElementById("pre");
        // console.log(pre);
        if(pre !== null){
            pre.style.cursor = "pointer";
            // pre.style.transitionDuration = "0.5s";
            pre.onclick = function(){
                this.innerHTML = "";
                var page = <?php echo $page; ?>;
                for(var i = 2; i < page - 2; i++){
                    var a = document.createElement("a");
                    a.href = "http://www.lib.com/php/php_bootstrap/list.php?page=" + i;
                    a.innerHTML = i;
                    a.className = "btn btn-primary btn-xs";

                    // a.style.transitionDuration = "0.5s";

                    a.style.marginRight = "3px";
                    this.appendChild(a);
                }
            }
        }

        var next = document.getElementById("next");
        if(next !== null){
            next.style.cursor = "pointer";
            // next.style.transitionDuration = "0.5s";

            next.onclick = function(){
                this.innerHTML = "";
                var page = <?php echo $page; ?>;
                var pageCount = <?php echo $pageAll; ?>;
                for(var i = page + 3; i < pageCount; i++){
                    var a = document.createElement("a");
                    a.innerHTML = i;
                    a.href = "http://www.lib.com/php/php_bootstrap/list.php?page=" + i;
                    a.className = "btn btn-primary btn-xs";
                    // a.style.transitionDuration = "0.5s";

                    a.style.marginRight = "3px";
                    this.appendChild(a);
                }
            }
        }
    </script>
</html>