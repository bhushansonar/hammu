<?php /* Smarty version Smarty-3.1.12, created on 2015-05-12 10:14:47
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/pcgallery/views/components/gallery.html" */ ?>
<?php /*%%SmartyHeaderCode:58590697355520ad7bc3099-52718804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbbfb2058e4c8d0f0e9929e045cf46776a80663e' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/pcgallery/views/components/gallery.html',
      1 => 1430991178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58590697355520ad7bc3099-52718804',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
    'photos' => 0,
    'uniqId' => 0,
    'empty' => 0,
    'permissions' => 0,
    'avatarApproval' => 0,
    'actionToolbar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55520ad7c9b1b1_22598786',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55520ad7c9b1b1_22598786')) {function content_55520ad7c9b1b1_22598786($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.style.php';
if (!is_callable('smarty_function_text')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.text.php';
if (!is_callable('smarty_function_online_now')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.online_now.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


<?php if (!empty($_smarty_tpl->tpl_vars['user']->value['avatar'])){?>
    .ow_profile_gallery_avatar_image {
        background-image: url(<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
);
    }
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['photos']->value){?>
.pcgallery_photo1 {
    background-image: url(<?php echo $_smarty_tpl->tpl_vars['photos']->value[0]['src'];?>
);
}

.pcgallery_photo2 {
    background-image: url(<?php echo $_smarty_tpl->tpl_vars['photos']->value[1]['src'];?>
);
}

.pcgallery_photo3 {
    background-image: url(<?php echo $_smarty_tpl->tpl_vars['photos']->value[2]['src'];?>
);
}

.pcgallery_photo4 {
    background-image: url(<?php echo $_smarty_tpl->tpl_vars['photos']->value[3]['src'];?>
);
}

.pcgallery_photo5 {
    background-image: url(<?php echo $_smarty_tpl->tpl_vars['photos']->value[4]['src'];?>
);
}

.pcgallery_photo6 {
    background-image: url(<?php echo $_smarty_tpl->tpl_vars['photos']->value[5]['src'];?>
);
}

.pcgallery_photo7 {
    background-image: url(<?php echo $_smarty_tpl->tpl_vars['photos']->value[6]['src'];?>
);
}

<?php }?>

.ow_profile_gallery_place:hover .ow_profile_gallery_btn {
    /*display: block;*/
}

.ow_profile_gallery_btn {
    /*display: none;*/
}

.pcg_avatar_approve {   
    display: none;
}

.ow_avatar_console:hover .pcg_avatar_approve {
    display: block;
}

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="ow_profile_gallery_wrap ow_stdmargin" id="<?php echo $_smarty_tpl->tpl_vars['uniqId']->value;?>
">
    <div class="ow_profile_gallery_place">
        <div class="ow_profile_gallery <?php if ($_smarty_tpl->tpl_vars['empty']->value){?>ow_profile_gallery_empty<?php }?> clearfix">
            <?php if ($_smarty_tpl->tpl_vars['empty']->value){?>
                <?php if ($_smarty_tpl->tpl_vars['permissions']->value['selfMode']){?>
                    <div class="ow_profile_gallery_txt">
                        <?php echo smarty_function_text(array('key'=>"pcgallery+not_enough_photo_tip",'id'=>"pcgallery-add-photo-btn"),$_smarty_tpl);?>

                    </div>
                <?php }?>
            <?php }else{ ?>
                <div class="ow_profile_gallery_item_vert">
                    <div class="ow_profile_gallery_item ow_border">
                        <div class="ow_profile_gallery_item_image pcgallery_photo2 pcg-image" data-order="1" data-pid="<?php echo $_smarty_tpl->tpl_vars['photos']->value[1]['id'];?>
"></div>
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
                    </div>
                    <div class="ow_profile_gallery_item ow_border">
                        <div class="ow_profile_gallery_item_image pcgallery_photo3 pcg-image" data-order="2" data-pid="<?php echo $_smarty_tpl->tpl_vars['photos']->value[2]['id'];?>
" ></div>
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
                    </div>
                </div>
                <div class="ow_profile_gallery_item_vert ow_profile_gallery_item_big">
                    <div class="ow_profile_gallery_item ow_border">
                        <div class="ow_profile_gallery_item_image pcgallery_photo1 pcg-image" data-order="3" data-pid="<?php echo $_smarty_tpl->tpl_vars['photos']->value[0]['id'];?>
"></div>
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
                    </div>
                </div>
                <div class="ow_profile_gallery_item_vert">
                    <div class="ow_profile_gallery_item ow_border">
                        <div class="ow_profile_gallery_item_image pcgallery_photo4 pcg-image" data-order="4" data-pid="<?php echo $_smarty_tpl->tpl_vars['photos']->value[3]['id'];?>
"></div>
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
                    </div>
                    <div class="ow_profile_gallery_item ow_border">
                        <div class="ow_profile_gallery_item_image pcgallery_photo5 pcg-image" data-order="5" data-pid="<?php echo $_smarty_tpl->tpl_vars['photos']->value[4]['id'];?>
"></div>
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
                    </div>
                </div>
                <div class="ow_profile_gallery_item_vert">
                    <div class="ow_profile_gallery_item ow_border">
                        <div class="ow_profile_gallery_item_image pcgallery_photo6 pcg-image" data-order="6" data-pid="<?php echo $_smarty_tpl->tpl_vars['photos']->value[5]['id'];?>
"></div>
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
                    </div>
                    <div class="ow_profile_gallery_item ow_border">
                        <div class="ow_profile_gallery_item_image pcgallery_photo7 pcg-image" data-order="7" data-pid="<?php echo $_smarty_tpl->tpl_vars['photos']->value[6]['id'];?>
"></div>
                        <img src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" />
                    </div>
                </div>
            <?php }?>
        </div>
        <?php if (!$_smarty_tpl->tpl_vars['empty']->value&&$_smarty_tpl->tpl_vars['permissions']->value['changeSettings']){?>
        <div class="ow_profile_gallery_btn">
            <a class="ow_lbutton" id="pcgallery-settings-btn" href="javascript://"><?php echo smarty_function_text(array('key'=>'pcgallery+settings_btn_label'),$_smarty_tpl);?>
</a>
        </div>
        <?php }?>
    </div>
    <div class="ow_profile_gallery_cont_wrap ow_border">
        <div class="ow_profile_gallery_cont clearfix">
            <div class="ow_profile_gallery_avatar">
                <div class="ow_avatar_console ow_border ow_profile_gallery_avatar_console ow_bg_color">
                    
                    
                    <div class="ow_profile_gallery_avatar_image" data-outlet="avatar">
                        <?php if ($_smarty_tpl->tpl_vars['avatarApproval']->value){?>
                            <div data-outlet="approve-overlay" style="position: absolute; top: 0; right: 0; left: 0; bottom: 0; background-color: rgba(0,0,0,0.6); color: #fff; padding: 8px;"><?php echo smarty_function_text(array('key'=>'base+avatar_pending_approval'),$_smarty_tpl);?>
</div>
                        <?php }?>
                        
                            <?php if (isset($_smarty_tpl->tpl_vars['user']->value['role']['label'])){?>
                                <span class="ow_avatar_label"<?php if (isset($_smarty_tpl->tpl_vars['user']->value['role']['custom'])){?> style="background-color: <?php echo $_smarty_tpl->tpl_vars['user']->value['role']['custom'];?>
"<?php }?>>
                                    <?php echo $_smarty_tpl->tpl_vars['user']->value['role']['label'];?>

                                </span>
                            <?php }?>
                            
                            <?php if ($_smarty_tpl->tpl_vars['permissions']->value['changeAvatar']){?>
                                <div class="ow_profile_gallery_avatar_change">
                                    <a data-outlet="avatar-change" href="javascript://" class="ow_lbutton"><?php echo smarty_function_text(array('key'=>"base+avatar_change"),$_smarty_tpl);?>
</a>
                                </div>
                            <?php }?>
                            
                            <?php if ($_smarty_tpl->tpl_vars['avatarApproval']->value&&$_smarty_tpl->tpl_vars['permissions']->value['approveAvatar']){?>
                                <div class="ow_avatar_button ow_avatar_change pcg_avatar_approve" data-outlet="approve-avatar-w" >
                                    <a data-outlet="approve-avatar" class="ow_lbutton" href="javascript://"><?php echo smarty_function_text(array('key'=>'base+approve'),$_smarty_tpl);?>
</a>
                                </div>
                            <?php }?>
                        <div class="user_online_wrap"><?php if ($_smarty_tpl->tpl_vars['user']->value['isOnline']){?><?php echo smarty_function_online_now(array('userId'=>$_smarty_tpl->tpl_vars['user']->value['id']),$_smarty_tpl);?>
<?php }?></div>
                    </div>
                </div>
            </div>
            <div class="ow_profile_gallery_toolbox clearfix">
                <span class="ow_profile_gallery_display_name ow_smallmargin">
                    <?php echo $_smarty_tpl->tpl_vars['user']->value['displayName'];?>

                </span>
                <div class="ow_profile_gallery_action_toolbar clearfix">
                    <?php echo $_smarty_tpl->tpl_vars['actionToolbar']->value;?>

                </div>
            </div>
        </div>
    </div>
</div><?php }} ?>