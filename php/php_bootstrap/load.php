<?php
/**
 * @Author: anchen
 * @Date:   2017-11-15 11:35:27
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-11-15 11:35:29
 */
Class Load{
    public static function loadClass($className){

        include "./{$className}.class.php";
    }
}

spl_autoload_register("Load::loadClass");