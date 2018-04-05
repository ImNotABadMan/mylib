<?php
/**
 * @Author: anchen
 * @Date:   2017-11-17 08:33:01
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-17 08:48:34
 */

//工厂单例模式
Class StaticFactory{
    private static $arr = array();
    public static function createInstance($name){
        if(!isset(self::$arr[$name])){
            if(file_exists("./{$name}.php")){
                include_once "./{$name}.php";
                self::$arr[$name] = new $name;
            }
        }
        return self::$arr[$name];
    }
}

$a = StaticFactory::createInstance("A");
$a1 = StaticFactory::createInstance("A");
var_dump($a, $a1);echo "<hr />";

$b = StaticFactory::createInstance("S");
$b1 = StaticFactory::createInstance("S");
var_dump($b, $b1);echo "<hr />";

