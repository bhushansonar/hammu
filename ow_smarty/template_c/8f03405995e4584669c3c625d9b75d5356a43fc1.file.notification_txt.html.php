<?php /* Smarty version Smarty-3.1.12, created on 2015-05-18 00:32:45
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/matchmaking/views/components/notification_txt.html" */ ?>
<?php /*%%SmartyHeaderCode:101185052255596b6d599152-48463819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f03405995e4584669c3c625d9b75d5356a43fc1' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/matchmaking/views/components/notification_txt.html',
      1 => 1430991128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101185052255596b6d599152-48463819',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userName' => 0,
    'nl' => 0,
    'list' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55596b6d6b6546_79798718',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55596b6d6b6546_79798718')) {function content_55596b6d6b6546_79798718($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.text.php';
?><?php echo smarty_function_text(array('key'=>"matchmaking+email_txt_head",'userName'=>$_smarty_tpl->tpl_vars['userName']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['nl']->value;?>
<?php echo smarty_function_text(array('key'=>"matchmaking+email_html_description"),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['nl']->value;?>
<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['user']->value['displayName'];?>
<?php echo $_smarty_tpl->tpl_vars['nl']->value;?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['sex'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['age'];?>
<?php echo $_smarty_tpl->tpl_vars['nl']->value;?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['googlemap_location'];?>
<?php echo $_smarty_tpl->tpl_vars['nl']->value;?>
<?php echo smarty_function_text(array('key'=>"matchmaking+compatibility"),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->tpl_vars['user']->value['compatibility'];?>
%<?php echo $_smarty_tpl->tpl_vars['nl']->value;?>
<?php echo $_smarty_tpl->tpl_vars['nl']->value;?>
<?php } ?><?php echo $_smarty_tpl->tpl_vars['nl']->value;?>
<?php echo smarty_function_text(array('key'=>"matchmaking+email_txt_bottom"),$_smarty_tpl);?>




<?php }} ?>