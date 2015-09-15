<?php /* Smarty version Smarty-3.1.12, created on 2015-05-16 01:25:09
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/controllers/user_standard_sign_in.html" */ ?>
<?php /*%%SmartyHeaderCode:1956645805556d4b5c398c9-74641491%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '178e2effde8965f0ce703924c44193e404789e32' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/controllers/user_standard_sign_in.html',
      1 => 1430993631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1956645805556d4b5c398c9-74641491',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sign_in_form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5556d4b5d2bee1_86697576',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5556d4b5d2bee1_86697576')) {function content_5556d4b5d2bee1_86697576($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.style.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


.ow_sign_in_wrap {
	position:absolute;
	top:200px;
	left:50%;
	margin:0 0 0 -351px;
}

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<div class="ow_sign_in_cont">
    <?php echo $_smarty_tpl->tpl_vars['sign_in_form']->value;?>

</div>
<?php }} ?>