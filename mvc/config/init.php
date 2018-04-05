<?php
/**
 * @Author: anchen
 * @Date:   2017-12-13 08:53:29
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-12-13 21:07:05
 */
include './config/define.php';

include './config/config.php';

include './core/Func.php';

include "./core/App.class.php";

include ROOT_CORE_PATH . "Model.class.php";

include ROOT_PLUGINS_PATH . "smarty/Smarty.class.php";

include ROOT_CORE_PATH . "Controller.class.php";


spl_autoload_register("\\core\\App::autoLoad");
