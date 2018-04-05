<?php
/**
 * @Author: anchen
 * @Date:   2017-12-13 18:47:44
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-12-13 20:04:26
 */
namespace core;

class Controller extends \Smarty{

    public function __construct(){
        parent::__construct();

        $templateDir = ROOT_APP_PATH . $GLOBALS['plat'] . "/view";

        $this->setTemplateDir($templateDir);

        $compileDir = ROOT_APP_PATH . $GLOBALS['plat'] . "/view_c";

        $this->setCompileDir($compileDir);

    }
}
