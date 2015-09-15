<?php /* Smarty version Smarty-3.1.12, created on 2015-05-12 13:55:49
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/photo/views/controllers/photo_user_albums.html" */ ?>
<?php /*%%SmartyHeaderCode:15826530355523ea58777b5-46162732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cf9393a7b3a98370933ce8ca2a69e79a6277efb' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/photo/views/controllers/photo_user_albums.html',
      1 => 1430991251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15826530355523ea58777b5-46162732',
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
  'unifunc' => 'content_55523ea58d3480_01969958',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55523ea58d3480_01969958')) {function content_55523ea58d3480_01969958($_smarty_tpl) {?><?php if (!is_callable('smarty_function_add_content')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.add_content.php';
if (!is_callable('smarty_function_component')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.component.php';
?>

<div class="clearfix"><?php echo smarty_function_add_content(array('key'=>'photo.add_content.list.top','listType'=>'albums'),$_smarty_tpl);?>
</div>

<?php echo $_smarty_tpl->tpl_vars['pageHead']->value;?>


<?php echo smarty_function_component(array('class'=>"PHOTO_CMP_PhotoList",'type'=>"albums",'userId'=>$_smarty_tpl->tpl_vars['userId']->value),$_smarty_tpl);?>

<?php }} ?>