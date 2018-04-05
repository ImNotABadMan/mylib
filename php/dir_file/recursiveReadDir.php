<?php
/**
 * @Author: anchen
 * @Date:   2017-11-08 16:59:56
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-09 11:12:38
 */

header("content-type:text/html;charset=utf-8");
// define("DIR", "D:/Apache2.2");
define("DIR", "D:/eclipse");

/**
 * 功能：递归读取文件
 * 用传入的当前目录加上读取的文件名/文件夹名，判断是否为目录
 * 是的话继续打开，继续读取，不是就返回文件名
 * @param   $dir 根目录
 * @param   $count 递归级数
 */
function recursiceDir($dir, $count){
    $re = opendir($dir);
    while($str = readdir($re)){
        if($str == "." || $str == ".."){
            continue;
        }

        $innerDir = $dir . "/" . $str;
        echo str_repeat("-- ", $count);
        if(is_dir($innerDir)){
            echo "<span style='color:red;'>" . $str . "</span></br />";
            recursiceDir($innerDir, $count + 1);
        }else{
            echo "{$str}<br />";
        }
    }
}

recursiceDir(DIR, 0);

