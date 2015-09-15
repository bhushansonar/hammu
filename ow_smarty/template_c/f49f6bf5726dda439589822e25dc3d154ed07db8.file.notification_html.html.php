<?php /* Smarty version Smarty-3.1.12, created on 2015-05-18 00:32:45
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/matchmaking/views/components/notification_html.html" */ ?>
<?php /*%%SmartyHeaderCode:125759486555596b6d70d2a6-46259809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f49f6bf5726dda439589822e25dc3d154ed07db8' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/matchmaking/views/components/notification_html.html',
      1 => 1430991128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125759486555596b6d70d2a6-46259809',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'userName' => 0,
    'list' => 0,
    'user' => 0,
    'matchesUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55596b6d7abc22_02637594',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55596b6d7abc22_02637594')) {function content_55596b6d7abc22_02637594($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.text.php';
?><body style="font-size:13px;font-family:Lucida Grande,Verdana;">
<p>
    <?php echo smarty_function_text(array('key'=>"matchmaking+email_html_head",'userName'=>$_smarty_tpl->tpl_vars['userName']->value),$_smarty_tpl);?>

</p>
<p>
    <?php echo smarty_function_text(array('key'=>"matchmaking+email_html_description"),$_smarty_tpl);?>

</p>

<table cellpadding="0" cellspacing="0">
    <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['userList']['first']){?><tr><?php }?>
    <td valign="top" style="padding: 6px;">
        <table width="286" height="162"  cellpadding="0" cellspacing="0" style="background: #f3f4f7; border: 1px solid #e0e2e8;">
            <tr>
                <td valign="top" width="140" height="140" style="padding: 11px 6px 11px 11px;">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['user']->value['userUrl'];?>
" target="_blank" style="display: inline-block; vertical-align: top;"><img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatarUrl'];?>
" alt="" title="test" style="width: 140px; vertical-align: top;"></a>
                </td>
                <td valign="top" style="padding: 11px 11px 11px 5px;">
                    <div style="min-height: 123px;">
                        <a style="margin-bottom: 6px; display: block;" href="<?php echo $_smarty_tpl->tpl_vars['user']->value['userUrl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['user']->value['displayName'];?>
</a>
                        <div style="margin-bottom: 6px;"><?php echo $_smarty_tpl->tpl_vars['user']->value['sex'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['age'];?>
</div>
                        <div style="margin-bottom: 6px;"><?php echo $_smarty_tpl->tpl_vars['user']->value['googlemap_location'];?>
</div>
                    </div>
                    <div style="color: #31b231; font-size: 11px;"><?php echo smarty_function_text(array('key'=>"matchmaking+compatibility"),$_smarty_tpl);?>
: <?php echo $_smarty_tpl->tpl_vars['user']->value['compatibility'];?>
%</div>
                </td>
            </tr>
        </table>
    </td>
    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['userList']['iteration']%2==0&&!$_smarty_tpl->getVariable('smarty')->value['foreach']['userList']['last']){?>
</tr><tr>
    <?php }?>
    <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['userList']['last']){?>
</tr>
    <?php }?>
    <?php } ?>
</table>

<p>
    <a href="<?php echo $_smarty_tpl->tpl_vars['matchesUrl']->value;?>
"><?php echo smarty_function_text(array('key'=>"base+view_more_label"),$_smarty_tpl);?>
</a>
</p>

<p>
    <?php echo smarty_function_text(array('key'=>"matchmaking+email_html_bottom"),$_smarty_tpl);?>

</p>
</body>
<?php }} ?>