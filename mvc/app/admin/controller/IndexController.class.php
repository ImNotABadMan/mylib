<?php
/**
 * @Author: anchen
 * @Date:   2017-12-13 12:46:34
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-12-14 08:30:54
 */
namespace admin\controller;
use \core\Controller;

class IndexController extends Controller{
    public function showIndex(){
        echo "<h1>MVC Success ^_^</h1>";
        $row = M("\\model\\IndexModel")->getRow("*", "cate_blog", "1");

        $this->assign("row", $row);
        $this->assign("smartyStr", "<h1>Smarty Success :)</h1>");
        $this->display("Index/index.html");
    }
}