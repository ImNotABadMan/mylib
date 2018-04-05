<?php
/**
 * @Author: anchen
 * @Date:   2017-11-20 20:13:52
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-20 20:15:13
 */
class AutoLoad{
    public static function loadClass($name){
        include "./{$name}.class.php";
    }
}

spl_autoload_register("AutoLoad::loadClass");
