<?php /* Smarty version Smarty-3.1.12, created on 2015-05-19 02:24:37
         compiled from "E:\wamp\www\hammu\ow_plugins\photo\views\controllers\photo_user_albums.html" */ ?>
<?php /*%%SmartyHeaderCode:10562555ad7250dd0b4-87563689%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a69e4de4f836d9f57f3ff54d1002f3c415d38dd' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\photo\\views\\controllers\\photo_user_albums.html',
      1 => 1431930985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10562555ad7250dd0b4-87563689',
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
  'unifunc' => 'content_555ad725184998_69506910',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555ad725184998_69506910')) {function content_555ad725184998_69506910($_smarty_tpl) {?><?php if (!is_callable('smarty_function_add_content')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.add_content.php';
if (!is_callable('smarty_function_component')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.component.php';
?>

<div class="clearfix"><?php echo smarty_function_add_content(array('key'=>'photo.add_content.list.top','listType'=>'albums'),$_smarty_tpl);?>
</div>

<?php echo $_smarty_tpl->tpl_vars['pageHead']->value;?>


<?php echo smarty_function_component(array('class'=>"PHOTO_CMP_PhotoList",'type'=>"albums",'userId'=>$_smarty_tpl->tpl_vars['userId']->value),$_smarty_tpl);?>

<?php }} ?>