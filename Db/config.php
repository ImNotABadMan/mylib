<?php
/**
 * @Author: anchen
 * @Date:   2018-04-13 14:13:39
 * @Last Modified by:   anchen
 * @Last Modified time: 2018-04-14 13:53:33
 */
$config = [
    'db' => [
        'type'      => 'mysql',
        'host'      => '127.0.0.1',
        'port'      => '3306',
        'username'  => 'root',
        'pwd'       => '123456',
        'dbname'    => 'db6',
        'char'      => 'utf8'
    ]
];


function conf( $str = '' ){
    $conf = $GLOBALS['config'];
    $confStr = explode('.', $str);
    foreach ($confStr as $val) {
        $conf = $conf[$val];
    }

    return $conf;
}

// define('IS_AJAX', strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');


