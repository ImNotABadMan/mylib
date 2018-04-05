<?php
/**
 * @Author: anchen
 * @Date:   2017-12-13 08:45:14
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-12-13 19:55:47
 */
$config = array(
    'mysql' => array(
        'type' => 'mysql',
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'cate',
        'charset' => 'utf8',
        'user' => 'root',
        'pwd' => '123456789'
    ),

    'URL' => 'www.lib.com/mvc',

    'route' => array(
        'plat' => 'admin',
        'controller' => 'index',
        'action' => 'showIndex'
    ),

    'logPath' => ROOT . "logs/"
);