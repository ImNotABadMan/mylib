<?php
/* Smarty version 3.1.30, created on 2017-11-21 14:44:16
  from "D:\Apache2.2\htdocs\smarty\stuMajor\templates\list.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a13cb40a2b023_61917856',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ccdc91db5ddfb1a0abbbc2e789ff6d1c8fa62b0' => 
    array (
      0 => 'D:\\Apache2.2\\htdocs\\smarty\\stuMajor\\templates\\list.html',
      1 => 1511246653,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:insert.html' => 2,
    'file:exec.html' => 1,
  ),
),false)) {
function content_5a13cb40a2b023_61917856 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>学生管理系统</title>
        <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
        <?php echo '<script'; ?>
 src="./bootstrap/jQuery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="./bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
    </head>
    <style>
    
        #pre,#next{
            cursor: pointer;
        }
        .left{
            position: fixed;
            left: 0px;
            top: 0px;
            width: 4%;
            height: 100%;
            background-color: #0165ad;
            transition-duration: 0.5s;
        }
        .left:hover{
            width: 10%;
        }
        .pageshow{
            animation-duration: 1s;
            animation-fill-mode: forwards;
            animation-name: sh;
        }
        @-webkit-keyframes sh{
            from{ margin-left: 0px; }
            to{ margin-left: 2px; }
        }
    
    </style>
    <body>
        <div class="alert alert-success fade in" style="text-align: center;<?php ob_start();
echo (($tmp = @$_smarty_tpl->tpl_vars['re']->value)===null||$tmp==='' ? 0 : $tmp);
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1 == 0) {?> display: none; <?php }?>}">
            <?php ob_start();
echo (($tmp = @$_smarty_tpl->tpl_vars['re']->value)===null||$tmp==='' ? 0 : $tmp);
$_prefixVariable2=ob_get_clean();
if ($_prefixVariable2 == 11) {?>
                新增成功
            <?php } else {
ob_start();
echo (($tmp = @$_smarty_tpl->tpl_vars['re']->value)===null||$tmp==='' ? 0 : $tmp);
$_prefixVariable3=ob_get_clean();
if ($_prefixVariable3 == 10) {?>
                新增失败
            <?php } else {
ob_start();
echo (($tmp = @$_smarty_tpl->tpl_vars['re']->value)===null||$tmp==='' ? 0 : $tmp);
$_prefixVariable4=ob_get_clean();
if ($_prefixVariable4 == 22) {?>
                更新成功
            <?php } else {
ob_start();
echo (($tmp = @$_smarty_tpl->tpl_vars['re']->value)===null||$tmp==='' ? 0 : $tmp);
$_prefixVariable5=ob_get_clean();
if ($_prefixVariable5 == 20) {?>
                更新失败
            <?php } else {
ob_start();
echo (($tmp = @$_smarty_tpl->tpl_vars['re']->value)===null||$tmp==='' ? 0 : $tmp);
$_prefixVariable6=ob_get_clean();
if ($_prefixVariable6 == 33) {?>
                删除成功
            <?php } else {
ob_start();
echo (($tmp = @$_smarty_tpl->tpl_vars['re']->value)===null||$tmp==='' ? 0 : $tmp);
$_prefixVariable7=ob_get_clean();
if ($_prefixVariable7 == 30) {?>
                删除失败
            <?php } else { ?>
            <?php }}}}}}?>
            <a data-dismiss="alert" class="close" href="javascript:close();" aria-hidden="true">&times;</a>
        </div>
        <div class="left"></div>
        <div class="container">
            <div class="h5">
                <!-- <a href="http://www.smarty.com/stuMajor/list.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&flag=1">添加学生</a> -->
                <?php $_smarty_tpl->_subTemplateRender("file:insert.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('var1'=>11,'subVal'=>"新增"), 0, false);
?>

            </div>
            <table class="table table-hover table-striped">
                <tr>
                    <td>序号</td>
                    <!-- PHP column -->
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cols']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</td>
                        <?php
}
} else {
?>

                        <td>没有内容</td>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <td>操作</td>
                </tr>
                <!-- list row -->
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'row', false, 'key', 'f_row', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_f_row']->value['iteration']++;
?>
                    <tr>
                        <td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_f_row']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_f_row']->value['iteration'] : null);?>
</td>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['row']->value, 'value', false, 'row_key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row_key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</td>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        <td><a href="http://www.smarty.com/stuMajor/list.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&flag=2&id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">编辑</a>&nbsp;&nbsp;<a id="del" href="javascript:isDel(<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
)">删除</a></td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </table>

            <div style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['pageHtml']->value;?>
</div>
            <?php ob_start();
echo $_smarty_tpl->tpl_vars['flag']->value;
$_prefixVariable8=ob_get_clean();
if ($_prefixVariable8 == 1) {?>
                <!-- <hr /> -->
                <!-- <?php $_smarty_tpl->_subTemplateRender("file:insert.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('var1'=>11,'subVal'=>"新增"), 0, true);
?>
 -->
            <?php } else {
ob_start();
echo $_smarty_tpl->tpl_vars['flag']->value;
$_prefixVariable9=ob_get_clean();
if ($_prefixVariable9 == 2) {?>
                <hr />
                <?php $_smarty_tpl->_subTemplateRender("file:exec.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('var1'=>22,'subVal'=>"更新"), 0, false);
?>

            <?php }}?>
        </div>
    </body>
    <?php echo '<script'; ?>
>
        // var delA = document.getElementById("del");
        function isDel(id){
            if(confirm("是否删除？")){
                location.href = "http://www.smarty.com/stuMajor/list.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&flag=33&id=" + id;
                return true;
            }else{
                return false;
            }
        }
        function close(){
            $(".alert").alert('close');
        }

        var pre = document.getElementById("pre");
        var next = document.getElementById("next");
        if(pre != null){
            pre.onclick = function(){
                var page = <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
;
                this.innerHTML = "";
                for(var i = 2; i < page - 2; i++){
                    var a = document.createElement("a");
                    a.className = "btn btn-primary btn-xs pageshow";
                    a.innerHTML = i;
                    a.href = "http://www.smarty.com/stuMajor/list.php?page=" + i;
                    this.appendChild(a);
                }
            }
        }
        if(next != null){
            next.onclick = function(){
                var page = <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
;
                var pageCount = <?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
;
                this.innerHTML = "";
                for(var i = page + 3; i < pageCount; i++){
                    var a = document.createElement("a");
                    a.className = "btn btn-primary btn-xs pageshow";
                    a.innerHTML = i;
                    a.href = "http://www.smarty.com/stuMajor/list.php?page=" + i;
                    this.appendChild(a);
                }
            }
        }
    <?php echo '</script'; ?>
>
</html><?php }
}
