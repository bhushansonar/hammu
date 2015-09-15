<?php /* Smarty version Smarty-3.1.12, created on 2015-05-15 03:29:20
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/bookmarks/views/components/avatar_user_list.html" */ ?>
<?php /*%%SmartyHeaderCode:13980036445555a050cc8b56-25394713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e987e6c16ea7c17d7d6a878d05c7d103b6239a2' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/bookmarks/views/components/avatar_user_list.html',
      1 => 1430990963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13980036445555a050cc8b56-25394713',
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
  'unifunc' => 'content_5555a050d481f0_69334362',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5555a050d481f0_69334362')) {function content_5555a050d481f0_69334362($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.text.php';
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