<?php /* Smarty version Smarty-3.1.12, created on 2015-05-12 10:15:04
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/photo/views/controllers/photo_view_list.html" */ ?>
<?php /*%%SmartyHeaderCode:27655361655520ae88ab012-07618302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adec6bb3c02e94a1de01cd2394190e705ddc3cf3' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/photo/views/controllers/photo_view_list.html',
      1 => 1430991252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27655361655520ae88ab012-07618302',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'listType' => 0,
    'pageHead' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55520ae88c68a6_40931755',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55520ae88c68a6_40931755')) {function content_55520ae88c68a6_40931755($_smarty_tpl) {?><?php if (!is_callable('smarty_function_add_content')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.add_content.php';
if (!is_callable('smarty_function_component')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.component.php';
?>

<div class="clearfix"><?php echo smarty_function_add_content(array('key'=>'photo.add_content.list.top','listType'=>$_smarty_tpl->tpl_vars['listType']->value),$_smarty_tpl);?>
</div>

<?php echo $_smarty_tpl->tpl_vars['pageHead']->value;?>


<?php echo smarty_function_component(array('class'=>"PHOTO_CMP_PhotoList",'type'=>$_smarty_tpl->tpl_vars['listType']->value),$_smarty_tpl);?>

<?php }} ?>