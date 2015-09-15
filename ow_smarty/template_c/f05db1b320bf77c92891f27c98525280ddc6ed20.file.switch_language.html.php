<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 08:46:42
         compiled from "E:\wamp\www\hammu\ow_system_plugins\base\views\components\switch_language.html" */ ?>
<?php /*%%SmartyHeaderCode:952558900d2246970-80989753%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f05db1b320bf77c92891f27c98525280ddc6ed20' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_system_plugins\\base\\views\\components\\switch_language.html',
      1 => 1432102806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '952558900d2246970-80989753',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'language' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_558900d2262029_28536617',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558900d2262029_28536617')) {function content_558900d2262029_28536617($_smarty_tpl) {?><ul class="ow_console_lang">
    <?php  $_smarty_tpl->tpl_vars["language"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["language"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["language"]->key => $_smarty_tpl->tpl_vars["language"]->value){
$_smarty_tpl->tpl_vars["language"]->_loop = true;
?>
        <li class="ow_console_lang_item" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['language']->value['url'];?>
';"><span class="<?php echo $_smarty_tpl->tpl_vars['language']->value['class'];?>
"><?php echo $_smarty_tpl->tpl_vars['language']->value['label'];?>
</span></li>
    <?php } ?>
</ul><?php }} ?>