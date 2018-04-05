<?php
/* Smarty version 3.1.30, created on 2017-11-21 19:24:35
  from "D:\Apache2.2\htdocs\smarty\stuMajor\templates\exec.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a140cf3efa2f6_01946821',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a7cabad97f976efcc0f3a8eb8a10035023da8e7' => 
    array (
      0 => 'D:\\Apache2.2\\htdocs\\smarty\\stuMajor\\templates\\exec.html',
      1 => 1511263466,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a140cf3efa2f6_01946821 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- id  | name | sex | age | learn  | salary | extramoney | nativeplace -->
<div class="h4"><?php echo $_smarty_tpl->tpl_vars['subVal']->value;?>
</div>
<form action="list.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&flag=<?php echo $_smarty_tpl->tpl_vars['var1']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['upData']->value['id'];?>
" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="name" class="control-label col-xs-2">Name:</label>
        <div class="col-xs-6">
            <input id="name" type="text" name="name" class="form-control" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['upData']->value['name'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </div>
    </div>
    <div class="form-group">
        <label for="sex" class="control-label col-xs-2">Sex:</label>
        <div class="col-xs-6">
            <input id="sex" type="text" name="sex" class="form-control" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['upData']->value['sex'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </div>
    </div>
    <div class="form-group">
        <label for="age" class="control-label col-xs-2">Age:</label>
        <div class="col-xs-6">
            <input id="age" type="number" name="age" class="form-control" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['upData']->value['age'])===null||$tmp==='' ? 0 : $tmp);?>
" />
        </div>
    </div>
    <div class="form-group">
        <label for="learn" class="control-label col-xs-2">Learn:</label>
        <div class="col-xs-6">
            <input id="learn" type="text" name="learn" class="form-control" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['upData']->value['learn'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </div>
    </div>
    <div class="form-group">
        <label for="salary" class="control-label col-xs-2">Salary:</label>
        <div class="col-xs-6">
            <input id="salary" type="number" name="salary" class="form-control" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['upData']->value['salary'])===null||$tmp==='' ? 0 : $tmp);?>
" />
        </div>
    </div>
    <div class="form-group">
        <label for="extramoney" class="control-label col-xs-2">Extramoney:</label>
        <div class="col-xs-6">
            <input id="extramoney" type="number" name="extramoney" class="form-control"  value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['upData']->value['extramoney'])===null||$tmp==='' ? 0 : $tmp);?>
"/>
        </div>
    </div>
    <div class="form-group">
        <label for="nativeplace" class="control-label col-xs-2">Nativeplace:</label>
        <div class="col-xs-6">
            <input id="nativeplace" type="text" name="nativeplace" class="form-control" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['upData']->value['nativeplace'])===null||$tmp==='' ? '' : $tmp);?>
" />
        </div>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" value="<?php echo $_smarty_tpl->tpl_vars['subVal']->value;?>
" />
    </div>
</form><?php }
}
