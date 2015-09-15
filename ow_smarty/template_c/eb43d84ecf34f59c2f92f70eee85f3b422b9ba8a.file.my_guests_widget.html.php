<?php /* Smarty version Smarty-3.1.12, created on 2015-05-18 01:41:51
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/skapi/views/components/my_guests_widget.html" */ ?>
<?php /*%%SmartyHeaderCode:146718412055597b9f976a88-42021916%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb43d84ecf34f59c2f92f70eee85f3b422b9ba8a' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/skapi/views/components/my_guests_widget.html',
      1 => 1430991296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146718412055597b9f976a88-42021916',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'guests' => 0,
    'g' => 0,
    'guestId' => 0,
    'avatars' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55597b9f9f7045_70751175',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55597b9f9f7045_70751175')) {function content_55597b9f9f7045_70751175($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.style.php';
if (!is_callable('smarty_function_decorator')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.decorator.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


    .ow_guest_user {
        display: inline-block;
        margin: 0px 4px 0px 4px;
        text-align: center;
        width: 70px;
        line-height: 11px;
    }
    .ow_guest_time { height: 25px; padding-top: 3px; overflow: hidden; }

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="ow_center">
<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['guests']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
?>
    <?php $_smarty_tpl->_capture_stack[0][] = array('default', 'guestId', null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['g']->value->guestId;?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <div class="ow_guest_user ow_center">
        <?php echo smarty_function_decorator(array('name'=>'avatar_item','data'=>$_smarty_tpl->tpl_vars['avatars']->value[$_smarty_tpl->tpl_vars['guestId']->value],'isMarked'=>!empty($_smarty_tpl->tpl_vars['avatars']->value[$_smarty_tpl->tpl_vars['guestId']->value]['isMarked'])),$_smarty_tpl);?>

        <div class="ow_guest_time ow_tiny"><?php echo $_smarty_tpl->tpl_vars['g']->value->visitTimestamp;?>
<br /><br />&nbsp;</div>
    </div>
<?php } ?>
</div><?php }} ?>