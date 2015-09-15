<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 08:47:25
         compiled from "E:\wamp\www\hammu\ow_system_plugins\base\views\components\join_button.html" */ ?>
<?php /*%%SmartyHeaderCode:9095558900fd84bb76-20823740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12c823a355c744a85079612902f5fdda4cef5164' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_system_plugins\\base\\views\\components\\join_button.html',
      1 => 1432102822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9095558900fd84bb76-20823740',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'class' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_558900fd85c3b6_49553692',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558900fd85c3b6_49553692')) {function content_558900fd85c3b6_49553692($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
?><div class="ow_join_button">
    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo smarty_function_text(array('key'=>"base+join_index_join_button"),$_smarty_tpl);?>
</a>
</div><?php }} ?>