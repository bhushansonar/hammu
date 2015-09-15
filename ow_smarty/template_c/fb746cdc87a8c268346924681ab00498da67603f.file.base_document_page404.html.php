<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 08:47:44
         compiled from "E:\wamp\www\hammu\ow_system_plugins\base\views\controllers\base_document_page404.html" */ ?>
<?php /*%%SmartyHeaderCode:626955890110576cf8-28667712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb746cdc87a8c268346924681ab00498da67603f' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_system_plugins\\base\\views\\controllers\\base_document_page404.html',
      1 => 1432102904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '626955890110576cf8-28667712',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base404RedirectMessage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_558901105cdc49_97410341',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558901105cdc49_97410341')) {function content_558901105cdc49_97410341($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
?><?php if (!empty($_smarty_tpl->tpl_vars['base404RedirectMessage']->value)){?><?php echo $_smarty_tpl->tpl_vars['base404RedirectMessage']->value;?>
<?php }else{ ?><?php echo smarty_function_text(array('key'=>'base+base_document_404'),$_smarty_tpl);?>
<?php }?>
<?php }} ?>