<?php
/**
 * @Author: anchen
 * @Date:   2017-12-13 13:01:20
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-12-13 21:11:06
 */
function C($str){
    $config = $GLOBALS["config"];
    $arr = explode(".", $str);

    foreach($arr as $value){
        $config = $config[$value];
    }

    return $config;
}

function M($name){
    // var_dump($name);

    return \core\App::createInstance($name);
}

function F($str){
    return addslashes(trim($str));
}