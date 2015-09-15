<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 08:47:24
         compiled from "E:\wamp\www\hammu\ow_system_plugins\base\views\components\widget_menu.html" */ ?>
<?php /*%%SmartyHeaderCode:10176558900fce3e753-15230618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4770137895de01f0205ee5fea8ea2e024771cb0e' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_system_plugins\\base\\views\\components\\widget_menu.html',
      1 => 1432102794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10176558900fce3e753-15230618',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'tab' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_558900fce63cf9_13635675',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558900fce63cf9_13635675')) {function content_558900fce63cf9_13635675($_smarty_tpl) {?><div class="clearfix">
	<div class="ow_box_menu">
		<?php  $_smarty_tpl->tpl_vars['tab'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tab']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->key => $_smarty_tpl->tpl_vars['tab']->value){
$_smarty_tpl->tpl_vars['tab']->_loop = true;
?>
			<a href="javascript://" id="<?php echo $_smarty_tpl->tpl_vars['tab']->value['id'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['tab']->value['active'])&&$_smarty_tpl->tpl_vars['tab']->value['active']){?> class="active"<?php }?>><span><?php echo $_smarty_tpl->tpl_vars['tab']->value['label'];?>
</span></a>
		<?php } ?>
	</div>
</div><?php }} ?>