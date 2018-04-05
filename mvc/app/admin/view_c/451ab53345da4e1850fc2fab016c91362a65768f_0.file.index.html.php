<?php
/* Smarty version 3.1.30, created on 2017-12-13 21:03:15
  from "D:\Apache2.2\htdocs\lib\mvc\app\admin\view\Index\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a31251380d413_39895838',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '451ab53345da4e1850fc2fab016c91362a65768f' => 
    array (
      0 => 'D:\\Apache2.2\\htdocs\\lib\\mvc\\app\\admin\\view\\Index\\index.html',
      1 => 1513170104,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a31251380d413_39895838 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Index</title>
</head>
<body>
    <?php echo $_smarty_tpl->tpl_vars['smartyStr']->value;?>

    <div>
        <p>id : <?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</p>
        <p>title : <?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</p>
        <p>u_nickname : <?php echo $_smarty_tpl->tpl_vars['row']->value['u_nickname'];?>
</p>
        <p>c_name : <?php echo $_smarty_tpl->tpl_vars['row']->value['c_name'];?>
</p>
        <p>intro : <?php echo $_smarty_tpl->tpl_vars['row']->value['intro'];?>
</p>
        <p>content : <?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['row']->value['content']);?>
</p>
    </div>
</body>
</html><?php }
}
