<?php /* Smarty version Smarty-3.1.12, created on 2015-07-04 07:02:45
         compiled from "E:\wamp\www\hammu\ow_plugins\usearch\views\components\search_result_list.html" */ ?>
<?php /*%%SmartyHeaderCode:18502559768f54e4c55-53411422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c847a2304197b73a3107a6756f2a26068f73ad59' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\usearch\\views\\components\\search_result_list.html',
      1 => 1432099684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18502559768f54e4c55-53411422',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'page' => 0,
    'item' => 0,
    'dto' => 0,
    'id' => 0,
    'fields' => 0,
    'field' => 0,
    'showPresenceList' => 0,
    'onlineInfo' => 0,
    'activityShowLimit' => 0,
    'avatars' => 0,
    'displayNameList' => 0,
    'bookmarkList' => 0,
    '_fields' => 0,
    'activity' => 0,
    'joinDate' => 0,
    'itemMenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_559768f570a2d8_35809209',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559768f570a2d8_35809209')) {function content_559768f570a2d8_35809209($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_format_date')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.format_date.php';
?><?php if (!empty($_smarty_tpl->tpl_vars['list']->value)){?>
    <div class="usearch_search_result_page ow_left" data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
" style="width:100%;height:0px;"></div>
    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
    <?php $_smarty_tpl->tpl_vars['dto'] = new Smarty_variable($_smarty_tpl->tpl_vars['item']->value['dto'], null, 0);?>
    <?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable($_smarty_tpl->tpl_vars['dto']->value->id, null, 0);?>
    <?php $_smarty_tpl->_capture_stack[0][] = array('default', "_fields", null); ob_start(); ?>
    <?php if (!empty($_smarty_tpl->tpl_vars['fields']->value[$_smarty_tpl->tpl_vars['id']->value]['base'])){?><?php  $_smarty_tpl->tpl_vars["field"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["field"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value[$_smarty_tpl->tpl_vars['id']->value]['base']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["field"]->key => $_smarty_tpl->tpl_vars["field"]->value){
$_smarty_tpl->tpl_vars["field"]->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['field']->value['label'];?>
<?php echo $_smarty_tpl->tpl_vars['field']->value['value'];?>
<?php } ?><?php }?>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->_capture_stack[0][] = array('default', 'activity', null); ob_start(); ?>
    <?php if (!empty($_smarty_tpl->tpl_vars['showPresenceList']->value)&&!empty($_smarty_tpl->tpl_vars['showPresenceList']->value[$_smarty_tpl->tpl_vars['id']->value])&&$_smarty_tpl->tpl_vars['showPresenceList']->value[$_smarty_tpl->tpl_vars['id']->value]){?>
    <?php if ($_smarty_tpl->tpl_vars['onlineInfo']->value){?>
    <?php if (empty($_smarty_tpl->tpl_vars['onlineInfo']->value[$_smarty_tpl->tpl_vars['id']->value])&&!empty($_smarty_tpl->tpl_vars['dto']->value)&&$_smarty_tpl->tpl_vars['dto']->value->activityStamp>$_smarty_tpl->tpl_vars['activityShowLimit']->value){?>
        <div class="ow_photo_userlist_info">
            <?php echo smarty_function_text(array('key'=>"base+user_list_activity"),$_smarty_tpl);?>
: <span class=""><?php echo smarty_function_format_date(array('timestamp'=>$_smarty_tpl->tpl_vars['dto']->value->activityStamp),$_smarty_tpl);?>
</span>
        </div>
    <?php }else{ ?>

    <?php }?>
    <?php }?>
    <?php }?>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->_capture_stack[0][] = array('default', 'joinDate', null); ob_start(); ?>
        <?php if (!empty($_smarty_tpl->tpl_vars['dto']->value->joinStamp)){?>
            <div class="ow_photo_userlist_info">
                <?php echo smarty_function_text(array('key'=>"usearch+user_list_join_date"),$_smarty_tpl);?>
: <span class=""><?php echo smarty_function_format_date(array('timestamp'=>$_smarty_tpl->tpl_vars['dto']->value->joinStamp),$_smarty_tpl);?>
</span>
            </div>
        <?php }else{ ?>

        <?php }?>
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

        <div class="ow_photo_item_wrap" id="user-avatar-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
            <div class="ow_photo_item" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['avatars']->value[$_smarty_tpl->tpl_vars['id']->value]['src'];?>
);">
                <div class="ow_photo_item_info ow_small">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['avatars']->value[$_smarty_tpl->tpl_vars['id']->value]['url'];?>
" class="ow_photo_userlist_info" style="text-decoration: none;">
                        
                        <?php if (!empty($_smarty_tpl->tpl_vars['onlineInfo']->value[$_smarty_tpl->tpl_vars['id']->value])){?>
                            <div style="display: inline-block;" class="ow_miniic_live">
                                <span class="ow_live_on"></span>
                            </div>
                        <?php }?>
                        
                        <b class="ow_usearch_display_name"><?php echo $_smarty_tpl->tpl_vars['displayNameList']->value[$_smarty_tpl->tpl_vars['id']->value];?>
</b>
                        
                        <?php if (!empty($_smarty_tpl->tpl_vars['bookmarkList']->value[$_smarty_tpl->tpl_vars['id']->value])){?>
                            <div id="bookmark-user-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="ow_ic_bookmark ow_bookmark_icon_ulist"></div>
                        <?php }?>
                        
                        <div class="ow_usearch_user_info" style="display:none;">

                            <div class="ow_photo_userlist_info"><?php echo $_smarty_tpl->tpl_vars['_fields']->value;?>
</div>
                            <?php if (!empty($_smarty_tpl->tpl_vars['fields']->value[$_smarty_tpl->tpl_vars['id']->value]['location'])){?><div class="ow_photo_userlist_info"><?php echo $_smarty_tpl->tpl_vars['fields']->value[$_smarty_tpl->tpl_vars['id']->value]['location']['value'];?>
</div><?php }?>
                            
                            <?php echo $_smarty_tpl->tpl_vars['activity']->value;?>

                            <?php echo $_smarty_tpl->tpl_vars['joinDate']->value;?>

                            
                            <?php if (isset($_smarty_tpl->tpl_vars['fields']->value[$_smarty_tpl->tpl_vars['id']->value]['match_compatibility'])){?>
                                <div class="ow_photo_userlist_info">
                                    <?php echo smarty_function_text(array('key'=>"usearch+match_compatibility"),$_smarty_tpl);?>
: <span class=""><?php echo $_smarty_tpl->tpl_vars['fields']->value[$_smarty_tpl->tpl_vars['id']->value]['match_compatibility']['value'];?>
</span>
                                </div>
                            <?php }?>
                            
                            <?php if (isset($_smarty_tpl->tpl_vars['fields']->value[$_smarty_tpl->tpl_vars['id']->value]['distance'])){?>
                                <div class="ow_photo_userlist_info">
                                    <?php echo smarty_function_text(array('key'=>"usearch+distance"),$_smarty_tpl);?>
: <span class=""><?php echo $_smarty_tpl->tpl_vars['fields']->value[$_smarty_tpl->tpl_vars['id']->value]['distance']['value'];?>
</span>
                                </div>
                            <?php }?>
                            
                        </div>            
                    </a>
                </div>
                <?php if (!empty($_smarty_tpl->tpl_vars['itemMenu']->value[$_smarty_tpl->tpl_vars['id']->value])){?>
                    <div class="ow_photo_context_action"><?php echo $_smarty_tpl->tpl_vars['itemMenu']->value[$_smarty_tpl->tpl_vars['id']->value];?>
</div>
                <?php }?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['avatars']->value[$_smarty_tpl->tpl_vars['id']->value]['url'];?>
">
                    <img alt="" src="data:image/png;base64,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">
                </a>
                
            </div>
        </div>
    
        

    <?php } ?>
<?php }?><?php }} ?>