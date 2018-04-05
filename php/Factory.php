<?php
/**
 * @Author: anchen
 * @Date:   2017-11-17 08:26:37
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-17 08:32:26
 */

Class Factory{
    private function __construct(){

    }

    public static function createInstance($name){
        if(file_exists("./{$name}.php")){
            include_once "./{$name}.php";

            return new $name;
        }else{
            return false;
        }
    }
}

$a = Factory::createInstance("A");
$a1 = Factory::createInstance("A");
var_dump($a, $a1);
