<?php /* Smarty version Smarty-3.1.12, created on 2015-05-19 02:24:37
         compiled from "E:\wamp\www\hammu\ow_plugins\moderation\views\components\console_item.html" */ ?>
<?php /*%%SmartyHeaderCode:23891555ad7253cc373-85854564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61aa783bf1a30052c482d0ae488f3fc8ede94c61' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\moderation\\views\\components\\console_item.html',
      1 => 1431930854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23891555ad7253cc373-85854564',
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
  'unifunc' => 'content_555ad7254242c1_59476222',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555ad7254242c1_59476222')) {function content_555ad7254242c1_59476222($_smarty_tpl) {?><ul class="ow_console_dropdown">
    <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value){
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
        <li class="ow_dropdown_menu_item ow_cursor_pointer" >
            <div class="ow_console_dropdown_cont">
                <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" class="clearfix">
                    <span class="ow_left"><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>
                    <span class="ow_count_wrap ow_right">          
                        <span class="ow_count_bg">           
                            <span class="ow_count"><?php echo $_smarty_tpl->tpl_vars['item']->value['count'];?>
</span>          
                        </span>    
                    </span>
                </a>
            </div>
        </li>
    <?php } ?>
</ul><?php }} ?>