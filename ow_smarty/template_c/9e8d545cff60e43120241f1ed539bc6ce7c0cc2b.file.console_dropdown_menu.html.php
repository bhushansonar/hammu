<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 08:46:42
         compiled from "E:\wamp\www\hammu\ow_system_plugins\base\views\components\console_dropdown_menu.html" */ ?>
<?php /*%%SmartyHeaderCode:21905558900d2278e12-78032302%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e8d545cff60e43120241f1ed539bc6ce7c0cc2b' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_system_plugins\\base\\views\\components\\console_dropdown_menu.html',
      1 => 1432102847,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21905558900d2278e12-78032302',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'sitems' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_558900d22b5fd9_45700261',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558900d22b5fd9_45700261')) {function content_558900d22b5fd9_45700261($_smarty_tpl) {?><ul class="ow_console_dropdown">
    <?php  $_smarty_tpl->tpl_vars["sitems"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["sitems"]->_loop = false;
 $_smarty_tpl->tpl_vars["section"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["sitems"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars["sitems"]->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars["sitems"]->key => $_smarty_tpl->tpl_vars["sitems"]->value){
$_smarty_tpl->tpl_vars["sitems"]->_loop = true;
 $_smarty_tpl->tpl_vars["section"]->value = $_smarty_tpl->tpl_vars["sitems"]->key;
 $_smarty_tpl->tpl_vars["sitems"]->iteration++;
 $_smarty_tpl->tpl_vars["sitems"]->last = $_smarty_tpl->tpl_vars["sitems"]->iteration === $_smarty_tpl->tpl_vars["sitems"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cddm"]['last'] = $_smarty_tpl->tpl_vars["sitems"]->last;
?>
        <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sitems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value){
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
            <li class="<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['class'])){?><?php echo $_smarty_tpl->tpl_vars['item']->value['class'];?>
<?php }?> ow_dropdown_menu_item ow_cursor_pointer" >
                <div class="ow_console_dropdown_cont">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</a>
                </div>
            </li>
        <?php } ?>

        <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['cddm']['last']){?>
            <li><div class="ow_console_divider"></div></li>
        <?php }?>
    <?php } ?>
</ul><?php }} ?>