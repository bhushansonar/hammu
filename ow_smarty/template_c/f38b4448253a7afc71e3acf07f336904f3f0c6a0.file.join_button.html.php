<?php /* Smarty version Smarty-3.1.12, created on 2015-05-12 01:29:47
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/components/join_button.html" */ ?>
<?php /*%%SmartyHeaderCode:12155916955518fcb0dfe71-65863555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f38b4448253a7afc71e3acf07f336904f3f0c6a0' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/components/join_button.html',
      1 => 1430993609,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12155916955518fcb0dfe71-65863555',
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
  'unifunc' => 'content_55518fcb0e8d34_60180912',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55518fcb0e8d34_60180912')) {function content_55518fcb0e8d34_60180912($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.text.php';
?><div class="ow_join_button">
    <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
"><?php echo smarty_function_text(array('key'=>"base+join_index_join_button"),$_smarty_tpl);?>
</a>
</div><?php }} ?>