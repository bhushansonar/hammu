<?php /* Smarty version Smarty-3.1.12, created on 2015-05-12 13:55:49
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/moderation/views/components/console_item.html" */ ?>
<?php /*%%SmartyHeaderCode:166990924555523ea59a1c32-05631207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b807c6971fb7595dba3322d49f854c1be23d4d76' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/moderation/views/components/console_item.html',
      1 => 1430991150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166990924555523ea59a1c32-05631207',
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
  'unifunc' => 'content_55523ea59ccf11_79662047',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55523ea59ccf11_79662047')) {function content_55523ea59ccf11_79662047($_smarty_tpl) {?><ul class="ow_console_dropdown">
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