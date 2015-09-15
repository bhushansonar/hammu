<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 08:46:42
         compiled from "E:\wamp\www\hammu\ow_system_plugins\base\decorators\tooltip.html" */ ?>
<?php /*%%SmartyHeaderCode:9060558900d2334766-03081994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49b618beb81550dfbd7bac62588df1d647751127' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_system_plugins\\base\\decorators\\tooltip.html',
      1 => 1432102667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9060558900d2334766-03081994',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_558900d234c9f1_52153109',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558900d234c9f1_52153109')) {function content_558900d234c9f1_52153109($_smarty_tpl) {?>
<div class="ow_tooltip <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['addClass'])){?> <?php echo $_smarty_tpl->tpl_vars['data']->value['addClass'];?>
<?php }?>">
    <div class="ow_tooltip_tail">
        <span></span>
    </div>
    <div class="ow_tooltip_body">
        <?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>

    </div>
</div><?php }} ?>