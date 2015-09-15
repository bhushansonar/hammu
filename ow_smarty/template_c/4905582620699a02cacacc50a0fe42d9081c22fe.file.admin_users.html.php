<?php /* Smarty version Smarty-3.1.12, created on 2015-08-11 12:16:45
         compiled from "E:\wamp\www\hammu\ow_plugins\membership\views\controllers\admin_users.html" */ ?>
<?php /*%%SmartyHeaderCode:767755c9cb8dcd1546-42707124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4905582620699a02cacacc50a0fe42d9081c22fe' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\membership\\views\\controllers\\admin_users.html',
      1 => 1432099328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '767755c9cb8dcd1546-42707124',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'types' => 0,
    'route' => 0,
    'type' => 0,
    'roleId' => 0,
    'list' => 0,
    'paging' => 0,
    'user' => 0,
    'userId' => 0,
    'userNameList' => 0,
    'avatars' => 0,
    'displayNames' => 0,
    'questionList' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55c9cb8e203de4_13136957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c9cb8e203de4_13136957')) {function content_55c9cb8e203de4_13136957($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.style.php';
if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_cycle')) include 'E:\\wamp\\www\\hammu\\ow_libraries\\smarty3\\plugins\\function.cycle.php';
if (!is_callable('smarty_function_decorator')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.decorator.php';
if (!is_callable('smarty_function_user_link')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.user_link.php';
if (!is_callable('smarty_function_question_value_lang')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.question_value_lang.php';
if (!is_callable('smarty_function_age')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.age.php';
?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


    .user_list_thumb {
        width: 55px;
        height: 45px;
    }
    
    .user_list_thumb img {
        width: 45px;
        height: 45px;
    }

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>


<?php if ($_smarty_tpl->tpl_vars['types']->value){?>
<div class="ow_anno ow_center ow_stdmargin">
    <?php echo smarty_function_text(array('key'=>'membership+displaying_members'),$_smarty_tpl);?>

    <select name="ms_types" onchange="location.href = '<?php echo $_smarty_tpl->tpl_vars['route']->value;?>
/role/'+this.value;">
    <?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['type']->value['dto']->roleId;?>
"<?php if ($_smarty_tpl->tpl_vars['type']->value['dto']->roleId==$_smarty_tpl->tpl_vars['roleId']->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['type']->value['title'];?>
</option>
    <?php } ?>
    </select>
    <?php echo smarty_function_text(array('key'=>'membership+membership'),$_smarty_tpl);?>

</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['list']->value)){?>

<?php echo $_smarty_tpl->tpl_vars['paging']->value;?>


<table class="ow_table_1">
<tr class="ow_tr_first <?php if (empty($_smarty_tpl->tpl_vars['list']->value)){?>ow_tr_last<?php }?>">
    <th><?php echo smarty_function_text(array('key'=>'admin+user'),$_smarty_tpl);?>
</th>
    <th width="20%"><?php echo smarty_function_text(array('key'=>'membership+expires'),$_smarty_tpl);?>
</th>
    <th width="1"><?php echo smarty_function_text(array('key'=>'membership+recurring'),$_smarty_tpl);?>
</th>
</tr>
<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['user']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['user']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
 $_smarty_tpl->tpl_vars['user']->iteration++;
 $_smarty_tpl->tpl_vars['user']->last = $_smarty_tpl->tpl_vars['user']->iteration === $_smarty_tpl->tpl_vars['user']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["f"]['last'] = $_smarty_tpl->tpl_vars['user']->last;
?>
<?php $_smarty_tpl->_capture_stack[0][] = array('default', 'userId', null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['user']->value['userId'];?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->_capture_stack[0][] = array('default', 'username', null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['userNameList']->value[$_smarty_tpl->tpl_vars['userId']->value];?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <tr class="ow_alt<?php echo smarty_function_cycle(array('values'=>'1,2'),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['f']['last']){?>ow_tr_last<?php }?>">
        <td>
        <div class="clearfix">
            <div class="ow_left ow_txtleft user_list_thumb"><?php echo smarty_function_decorator(array('name'=>'avatar_item','data'=>$_smarty_tpl->tpl_vars['avatars']->value[$_smarty_tpl->tpl_vars['userId']->value]),$_smarty_tpl);?>
</div>
            <div class="ow_left ow_txtleft">            
            <?php echo smarty_function_user_link(array('name'=>$_smarty_tpl->tpl_vars['displayNames']->value[$_smarty_tpl->tpl_vars['userId']->value],'username'=>$_smarty_tpl->tpl_vars['userNameList']->value[$_smarty_tpl->tpl_vars['userId']->value]),$_smarty_tpl);?>
<br />
            <span class="ow_small">
            <?php if (!empty($_smarty_tpl->tpl_vars['questionList']->value[$_smarty_tpl->tpl_vars['userId']->value]['sex'])){?>
                <?php echo smarty_function_question_value_lang(array('name'=>'sex','value'=>$_smarty_tpl->tpl_vars['questionList']->value[$_smarty_tpl->tpl_vars['userId']->value]['sex']),$_smarty_tpl);?>

            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['questionList']->value[$_smarty_tpl->tpl_vars['userId']->value]['birthdate'])){?>
                <?php echo smarty_function_age(array('dateTime'=>$_smarty_tpl->tpl_vars['questionList']->value[$_smarty_tpl->tpl_vars['userId']->value]['birthdate']),$_smarty_tpl);?>

            <?php }?>
            <br />
            <?php if (!empty($_smarty_tpl->tpl_vars['questionList']->value[$_smarty_tpl->tpl_vars['userId']->value]['email'])){?>
                <span class="ow_remark"><?php echo $_smarty_tpl->tpl_vars['questionList']->value[$_smarty_tpl->tpl_vars['userId']->value]['email'];?>
</span>
            <?php }?>
            </span>
            </div>
        </div>
        </td>
        <td><?php echo MEMBERSHIP_BOL_MembershipService::formatDate(array('timestamp'=>$_smarty_tpl->tpl_vars['user']->value['expirationStamp']),$_smarty_tpl);?>
</td>
        <td><?php if ($_smarty_tpl->tpl_vars['user']->value['recurring']){?><div class="ow_marked_cell" style="width: 70px;">&nbsp;</div><?php }?></td>
    </tr>
<?php } ?>
</table>

<?php echo $_smarty_tpl->tpl_vars['paging']->value;?>


<?php }else{ ?>
    <div class="ow_nocontent"><?php echo smarty_function_text(array('key'=>'admin+no_users'),$_smarty_tpl);?>
</div>
<?php }?><?php }} ?>