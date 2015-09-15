<?php /* Smarty version Smarty-3.1.12, created on 2015-05-18 08:33:37
         compiled from "E:\wamp\www\hammu\ow_plugins\photo\views\controllers\photo_view_list.html" */ ?>
<?php /*%%SmartyHeaderCode:319785559dc21b65889-78465124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ca0168a114a2ce7ab231f1ed150aea4f9ca4e8f' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\photo\\views\\controllers\\photo_view_list.html',
      1 => 1431930983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319785559dc21b65889-78465124',
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
  'unifunc' => 'content_5559dc21b83317_27763439',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559dc21b83317_27763439')) {function content_5559dc21b83317_27763439($_smarty_tpl) {?><?php if (!is_callable('smarty_function_add_content')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.add_content.php';
if (!is_callable('smarty_function_component')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.component.php';
?>

<div class="clearfix"><?php echo smarty_function_add_content(array('key'=>'photo.add_content.list.top','listType'=>$_smarty_tpl->tpl_vars['listType']->value),$_smarty_tpl);?>
</div>

<?php echo $_smarty_tpl->tpl_vars['pageHead']->value;?>


<?php echo smarty_function_component(array('class'=>"PHOTO_CMP_PhotoList",'type'=>$_smarty_tpl->tpl_vars['listType']->value),$_smarty_tpl);?>

<?php }} ?>