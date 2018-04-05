<?php
/**
 * @Author: anchen
 * @Date:   2017-12-13 08:53:29
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-12-13 21:49:09
 */
namespace core;

class App{
    private static $arr = array();

    public static function autoLoad($name){
        $className = basename($name);
        // var_dump($name);

        if(substr($className, -10) == "Controller"){
            $path = ROOT_APP_PATH . "" . $name . ".class.php";
            $path = str_replace("\\", "/", $path);
            include $path;
        }else if(substr($className, -5) == "Model"){
            $path = ROOT_APP_MODEL_PATH . $className . ".class.php";
            $path = str_replace("\\", "/", $path);
            include $path;
        }
    }

    public static function createInstance($name){

        if(!isset(self::$arr[$name])){
            self::$arr[$name] = new $name;
        }
        return self::$arr[$name];
    }

    public static function logErr(){

        if(!is_dir(C("logPath") . $GLOBALS['plat'])){
            mkdir(C("logPath") . $GLOBALS['plat']);
        }
        $path = C("logPath") . $GLOBALS['plat'] . "/" . $GLOBALS['controller'] . ".txt";
        ini_set("error_reporting", E_ALL | E_STRICT);
        ini_set("display_errors", "Off");
        ini_set("log_errors", "On");
        ini_set("error_log", $path);
    }

    public static function Route(){
        header("content-type:text/html;charset=utf-8");
        // var_dump($_GET);
        $GLOBALS['plat'] = $plat = isset($_GET['p']) ? F($_GET['p']) : C('route.plat');
        $GLOBALS['controller'] = $controller = isset($_GET['c']) ? F($_GET['c']) : C('route.controller');
        $GLOBALS['action'] = $action = isset($_GET['a']) ? F($_GET['a']) : C('route.action');
        // var_dump($_GET['p']);
        self::logErr();

        $className = "\\" . $plat . "\\controller\\" . ucfirst($controller) . "Controller";
        // var_dump($className);
        $instance = M($className);

        $instance->$action();
    }
}