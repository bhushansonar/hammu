<?php /* Smarty version Smarty-3.1.12, created on 2015-08-11 12:16:51
         compiled from "E:\wamp\www\hammu\ow_plugins\membership\views\controllers\admin_subscribe.html" */ ?>
<?php /*%%SmartyHeaderCode:1686655c9cb93464c49-85261861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2256c2d3a9fdc4e5684b2817c2e5fd2e55f1d091' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\membership\\views\\controllers\\admin_subscribe.html',
      1 => 1432099328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1686655c9cb93464c49-85261861',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'groupActionList' => 0,
    'groupAction' => 0,
    'labels' => 0,
    'action' => 0,
    'altClass' => 0,
    'actionName' => 0,
    'actionId' => 0,
    'hidden' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55c9cb93636d45_10103039',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c9cb93636d45_10103039')) {function content_55c9cb93636d45_10103039($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_math')) include 'E:\\wamp\\www\\hammu\\ow_libraries\\smarty3\\plugins\\function.math.php';
if (!is_callable('smarty_function_cycle')) include 'E:\\wamp\\www\\hammu\\ow_libraries\\smarty3\\plugins\\function.cycle.php';
if (!is_callable('smarty_function_decorator')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.decorator.php';
?>
<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>


<form method="post">
<div class="ow_admin_permissions ow_superwide ow_automargin ow_center">
<table class="ow_table_1 ow_form ow_stdmargin">

<tr class="ow_tr_first ow_tr_last">
    <th align="left">Action</th>
    <th width="20%"><?php echo smarty_function_text(array('key'=>'membership+show_on_subscribe'),$_smarty_tpl);?>
</th>
</tr>

<tr class="ow_tr_delimiter"><td></td></tr>
<?php  $_smarty_tpl->tpl_vars['groupAction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['groupAction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groupActionList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['groupAction']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['groupAction']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['groupAction']->key => $_smarty_tpl->tpl_vars['groupAction']->value){
$_smarty_tpl->tpl_vars['groupAction']->_loop = true;
 $_smarty_tpl->tpl_vars['groupAction']->iteration++;
 $_smarty_tpl->tpl_vars['groupAction']->last = $_smarty_tpl->tpl_vars['groupAction']->iteration === $_smarty_tpl->tpl_vars['groupAction']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['group']['last'] = $_smarty_tpl->tpl_vars['groupAction']->last;
?>
	<?php echo smarty_function_math(array('equation'=>"count",'count'=>count($_smarty_tpl->tpl_vars['groupAction']->value['actions']),'assign'=>'size'),$_smarty_tpl);?>

	<?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groupAction']->value['actions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['action']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['action']->iteration=0;
 $_smarty_tpl->tpl_vars['action']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value){
$_smarty_tpl->tpl_vars['action']->_loop = true;
 $_smarty_tpl->tpl_vars['action']->iteration++;
 $_smarty_tpl->tpl_vars['action']->index++;
 $_smarty_tpl->tpl_vars['action']->first = $_smarty_tpl->tpl_vars['action']->index === 0;
 $_smarty_tpl->tpl_vars['action']->last = $_smarty_tpl->tpl_vars['action']->iteration === $_smarty_tpl->tpl_vars['action']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['itm']['first'] = $_smarty_tpl->tpl_vars['action']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['itm']['last'] = $_smarty_tpl->tpl_vars['action']->last;
?>
	<tr class="ow_tr_first">
	    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['itm']['first']){?>
            <th colspan="2" ><?php if (!empty($_smarty_tpl->tpl_vars['labels']->value[$_smarty_tpl->tpl_vars['groupAction']->value['name']])){?><?php echo $_smarty_tpl->tpl_vars['labels']->value[$_smarty_tpl->tpl_vars['groupAction']->value['name']]['label'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['groupAction']->value['name'];?>
<?php }?></th>
	    <?php }?>
	</tr>
	<tr <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['itm']['last']){?>class="ow_tr_last"<?php }?>>
	    <?php $_smarty_tpl->_capture_stack[0][] = array('default', 'altClass', null); ob_start(); ?><?php echo smarty_function_cycle(array('values'=>'ow_alt1,ow_alt2'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php $_smarty_tpl->_capture_stack[0][] = array('default', 'actionName', null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['action']->value->name;?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	    <td class="<?php echo $_smarty_tpl->tpl_vars['altClass']->value;?>
 ow_txtleft"><?php if (!empty($_smarty_tpl->tpl_vars['labels']->value[$_smarty_tpl->tpl_vars['groupAction']->value['name']]['actions'][$_smarty_tpl->tpl_vars['actionName']->value])){?><?php echo $_smarty_tpl->tpl_vars['labels']->value[$_smarty_tpl->tpl_vars['groupAction']->value['name']]['actions'][$_smarty_tpl->tpl_vars['actionName']->value];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['actionName']->value;?>
<?php }?></td>
        <td class="<?php echo $_smarty_tpl->tpl_vars['altClass']->value;?>
">
            <?php $_smarty_tpl->tpl_vars['actionId'] = new Smarty_variable($_smarty_tpl->tpl_vars['action']->value->id, null, 0);?>
            <input type="hidden" name="actions[<?php echo $_smarty_tpl->tpl_vars['actionId']->value;?>
]" value="0" />
            <input type="checkbox" name="actions[<?php echo $_smarty_tpl->tpl_vars['actionId']->value;?>
]" <?php if (!in_array($_smarty_tpl->tpl_vars['actionId']->value,$_smarty_tpl->tpl_vars['hidden']->value)){?>checked="checked"<?php }?> value="1" />
        </td>
	</tr>
	<?php } ?>
	<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['group']['last']){?><tr class="ow_tr_delimiter"><td colspan="3"></td></tr><?php }?>
<?php } ?>

</table>
<div class="clearfix ow_stdmargin ow_submit"><div class="ow_right"><?php echo smarty_function_decorator(array('name'=>"button",'type'=>"submit",'langLabel'=>"admin+save_btn_label",'class'=>"ow_ic_save ow_positive"),$_smarty_tpl);?>
</div></div>
</div>

</form> 
<?php }} ?>