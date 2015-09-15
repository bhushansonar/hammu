<?php /* Smarty version Smarty-3.1.12, created on 2015-05-18 01:41:51
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/components/moderation_panel_list.html" */ ?>
<?php /*%%SmartyHeaderCode:193383737955597b9fa65827-76494429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1934b9a7b54ca72f177767d1901e1f826f2d3a98' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/components/moderation_panel_list.html',
      1 => 1430993610,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193383737955597b9fa65827-76494429',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55597b9fa8e333_74936732',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55597b9fa8e333_74936732')) {function content_55597b9fa8e333_74936732($_smarty_tpl) {?><ul class="ow_regular">
    <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value){
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
        <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</a> <span class="ow_lbutton ow_green"><?php echo $_smarty_tpl->tpl_vars['item']->value['count'];?>
</span>
        </li>
    <?php } ?>
</ul><?php }} ?>