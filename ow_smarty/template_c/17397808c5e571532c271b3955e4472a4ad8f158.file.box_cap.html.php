<?php /* Smarty version Smarty-3.1.12, created on 2015-05-15 03:34:18
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/decorators/box_cap.html" */ ?>
<?php /*%%SmartyHeaderCode:12613079915555a17abe16d0-75640598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17397808c5e571532c271b3955e4472a4ad8f158' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/decorators/box_cap.html',
      1 => 1430993521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12613079915555a17abe16d0-75640598',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5555a17ac47410_57923947',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5555a17ac47410_57923947')) {function content_5555a17ac47410_57923947($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.text.php';
?>
<div class="ow_box_cap<?php if (!empty($_smarty_tpl->tpl_vars['data']->value['type'])){?>_<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
<?php }?><?php if (!empty($_smarty_tpl->tpl_vars['data']->value['addClass'])){?> <?php echo $_smarty_tpl->tpl_vars['data']->value['addClass'];?>
<?php }?>">
	<div class="ow_box_cap_right">
		<div class="ow_box_cap_body">
			<h3 class="<?php if (!empty($_smarty_tpl->tpl_vars['data']->value['iconClass'])){?><?php echo $_smarty_tpl->tpl_vars['data']->value['iconClass'];?>
<?php }else{ ?>ow_ic_file<?php }?>">
			<?php if (!empty($_smarty_tpl->tpl_vars['data']->value['href'])){?><a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['href'];?>
" <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['extraString'])){?><?php echo $_smarty_tpl->tpl_vars['data']->value['extraString'];?>
<?php }?>><?php }?>
			<?php if (!empty($_smarty_tpl->tpl_vars['data']->value['langLabel'])){?>
			   <?php echo smarty_function_text(array('key'=>$_smarty_tpl->tpl_vars['data']->value['langLabel']),$_smarty_tpl);?>

			<?php }else{ ?>
			   <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['label'])){?><?php echo $_smarty_tpl->tpl_vars['data']->value['label'];?>
<?php }else{ ?>&nbsp;<?php }?>
		    <?php }?>
		    <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['href'])){?></a><?php }?>
			</h3>
		   <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['content'])){?><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
<?php }?>
		</div>
	</div>
</div><?php }} ?>