<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 08:47:25
         compiled from "E:\wamp\www\hammu\ow_system_plugins\base\views\components\sign_in.html" */ ?>
<?php /*%%SmartyHeaderCode:22766558900fd6ef368-57738669%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '828d4d8df65331f5dc696eceedfb551030287835' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_system_plugins\\base\\views\\components\\sign_in.html',
      1 => 1432102790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22766558900fd6ef368-57738669',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_558900fd735f29_68386882',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558900fd735f29_68386882')) {function content_558900fd735f29_68386882($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.style.php';
if (!is_callable('smarty_block_form')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.form.php';
if (!is_callable('smarty_block_block_decorator')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.block_decorator.php';
if (!is_callable('smarty_function_input')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.input.php';
if (!is_callable('smarty_function_submit')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.submit.php';
if (!is_callable('smarty_function_label')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.label.php';
if (!is_callable('smarty_function_url_for_route')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.url_for_route.php';
if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_component')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.component.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

.base_sign_in{ height: auto; }
.ow_footer{ display:none; }
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<div class="ow_sign_in_wrap">

<?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>'sign-in','class'=>'remove_form')); $_block_repeat=true; echo smarty_block_form(array('name'=>'sign-in','class'=>'remove_form'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

     <div class="clearfix">
        <div class="ow_sign_in">
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>'box')); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>'box'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


                <div class="ow_user_name mail_part">
                    <?php echo smarty_function_input(array('style'=>' box-sizing: content-box;','name'=>'identity','class'=>'email_input'),$_smarty_tpl);?>

                </div>
                <div class="ow_password mail_part">
                    <?php echo smarty_function_input(array('style'=>' box-sizing: content-box;','name'=>'password','class'=>'email_input'),$_smarty_tpl);?>

                </div>
                <div class="ow_form_options clearfix">
                    <div class="ow_right">
                        <?php echo smarty_function_submit(array('name'=>'submit','class'=>'ow_positive','style'=>'border:none; height:47px; font-family:none;'),$_smarty_tpl);?>

                    </div>

                </div>
            <div class="forgot_pass">
                <p class="ow_remember_me"><?php echo smarty_function_input(array('name'=>'remember'),$_smarty_tpl);?>
<?php echo smarty_function_label(array('name'=>'remember'),$_smarty_tpl);?>
</p>
                <p class="ow_forgot_pass"><a href="<?php echo smarty_function_url_for_route(array('for'=>'base_forgot_password'),$_smarty_tpl);?>
"><?php echo smarty_function_text(array('key'=>'base+forgot_password_label'),$_smarty_tpl);?>
</a></p>
            </div>
            <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>'box'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            <div class="ow_connect_buttons">
                <?php echo smarty_function_component(array('class'=>'BASE_CMP_SignInButtonList'),$_smarty_tpl);?>

            </div>
        </div>

     </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>'sign-in','class'=>'remove_form'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div><?php }} ?>