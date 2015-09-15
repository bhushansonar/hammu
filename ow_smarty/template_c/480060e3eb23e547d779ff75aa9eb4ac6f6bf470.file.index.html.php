<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 08:47:25
         compiled from "E:\wamp\www\hammu\ow_themes\morning\master_pages\index.html" */ ?>
<?php /*%%SmartyHeaderCode:26263558900fd67d305-11694134%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '480060e3eb23e547d779ff75aa9eb4ac6f6bf470' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_themes\\morning\\master_pages\\index.html',
      1 => 1432100915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26263558900fd67d305-11694134',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'theme_css_url' => 0,
    'site_url' => 0,
    'bottom_menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_558900fd6bde19_21299401',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558900fd6bde19_21299401')) {function content_558900fd6bde19_21299401($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.style.php';
if (!is_callable('smarty_function_component')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.component.php';
if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_decorator')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.decorator.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

.home_page .ow_right{ margin-right: 4px !important; }
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<link href="<?php echo $_smarty_tpl->tpl_vars['theme_css_url']->value;?>
dd.css" rel="stylesheet" type="text/css">

<script src="<?php echo $_smarty_tpl->tpl_vars['theme_css_url']->value;?>
js/jquery.dd.js"></script>
<div id="wrap">
            <header class="head_main">
                <h1 class="logo">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
"> <img src="<?php echo $_smarty_tpl->tpl_vars['theme_css_url']->value;?>
img/logo.png" alt=""></a>
                </h1>
            </header>
    
            <div class="flag_main">
                <?php echo smarty_function_component(array('class'=>'BASE_CMP_Console'),$_smarty_tpl);?>

            </div>
            <nav class="menu_main">
                <div class="part_menu"></div>
            </nav>
            <section class="main_section">
                <div class="main_div">
                    <div class="home_page">
                        

                            <?php echo smarty_function_component(array('class'=>'BASE_CMP_SignIn'),$_smarty_tpl);?>


                            <div class="or_mar">

                                OR
                            </div>

                            <div class="regs_mar">
                                <?php echo smarty_function_component(array('class'=>'BASE_CMP_JoinButton','cssClass'=>'reg_btn'),$_smarty_tpl);?>

                            </div>
                        </div>

                        <div class="home_video_main">

                            <video class="hammu_video" width="542" height="307" controls>
                                <source src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
hammu.mp4" type="video/mp4">
                                <source src="<?php echo $_smarty_tpl->tpl_vars['site_url']->value;?>
movie.ogg" type="video/ogg">

                            </video>
                        </div>

                    </div>


               
            </section>
            <div class="foot_botom">
                <?php echo $_smarty_tpl->tpl_vars['bottom_menu']->value;?>


            </div>
            <footer class="foot_main">
                <div class="foot_area">
                    <p class="copy">
                        <?php echo smarty_function_text(array('key'=>'base+copyright'),$_smarty_tpl);?>

                    </p>
                </div>
            </footer>
        </div>
<?php echo smarty_function_decorator(array('name'=>'floatbox'),$_smarty_tpl);?>
<?php }} ?>