<?php /* Smarty version Smarty-3.1.12, created on 2015-06-26 13:07:00
         compiled from "E:\wamp\www\hammu\ow_system_plugins\base\views\controllers\widget_panel_profile.html" */ ?>
<?php /*%%SmartyHeaderCode:5403558d3254de2f05-72684280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32af0ce4b60927cc2764a0bce52f0f1d1e189cfc' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_system_plugins\\base\\views\\controllers\\widget_panel_profile.html',
      1 => 1432102873,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5403558d3254de2f05-72684280',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'isSuspended' => 0,
    'isAdminViewer' => 0,
    'profileActionToolbar' => 0,
    'componentPanel' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_558d3254e02d05_33707715',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558d3254e02d05_33707715')) {function content_558d3254e02d05_33707715($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
?><?php if ($_smarty_tpl->tpl_vars['isSuspended']->value&&!$_smarty_tpl->tpl_vars['isAdminViewer']->value){?>
	<?php echo smarty_function_text(array('key'=>"base+user_page_suspended"),$_smarty_tpl);?>

<?php }else{ ?>
	<?php echo $_smarty_tpl->tpl_vars['profileActionToolbar']->value;?>

	<?php echo $_smarty_tpl->tpl_vars['componentPanel']->value;?>

<?php }?><?php }} ?>