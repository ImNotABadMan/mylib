<?php
/* Smarty version 3.1.30, created on 2017-12-02 10:43:03
  from "D:\Apache2.2\htdocs\lib\php\php_bootstrap_demo\templates\insert.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a221337968ae1_40043859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b5b4733bd71589a2b17b3b165c76175d0f18141' => 
    array (
      0 => 'D:\\Apache2.2\\htdocs\\lib\\php\\php_bootstrap_demo\\templates\\insert.html',
      1 => 1511235617,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a221337968ae1_40043859 (Smarty_Internal_Template $_smarty_tpl) {
?>
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">添加学生</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $_smarty_tpl->tpl_vars['subVal']->value;?>
</h4>
      </div>
      <div class="modal-body">
        <!-- id  | name | sex | age | learn  | salary | extramoney | nativeplace -->
        <!-- <div class="h4"><?php echo $_smarty_tpl->tpl_vars['subVal']->value;?>
</div> -->
        <form action="list.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&flag=<?php echo $_smarty_tpl->tpl_vars['var1']->value;?>
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
            <!-- <div class="form-group">
                <input type="submit" class="btn btn-primary" value="<?php echo $_smarty_tpl->tpl_vars['subVal']->value;?>
" />
            </div> -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button id="btn" type="button" class="btn btn-primary">新增</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php echo '<script'; ?>
>
     var btn = document.getElementById("btn");
     btn.onclick = function(){
        location.href = "list.php?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
&flag=<?php echo $_smarty_tpl->tpl_vars['var1']->value;?>
";
     }
<?php echo '</script'; ?>
>
<?php }
}
