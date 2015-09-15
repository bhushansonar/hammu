<?php /* Smarty version Smarty-3.1.12, created on 2015-05-12 10:14:48
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/components/my_avatar_widget.html" */ ?>
<?php /*%%SmartyHeaderCode:7073065555520ad8166e27-24757436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e743a0cd916b7737ab76f6f1bc2ca4bf61c72bf' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/components/my_avatar_widget.html',
      1 => 1430993610,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7073065555520ad8166e27-24757436',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'avatar' => 0,
    'site_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55520ad8191945_84633796',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55520ad8191945_84633796')) {function content_55520ad8191945_84633796($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.style.php';
if (!is_callable('smarty_function_decorator')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.decorator.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


.ow_box_empty{ padding:0px !important; }
.ladyhome_left .ow_stdmargin{ margin-bottom:60px !important;}
.sign_joinbtn{ line-height:60px !important;}


<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<div class="ow_my_avatar_widget clearfix my_img">
	<div class="ow_left ow_my_avatar_img lady_pic"><?php echo smarty_function_decorator(array('name'=>'avatar_item','data'=>$_smarty_tpl->tpl_vars['avatar']->value),$_smarty_tpl);?>
</div>
    <div class="ow_my_avatar_cont my_name">
    	<a href="<?php echo $_smarty_tpl->tpl_vars['avatar']->value['url'];?>
" class="ow_my_avatar_username"><span><?php echo $_smarty_tpl->tpl_vars['avatar']->value['title'];?>
</span></a>
    </div>
        <div class="lady_btn">
            <a class="sign_joinbtn" href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
sign-out">Sign Out</a>
        </div>
</div><?php }} ?>