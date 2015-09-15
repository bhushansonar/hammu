<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 08:47:43
         compiled from "E:\wamp\www\hammu\ow_themes\morning\master_pages\general.html" */ ?>
<?php /*%%SmartyHeaderCode:250985589010f8177a0-79941873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '771a04bd16c2021f392a8c22886229c1130a947a' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_themes\\morning\\master_pages\\general.html',
      1 => 1432100913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '250985589010f8177a0-79941873',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_login_id' => 0,
    'site_url' => 0,
    'theme_css_url' => 0,
    'main_menu' => 0,
    'page_name' => 0,
    'heading' => 0,
    'content' => 0,
    'profile_status' => 0,
    'membership' => 0,
    'bottom_menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5589010f8b4f57_46413020',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5589010f8b4f57_46413020')) {function content_5589010f8b4f57_46413020($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.style.php';
if (!is_callable('smarty_function_component')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.component.php';
if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_add_content')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.add_content.php';
if (!is_callable('smarty_function_decorator')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.decorator.php';
?><style>
    .ow_sign_in_wrap{ width: 100% !important;}
    .ow_sign_in{ width: 100% !important; }
    .ow_box{ padding-left: 0px !important; }
    .mail_part{ margin-left:0px !important; margin-bottom: 0px !important; }
    .ow_sign_in_wrap form{ padding: 0px !important;}
    .email_input{ width: 160px !important; background: #e4e4e4 none repeat scroll 0 0 !important;
                  border: 1px solid #7c7c7c !important;
                  border-radius: 5px !important;
                  box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, 0.3) inset !important;
                  height: 40px !important;
                  margin: 19px 0 0 !important;
                  padding: 0 0 0 15px !important;
    }
    .ow_right{ float: left !important; }
    .forgot_pass{ margin-left: 0px !important;}
    .ow_form_options{ margin-top: 20px !important; }
    .ow_sign_in input[type=submit]{ width:92px !important; margin-left: 41px !important; }
    .red_span{ color: #FF0000 !important;}
</style>
<?php if (!empty($_smarty_tpl->tpl_vars['is_login_id']->value)){?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

.main_right{ width: 736px !important; }
.green_title{ width: 476px !important; }
.profile_box{ float:left !important; }
.status_box{ float:left !important; margin-left: 24px !important; margin-top: -33px !important;}
.cont_inputleft{ padding-right: 20px !important; }
.ow_smallmargin, .profile_box .ow_stdmargin{ margin-left: 10px !important; }
.h3_title{ margin-left: 10px !important; font-size:15px !important; }
.ladyhome_left .ow_box_cap_empty{ background:none !important; border:none !important; }
.ladyhome_left .ow_box_cap_empty h3{ margin-left: 52px !important; height: 22px; margin-top: 5px; }
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>
<div id="wrap">
    <header class="head_main">

        <h1 class="logo-small">
            <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
"> <img src="<?php echo $_smarty_tpl->tpl_vars['theme_css_url']->value;?>
img/logo-small.png" alt=""></a>
        </h1>
    </header>
    <div class="flag_main">
        <?php echo smarty_function_component(array('class'=>'BASE_CMP_Console'),$_smarty_tpl);?>

    </div>
    <nav class="menu_main">
        <div class="part_menu">
            <div class="main-menu">
                
                <?php echo $_smarty_tpl->tpl_vars['main_menu']->value;?>

            </div>
        </div>
    </nav>


    <section class="main_join">
        <?php if (($_smarty_tpl->tpl_vars['page_name']->value=='download-app')){?>
            <div class="main_div">
                    <div class="download_main">
                        <div class="phone_main">
                            <div class="idevice"><img src="<?php echo $_smarty_tpl->tpl_vars['theme_css_url']->value;?>
img/iphone.png" alt=""></div>
                            <div class="iabtn">
                                <h2 class="download_title">Download our App</h2>
                                <a href="<?php echo smarty_function_text(array('key'=>'ads+ads_app_store'),$_smarty_tpl);?>
"><img class="appstore_img" src="<?php echo $_smarty_tpl->tpl_vars['theme_css_url']->value;?>
img/appstore_btn.png" alt=""></a>
                                <a href="<?php echo smarty_function_text(array('key'=>'ads+ads_google_play'),$_smarty_tpl);?>
"><img class="google_play" src="<?php echo $_smarty_tpl->tpl_vars['theme_css_url']->value;?>
img/googleplay_btn.png" alt=""></a>
                            </div>
                            <div class="adevice"><img src="<?php echo $_smarty_tpl->tpl_vars['theme_css_url']->value;?>
img/android_btn.png" alt=""></div>

                        </div>
                    </div>
            </div>
        <?php }else{ ?>
        <div class="main_joinarea">
            <?php if (empty($_smarty_tpl->tpl_vars['is_login_id']->value)){?>
            <div class="main_left multbg-top-to-bottom ">
                <div class="sign_box">
                    <?php echo smarty_function_component(array('class'=>'BASE_CMP_SignIn'),$_smarty_tpl);?>

                </div>
            </div>
            <?php }else{ ?>
            <div class="ladyhome_left">

                <?php echo smarty_function_component(array('class'=>"BASE_CMP_Sidebar"),$_smarty_tpl);?>


            </div>
            <?php }?>

            <div class="main_right">
                <h1 class="green_title">
                    <?php echo $_smarty_tpl->tpl_vars['heading']->value;?>

                </h1>
                <div class="profile_box">
                    <div class="pro_info">
                        <?php echo smarty_function_add_content(array('key'=>'base.add_page_top_content'),$_smarty_tpl);?>

                        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

                        <?php echo smarty_function_add_content(array('key'=>'base.add_page_bottom_content'),$_smarty_tpl);?>

                    </div>
                </div>

                <?php if (!empty($_smarty_tpl->tpl_vars['is_login_id']->value)){?>
                    <div class="ladyhome_right_rg status_box">
                        <h4 class="stastus_tit">Status</h4>
                        <div class="line push_ten"></div>
                        <div class="status_main">
                            <div class="status_left in-block">Profile status<span class="right-flot">:</span></div>
                            <div class="status_right in-block"><?php echo $_smarty_tpl->tpl_vars['profile_status']->value;?>
</div>
                        </div>
<!--                        <div class="status_main">
                            <div class="status_left in-block">Membership <span class="right-flot">:</span></div>
                            <div class="status_right in-block"><?php echo $_smarty_tpl->tpl_vars['membership']->value;?>
</div>
                        </div>-->
                    </div>
                <?php }?>

            </div>

        </div>
        <?php }?>
    </section>

</div>
<div class="foot_botom">
    <div class="home_policy">
        <?php echo $_smarty_tpl->tpl_vars['bottom_menu']->value;?>

    </div>
</div>
<footer class="foot_main">
    <div class="foot_area">
        <p class="copy">
            <?php echo smarty_function_text(array('key'=>'base+copyright'),$_smarty_tpl);?>

        </p>
    </div>

</footer>


<?php echo smarty_function_decorator(array('name'=>'floatbox'),$_smarty_tpl);?>
<?php }} ?>