<?php /* Smarty version Smarty-3.1.12, created on 2015-05-18 06:42:23
         compiled from "E:\wamp\www\hammu\ow_system_plugins\base\views\components\vertical_menu.html" */ ?>
<?php /*%%SmartyHeaderCode:294695559c20feecc56-69996447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9240c35d6f2d9c6d0deb9c8dd9fb429bd154d72' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_system_plugins\\base\\views\\components\\vertical_menu.html',
      1 => 1431929549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '294695559c20feecc56-69996447',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'class' => 0,
    'data' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5559c20ff31661_69315975',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559c20ff31661_69315975')) {function content_5559c20ff31661_69315975($_smarty_tpl) {?><div class="ow_vertical_nav <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
">
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['new_window']){?> target="_blank"<?php }?> class="ow_vertical_nav_item clearfix <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['active'])){?>selected<?php }?>">
        <span><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>
        <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['number'])){?>
        <span class="ow_count_wrap">
            <span class="ow_count_bg">
                <span class="ow_count"><?php echo $_smarty_tpl->tpl_vars['item']->value['number'];?>
</span>
            </span>
        </span>
        <?php }?>
    </a>
    <?php } ?>
</div><?php }} ?>