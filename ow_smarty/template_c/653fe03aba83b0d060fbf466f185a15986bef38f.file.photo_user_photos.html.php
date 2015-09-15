<?php /* Smarty version Smarty-3.1.12, created on 2015-05-15 03:37:16
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/photo/views/controllers/photo_user_photos.html" */ ?>
<?php /*%%SmartyHeaderCode:386581995555a22c15a920-00664048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '653fe03aba83b0d060fbf466f185a15986bef38f' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/photo/views/controllers/photo_user_photos.html',
      1 => 1430991251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '386581995555a22c15a920-00664048',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pageHead' => 0,
    'userId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5555a22c1ad3c1_78380288',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5555a22c1ad3c1_78380288')) {function content_5555a22c1ad3c1_78380288($_smarty_tpl) {?><?php if (!is_callable('smarty_function_add_content')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.add_content.php';
if (!is_callable('smarty_function_component')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.component.php';
?>

<div class="clearfix"><?php echo smarty_function_add_content(array('key'=>'photo.add_content.list.top','listType'=>'userPhotos'),$_smarty_tpl);?>
</div>

<?php echo $_smarty_tpl->tpl_vars['pageHead']->value;?>


<?php echo smarty_function_component(array('class'=>"PHOTO_CMP_PhotoList",'type'=>"userPhotos",'userId'=>$_smarty_tpl->tpl_vars['userId']->value),$_smarty_tpl);?>

<?php }} ?>