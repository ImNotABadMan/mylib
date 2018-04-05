<?php
/**
 * @Author: anchen
 * @Date:   2017-11-17 08:19:28
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-17 08:26:22
 */

Class Danli{
    private static$instance;

    private function __construct(){

    }

    private function __clone(){

    }

    public static function createInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self;
        }

        return self::$instance;
    }
}

$d1 = Danli::createInstance();
$d2 = Danli::createInstance();
// $d3 = clone $d1;
var_dump($d1, $d2);