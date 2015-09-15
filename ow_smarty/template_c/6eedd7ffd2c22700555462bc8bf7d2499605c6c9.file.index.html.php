<?php /* Smarty version Smarty-3.1.12, created on 2015-05-19 03:01:36
         compiled from "E:\wamp\www\hammu\ow_plugins\hotlist\views\components\index.html" */ ?>
<?php /*%%SmartyHeaderCode:28690555adfd0ce4f35-45889006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6eedd7ffd2c22700555462bc8bf7d2499605c6c9' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\hotlist\\views\\components\\index.html',
      1 => 1431930748,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28690555adfd0ce4f35-45889006',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'authorized' => 0,
    'userInList' => 0,
    'authMsg' => 0,
    'userList' => 0,
    'count' => 0,
    'number_of_users' => 0,
    'user' => 0,
    'number_of_rows' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_555adfd0dc3e86_38241256',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555adfd0dc3e86_38241256')) {function content_555adfd0dc3e86_38241256($_smarty_tpl) {?><?php if (!is_callable('smarty_block_script')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.script.php';
if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('script', array()); $_block_repeat=true; echo smarty_block_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php if ($_smarty_tpl->tpl_vars['authorized']->value||$_smarty_tpl->tpl_vars['userInList']->value){?>
    

    $("#add_to_list").click(function(){
        hotListFloatBox = OW.ajaxFloatBox("HOTLIST_CMP_Floatbox", {} , {width:380, iconClass: "ow_ic_heart", title: "<?php if ($_smarty_tpl->tpl_vars['userInList']->value){?><?php echo smarty_function_text(array('key'=>"hotlist+floatbox_header_remove_from_list"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_text(array('key'=>"hotlist+floatbox_header"),$_smarty_tpl);?>
<?php }?>"});
    });

    

<?php }else{ ?>
    

    $("#add_to_list").click(function(){
    OW.authorizationLimitedFloatbox('<?php echo $_smarty_tpl->tpl_vars['authMsg']->value;?>
');
    });

    
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['userInList']->value){?>
    
        $(".hotlist").hover(
        function () {
            $('.hotlist_footer').css('visibility', 'visible');
        },
        function () {
            $('.hotlist_footer').css('visibility', 'hidden');
        }
        );
    
<?php }?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="hotlist ow_center" style="height: auto;">
<?php if ($_smarty_tpl->tpl_vars['userList']->value){?>
	<div class="users_slideshow ow_std_margin ow_automargin clearfix" style="height: 100%; width: 100%;">
	<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['user']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['user']->iteration=0;
 $_smarty_tpl->tpl_vars['user']->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['userList']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
 $_smarty_tpl->tpl_vars['user']->iteration++;
 $_smarty_tpl->tpl_vars['user']->index++;
 $_smarty_tpl->tpl_vars['user']->first = $_smarty_tpl->tpl_vars['user']->index === 0;
 $_smarty_tpl->tpl_vars['user']->last = $_smarty_tpl->tpl_vars['user']->iteration === $_smarty_tpl->tpl_vars['user']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['userList']['first'] = $_smarty_tpl->tpl_vars['user']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['userList']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['userList']['last'] = $_smarty_tpl->tpl_vars['user']->last;
?>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['userList']['first']){?><div class="hot_list_normal_item ow_lp_avatars" style="display: <?php if ($_smarty_tpl->tpl_vars['count']->value>$_smarty_tpl->tpl_vars['number_of_users']->value){?>none<?php }else{ ?>block<?php }?>;"><?php }?>
			<div class="ow_avatar">
                <?php if (!empty($_smarty_tpl->tpl_vars['user']->value['isMarked'])){?><div class="ow_ic_bookmark ow_bookmark_icon"></div><?php }?>
                <a class="ow_item_set<?php echo $_smarty_tpl->tpl_vars['number_of_users']->value;?>
" href="<?php echo $_smarty_tpl->tpl_vars['user']->value['url'];?>
" target="_blank"><img title="<?php echo $_smarty_tpl->tpl_vars['user']->value['displayName'];?>
<br/><?php echo $_smarty_tpl->tpl_vars['user']->value['sex'];?>
, <?php echo $_smarty_tpl->tpl_vars['user']->value['age'];?>
<br/><?php echo $_smarty_tpl->tpl_vars['user']->value['googlemap_location'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatarUrl'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['user']->value['displayName'];?>
" style="max-width: 100%" /></a>
            </div>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['userList']['iteration']%($_smarty_tpl->tpl_vars['number_of_users']->value*$_smarty_tpl->tpl_vars['number_of_rows']->value)==0&&!$_smarty_tpl->getVariable('smarty')->value['foreach']['userList']['last']){?></div><div class="hot_list_normal_item ow_lp_avatars" style="display: none;"><?php }?>
		<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['userList']['last']){?></div><?php }?>
	<?php } ?>
	</div>
<?php }else{ ?>
    <div class="ow_nocontent"><?php echo smarty_function_text(array('key'=>"hotlist+label_no_users"),$_smarty_tpl);?>
</div>
<?php }?>
    <div class="ow_center hotlist_footer" <?php if ($_smarty_tpl->tpl_vars['userInList']->value){?>style="visibility: hidden;"<?php }?>><a href="javascript://" id="add_to_list"><?php if ($_smarty_tpl->tpl_vars['userInList']->value){?><?php echo smarty_function_text(array('key'=>"hotlist+remove_from_hot_list"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_text(array('key'=>"hotlist+are_you_hot_too"),$_smarty_tpl);?>
<?php }?></a></div>
</div>
<?php }} ?>