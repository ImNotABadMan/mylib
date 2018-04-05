<?php
/**
 * @Author: anchen
 * @Date:   2017-12-13 08:47:31
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-12-13 19:56:27
 */
//根目录
define('ROOT', dirname(dirname(__FILE__)) . "/");
define('ROOT_APP_PATH', ROOT . "app/");

//app目录
define('ROOT_APP_ADMIN_PATH', ROOT_APP_PATH . "admin/");
define('ROOT_APP_ADMIN_CON_PATH', ROOT_APP_ADMIN_PATH . "controller/");
define('ROOT_APP_ADMIN_VIEW_PATH', ROOT_APP_ADMIN_PATH . "view/");

define('ROOT_APP_HOME_PATH', ROOT_APP_PATH . "home/");
define('ROOT_APP_HOME_CON_PATH', ROOT_APP_HOME_PATH . "controller/");
define('ROOT_APP_HOME_VIEW_PATH', ROOT_APP_HOME_PATH . "view/");

//model目录
define('ROOT_APP_MODEL_PATH', ROOT_APP_PATH . "model/");

//config目录
define('ROOT_CONFIG_PATH', ROOT . "config/");

//core目录
define('ROOT_CORE_PATH', ROOT . "core/");

//plugins目录
define('ROOT_PLUGINS_PATH', ROOT . "plugins/");

//public目录
define('ROOT_PUBLIC_PATH', ROOT . "public/");

//smarty兼容低版本
if(!defined("SMARTY_DIR")){
    define("SMARTY_DIR", ROOT_PLUGINS_PATH . "smarty/");
}

