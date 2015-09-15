<?php /* Smarty version Smarty-3.1.12, created on 2015-05-19 03:01:36
         compiled from "E:\wamp\www\hammu\ow_plugins\bookmarks\views\components\avatar_user_list.html" */ ?>
<?php /*%%SmartyHeaderCode:7321555adfd0e22381-36755650%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29718a5036ad0e657f030b8f50981fa229ae55b3' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\bookmarks\\views\\components\\avatar_user_list.html',
      1 => 1431930661,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7321555adfd0e22381-36755650',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'css_class' => 0,
    'users' => 0,
    'user' => 0,
    'view_more_array' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_555adfd0ece873_01514443',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555adfd0ece873_01514443')) {function content_555adfd0ece873_01514443($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
?>

<div class="ow_lp_avatars<?php if (!empty($_smarty_tpl->tpl_vars['css_class']->value)){?> <?php echo $_smarty_tpl->tpl_vars['css_class']->value;?>
<?php }?>">
    <?php if (empty($_smarty_tpl->tpl_vars['users']->value)){?>
        <div class="ow_nocontent"><?php echo smarty_function_text(array('key'=>'base+empty_user_avatar_list'),$_smarty_tpl);?>
</div>
    <?php }else{ ?>
        <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
            <div class="ow_avatar<?php if (!empty($_smarty_tpl->tpl_vars['user']->value['class'])){?> <?php echo $_smarty_tpl->tpl_vars['user']->value['class'];?>
<?php }?>">
                <?php if (!empty($_smarty_tpl->tpl_vars['user']->value['url'])){?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['user']->value['url'];?>
"><img alt=""<?php if (!empty($_smarty_tpl->tpl_vars['user']->value['title'])){?> title="<?php echo $_smarty_tpl->tpl_vars['user']->value['title'];?>
"<?php }?> src="<?php echo $_smarty_tpl->tpl_vars['user']->value['src'];?>
" /></a>
                <?php }else{ ?>
                <img alt="" <?php if (!empty($_smarty_tpl->tpl_vars['user']->value['title'])){?> title="<?php echo $_smarty_tpl->tpl_vars['user']->value['title'];?>
"<?php }?> src="<?php echo $_smarty_tpl->tpl_vars['user']->value['src'];?>
" />
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['user']->value['label'])){?><span class="ow_avatar_label"<?php if (!empty($_smarty_tpl->tpl_vars['user']->value['labelColor'])){?> style="background-color: <?php echo $_smarty_tpl->tpl_vars['user']->value['labelColor'];?>
"<?php }?>><?php echo $_smarty_tpl->tpl_vars['user']->value['label'];?>
</span><?php }?>
            </div>
        <?php } ?>
        <?php if (!empty($_smarty_tpl->tpl_vars['view_more_array']->value)){?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['view_more_array']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['view_more_array']->value['title'];?>
" class="avatar_list_more_icon"></a>
        <?php }?>
    <?php }?>
</div>
<?php }} ?>