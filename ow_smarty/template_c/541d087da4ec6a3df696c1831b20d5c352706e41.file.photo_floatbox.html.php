<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 08:47:25
         compiled from "E:\wamp\www\hammu\ow_plugins\photo\views\components\photo_floatbox.html" */ ?>
<?php /*%%SmartyHeaderCode:4021558900fd35e8a8-91341401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '541d087da4ec6a3df696c1831b20d5c352706e41' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\photo\\views\\components\\photo_floatbox.html',
      1 => 1432582834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4021558900fd35e8a8-91341401',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'authError' => 0,
    'layout' => 0,
    'class' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_558900fd3c0054_42998224',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558900fd3c0054_42998224')) {function content_558900fd3c0054_42998224($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.style.php';
if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_add_content')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.add_content.php';
?>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    .ow_photoview_stage_wrap{ background-color:#fff; }
    #floatbox_overlay{ opacity: 0.3; }
    .ow_ic_delete{ left: -290px !important; position: relative !important; top: 12px !important; }
    .ow_photo_context_action{}
    .ow_photoview_bottom_menu{ display:none !important; }
    .ow_photoview_bottom_menu_wrap{ height:50px; text-align: center; }
    .make-nbtn{ text-decoration: none !important; }
    ._menu_explore { display: none !important; }
    #btn-add-new-photo{ background: -moz-linear-gradient(top,  rgba(232,232,232,1) 0%, rgba(143,0,156,0.35) 100%) !important; /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(232,232,232,1)), color-stop(100%,rgba(143,0,156,0.35))) !important; /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  rgba(232,232,232,1) 0%,rgba(143,0,156,0.35) 100%) !important; /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  rgba(232,232,232,1) 0%,rgba(143,0,156,0.35) 100%) !important; /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  rgba(232,232,232,1) 0%,rgba(143,0,156,0.35) 100%) !important; /* IE10+ */
    background: linear-gradient(to bottom,  rgba(232,232,232,1) 0%,rgba(143,0,156,0.35) 100%) !important; /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e8e8e8', endColorstr='#598f009c',GradientType=0 ) !important; /* IE6-9 */

    color: #424242; border: solid 1px #6e6e6e; border-radius: 5px; font-size: 18px; padding:3px 21px; line-height: 35px; height:43px;
    font-family: Roboto-Regular !important;
    text-shadow: 0px 1px 1px rgba(255, 255, 255, 0.4); text-decoration: none;}
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


    <div class="ow_hidden">
        <div id="ow-photo-view" class="ow_photoview_wrap clearfix ow_bg_color">
            <?php if (!empty($_smarty_tpl->tpl_vars['authError']->value)){?>
            <div id="ow-photo-view-error" style="padding: 45px 10px 65px">
                <div class="ow_anno ow_nocontent"><?php echo $_smarty_tpl->tpl_vars['authError']->value;?>
</div>
            </div>
            <?php }else{ ?>
            <div class="ow_photoview_stage_wrap<?php if ($_smarty_tpl->tpl_vars['layout']->value=='page'){?> ow_smallmargin<?php }?>">
                <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" class="ow_photo_img ow_photo_view" />
                <div class="ow_photoview_bottom_menu_wrap">
                    <a class="make-nbtn" id="btn-save-as-avatar" href="javascript://">Make this my profile photo</a>
                    <div class="ow_photoview_bottom_menu clearfix">
                        <a  href="javascript://" class="ow_photoview_albumlink">
                            '':
                        </a>
                        <div class="ow_photoview_fullscreen_toolbar_wrap">
                            <div class="ow_photoview_play_btn" title="<?php echo smarty_function_text(array('key'=>'photo+play_pause'),$_smarty_tpl);?>
"></div>
                            <div class="ow_photoview_slide_settings" style="float: none">
                                <div class="ow_photoview_slide_settings_btn" title="<?php echo smarty_function_text(array('key'=>'photo+slideshow_settings'),$_smarty_tpl);?>
"></div>
                                <div class="ow_photoview_slide_settings_controls clearfix">
                                    <div class="ow_photoview_slide_time" title="<?php echo smarty_function_text(array('key'=>'photo+slideshow_interval'),$_smarty_tpl);?>
3"></div>
                                    <div class="ow_photoview_slide_settings_effects">
                                        <div class="ow_photoview_slide_settings_effect ow_small active" effect="fade" title="<?php echo smarty_function_text(array('key'=>'photo+effects'),$_smarty_tpl);?>
"><?php echo smarty_function_text(array('key'=>'photo+effect_fade'),$_smarty_tpl);?>
</div>
                                        <div class="ow_photoview_slide_settings_effect ow_small" effect="slide" title="<?php echo smarty_function_text(array('key'=>'photo+effects'),$_smarty_tpl);?>
"><?php echo smarty_function_text(array('key'=>'photo+effect_slide'),$_smarty_tpl);?>
</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript://" class="ow_photoview_info_btn open ow_right"></a>
                        <a href="javascript://" class="ow_photoview_fullscreen ow_right"></a>
                    </div>
                </div>
                <div class="ow_photo_context_action" style="display: none"></div>
                <a class="ow_photoview_arrow_left" href="javascript://"><i></i></a>
                <a class="ow_photoview_arrow_right" href="javascript://"><i></i></a>
                <img src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" style="display: none" class="ow_photo_img slide" />
            </div>
            <div class="ow_photoview_info_wrap">
                <div class="ow_photoview_info<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
">
                    <div class="ow_photo_scroll_cont">
                        <div class="ow_photoview_user ow_smallmargin clearfix">
                            <div class="ow_user_list_picture">
                                <div class="ow_avatar">
                                    <a href="javascript://"><img alt="" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D" style="max-width: 100%; display: none"></a>
                                </div>
                            </div>
                            <div class="ow_user_list_data">
                                <a href="" class="ow_photo_avatar_url"></a>
                                <div class="ow_small ow_timestamp"></div>
                                <a href="" class="ow_small ow_photo_album_url"><span></span></a>
                            </div>
                        </div>

                        <?php echo smarty_function_add_content(array('key'=>"photo.content.betweenInfoAndDescription"),$_smarty_tpl);?>


                        <div class="ow_photoview_description ow_small">
                            <span id="photo-description"></span>
                        </div>

                        <?php echo smarty_function_add_content(array('key'=>"photo.content.betweenDescriptionAndRates"),$_smarty_tpl);?>


                        <div class="ow_rates_wrap ow_small ow_hidden">
                            <span><?php echo smarty_function_text(array('key'=>'photo+rating'),$_smarty_tpl);?>
:</span>
                            <div class="ow_rates">
                                <div class="rates_cont clearfix">
                                    <a class="rate_item" href="javascript://">&nbsp;</a>
                                    <a class="rate_item" href="javascript://">&nbsp;</a>
                                    <a class="rate_item" href="javascript://">&nbsp;</a>
                                    <a class="rate_item" href="javascript://">&nbsp;</a>
                                    <a class="rate_item" href="javascript://">&nbsp;</a>
                                </div>
                                <div class="inactive_rate_list">
                                    <div style="width:0%;" class="active_rate_list"></div>
                                </div>
                            </div>
                            <span style="font-style: italic;" class="rate_title"></span>
                        </div>
                        <div class="ow_photo_share"></div>

                        <?php echo smarty_function_add_content(array('key'=>"photo.content.betweenRatesAndComments"),$_smarty_tpl);?>


                        <div class="ow_feed_comments ow_small"></div>
                    </div>
                </div>
                <div class="ow_feed_comments_input_sticky"></div>
            </div>
            <?php }?>
        </div>
    </div>
<?php }} ?>