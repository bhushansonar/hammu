<?php /* Smarty version Smarty-3.1.12, created on 2015-05-12 10:04:11
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/contactus/views/controllers/contact_index.html" */ ?>
<?php /*%%SmartyHeaderCode:9542478425552085ba0e774-62663694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a6baaee279ba99840abe858ed766ce4e2ffa236' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/contactus/views/controllers/contact_index.html',
      1 => 1430990969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9542478425552085ba0e774-62663694',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5552085ba84a87_66037757',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5552085ba84a87_66037757')) {function content_5552085ba84a87_66037757($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.style.php';
if (!is_callable('smarty_block_form')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.form.php';
if (!is_callable('smarty_function_label')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.label.php';
if (!is_callable('smarty_function_input')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.input.php';
if (!is_callable('smarty_function_error')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.error.php';
if (!is_callable('smarty_function_submit')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.submit.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


table.ow_table_1 td.ow_label
{
    width: 35%;
}

.contact_send{ line-height: 0px !important; padding: 23px 26px !important; font-size: 18px !important; margin-left: 110px !important; color: #5a5a5a !important; border:1px solid #6e6e6e !important; }
.cont_texarea{ background: #fff; border: solid 1px #8a8a8a; border-radius: 5px; height:126px !important; width: 326px;
               padding:15px 0 0 15px; margin: 0 0 0 0;
               -webkit-box-shadow: inset 3px 3px 5px 0px rgba(0,0,0,0.3);
               -moz-box-shadow: inset 3px 3px 5px 0px rgba(0,0,0,0.3);
               box-shadow: inset 3px 3px 5px 0px rgba(0,0,0,0.3);
}
.cap_input{ background: #fff !important; border: solid 1px #8a8a8a !important; border-radius: 5px !important; height: 48px !important; width: 115px !important;
            padding: 0 0 0 15px !important; margin: 0 0 0 0 !important;
            -webkit-box-shadow: inset 3px 3px 5px 0px rgba(0,0,0,0.3) !important;
            -moz-box-shadow: inset 3px 3px 5px 0px rgba(0,0,0,0.3) !important;
            box-shadow: inset 3px 3px 5px 0px rgba(0,0,0,0.3) !important;
}
.cont_inputright img{ position: relative; left: -58px; }
.cont_inputright #siimage_refresh{ position: relative; left: -37px; }
.cont_inputleft{ padding-right: 20px !important; }

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>'contact_form')); $_block_repeat=true; echo smarty_block_form(array('name'=>'contact_form'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<table class="ow_table_1 ow_form ow_automargin">
    <tr class="ow_alt1 ow_tr_first cont_input" style="background: none; display: none;">
        <td class="ow_label cont_inputleft" style="background: none;"><?php echo smarty_function_label(array('name'=>'to'),$_smarty_tpl);?>
</td>
		<td class="ow_value cont_inputright" style="background: none;"><?php echo smarty_function_input(array('name'=>'to','class'=>'contact_input'),$_smarty_tpl);?>
<?php echo smarty_function_error(array('name'=>'to'),$_smarty_tpl);?>
</td>
	</tr>
    <tr class="ow_alt2 cont_input cont_input" style="background: none;">
		<td class="ow_label cont_inputleft" style="background: none;"><?php echo smarty_function_label(array('name'=>'from'),$_smarty_tpl);?>
</td>
		<td class="ow_value cont_inputright" style="background: none;"><?php echo smarty_function_input(array('name'=>'from','class'=>'contact_input'),$_smarty_tpl);?>
<?php echo smarty_function_error(array('name'=>'from'),$_smarty_tpl);?>
</td>
	</tr>
        <tr class="ow_alt1 cont_input" style="background: none;">
		<td class="ow_label cont_inputleft" style="background: none;"><?php echo smarty_function_label(array('name'=>'subject'),$_smarty_tpl);?>
</td>
		<td class="ow_value cont_inputright" style="background: none;"><?php echo smarty_function_input(array('name'=>'subject','class'=>'contact_input'),$_smarty_tpl);?>
<?php echo smarty_function_error(array('name'=>'subject'),$_smarty_tpl);?>
</td>
	</tr>
    <tr class="ow_alt2 cont_input" style="background: none;">
		<td class="ow_label cont_inputleft" style="background: none;"><?php echo smarty_function_label(array('name'=>'message'),$_smarty_tpl);?>
</td>
		<td class="ow_value cont_inputright" style="background: none;"><?php echo smarty_function_input(array('name'=>'message','class'=>'contact_input cont_texarea'),$_smarty_tpl);?>
<?php echo smarty_function_error(array('name'=>'message'),$_smarty_tpl);?>
</td>
	</tr>
    <tr class="ow_alt1 ow_tr_last cont_input" style="background: none;">
		<td class="ow_label cont_inputleft" style="background: none;"><?php echo smarty_function_label(array('name'=>'captcha'),$_smarty_tpl);?>
</td>
		<td class="ow_value ow_center cont_inputright" style="background: none;"><?php echo smarty_function_input(array('style'=>'float:left;','name'=>'captcha','class'=>'cap_input'),$_smarty_tpl);?>
<?php echo smarty_function_error(array('name'=>'captcha'),$_smarty_tpl);?>
</td>
	</tr>
</table>
<div class="clearfix ow_stdmargin ow_automargin"><div class="ow_right">
<?php echo smarty_function_submit(array('name'=>'send','class'=>'ow_button ow_ic_mail pro_btnsin contact_send'),$_smarty_tpl);?>

</div></div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>'contact_form'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }} ?>