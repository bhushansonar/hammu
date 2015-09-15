<?php /* Smarty version Smarty-3.1.12, created on 2015-05-18 06:52:59
         compiled from "E:\wamp\www\hammu\ow_system_plugins\base\views\controllers\edit_index.html" */ ?>
<?php /*%%SmartyHeaderCode:94615559c48b020d75-28496052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adc726d52ebc038b30f01192c93f3d651fb65a7e' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_system_plugins\\base\\views\\controllers\\edit_index.html',
      1 => 1431929588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94615559c48b020d75-28496052',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'unregisterProfileUrl' => 0,
    'user_sex' => 0,
    'changePassword' => 0,
    'editSynchronizeHook' => 0,
    'item' => 0,
    'displayAccountType' => 0,
    'questionArray' => 0,
    'section' => 0,
    'questions' => 0,
    'alt' => 0,
    'question' => 0,
    'isAdmin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5559c48b21f5a8_07433080',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559c48b21f5a8_07433080')) {function content_5559c48b21f5a8_07433080($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.style.php';
if (!is_callable('smarty_block_block_decorator')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.block_decorator.php';
if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_block_form')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.form.php';
if (!is_callable('smarty_function_label')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.label.php';
if (!is_callable('smarty_function_input')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.input.php';
if (!is_callable('smarty_function_error')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.error.php';
if (!is_callable('smarty_function_cycle')) include 'E:\\wamp\\www\\hammu\\ow_libraries\\smarty3\\plugins\\function.cycle.php';
if (!is_callable('smarty_function_question_description_lang')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.question_description_lang.php';
if (!is_callable('smarty_function_decorator')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.decorator.php';
if (!is_callable('smarty_function_submit')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.submit.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


.edit_info_left{ background:none !important; border:none !important; color:#6a6a6a !important; text-align:left !important; }
.edit_info_right{background:none !important; border:none !important; color:#6a6a6a !important; }
.edit_info_right input[type=checkbox]{ height: auto !important; width: auto !important; }
.edit_info_right select{ width: auto !important; }
.ow_tr_first{ display:none !important; }
.profile_box{ width: 496px !important; float:left;}
.save_edit{ width: 405px !important;}
.save_edit input[type=submit]{ height: auto !important; border: 1px solid #6e6e6e !important; padding: 6px 32px !important; color: #5a5a5a !important;}
.main_right{ width: 736px !important;}
.green_title{ width: 476px !important; }
.status_box{ float:left; margin-left: 24px; margin-top: -33px; }

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>



<script language="javascript" type="text/javascript">
    $(function(){
        $(".unregister_profile_button").click(
            function() { window.location = "<?php echo $_smarty_tpl->tpl_vars['unregisterProfileUrl']->value;?>
" }
        );
   });
</script>


<?php if ($_smarty_tpl->tpl_vars['user_sex']->value=='808aa8ca354f51c5a3868dad5298cd72'){?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        .main_joinarea{ background: url(men-bg.png)no-repeat center 256px !important; }
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>
<?php if (!empty($_smarty_tpl->tpl_vars['changePassword']->value)){?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>"box",'type'=>"empty",'addClass'=>"ow_superwide ow_automargin")); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_superwide ow_automargin"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <div class="clearfix ow_stdmargin"><div class="ow_right"><?php echo $_smarty_tpl->tpl_vars['changePassword']->value;?>
</div></div>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_superwide ow_automargin"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>"box",'type'=>"empty",'addClass'=>"ow_superwide ow_automargin")); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_superwide ow_automargin"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php if (isset($_smarty_tpl->tpl_vars['editSynchronizeHook']->value)){?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>"box",'addClass'=>"ow_center",'iconClass'=>'ow_ic_update','langLabel'=>'base+edit_remote_field_synchronize_title','style'=>"overflow:hidden;")); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>"box",'addClass'=>"ow_center",'iconClass'=>'ow_ic_update','langLabel'=>'base+edit_remote_field_synchronize_title','style'=>"overflow:hidden;"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

       <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['editSynchronizeHook']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
          <?php echo $_smarty_tpl->tpl_vars['item']->value;?>

       <?php } ?>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>"box",'addClass'=>"ow_center",'iconClass'=>'ow_ic_update','langLabel'=>'base+edit_remote_field_synchronize_title','style'=>"overflow:hidden;"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>"box",'type'=>"empty",'addClass'=>"ow_center",'style'=>"padding:15px;")); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_center",'style'=>"padding:15px;"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php echo smarty_function_text(array('key'=>"base+join_or"),$_smarty_tpl);?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_center",'style'=>"padding:15px;"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>'editForm')); $_block_repeat=true; echo smarty_block_form(array('name'=>'editForm'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <table class="ow_table_1 ow_form ow_stdmargin">
        <?php if ($_smarty_tpl->tpl_vars['displayAccountType']->value){?>
            <tr class="ow_alt1 ow_tr_first">
                <td class="ow_label">
                    <?php echo smarty_function_label(array('name'=>'accountType'),$_smarty_tpl);?>

                </td>
                <td class="ow_value">
                    <?php echo smarty_function_input(array('name'=>'accountType'),$_smarty_tpl);?>

                    <div style="height:1px;"></div>
                    <?php echo smarty_function_error(array('name'=>'accountType'),$_smarty_tpl);?>

                </td>
                <td class="ow_desc ow_small">

                </td>
            </tr>
        <?php }?>
        <tr class="ow_tr_delimiter"><td></td></tr>
        <?php  $_smarty_tpl->tpl_vars['questions'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['questions']->_loop = false;
 $_smarty_tpl->tpl_vars['section'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['questionArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['questions']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['questions']->iteration=0;
 $_smarty_tpl->tpl_vars['questions']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['questions']->key => $_smarty_tpl->tpl_vars['questions']->value){
$_smarty_tpl->tpl_vars['questions']->_loop = true;
 $_smarty_tpl->tpl_vars['section']->value = $_smarty_tpl->tpl_vars['questions']->key;
 $_smarty_tpl->tpl_vars['questions']->iteration++;
 $_smarty_tpl->tpl_vars['questions']->index++;
 $_smarty_tpl->tpl_vars['questions']->first = $_smarty_tpl->tpl_vars['questions']->index === 0;
 $_smarty_tpl->tpl_vars['questions']->last = $_smarty_tpl->tpl_vars['questions']->iteration === $_smarty_tpl->tpl_vars['questions']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['question']['first'] = $_smarty_tpl->tpl_vars['questions']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['question']['last'] = $_smarty_tpl->tpl_vars['questions']->last;
?>
            <?php if (!empty($_smarty_tpl->tpl_vars['section']->value)){?>
                <tr class="ow_tr_first"><th colspan="3"><?php echo smarty_function_text(array('key'=>"base+questions_section_".((string)$_smarty_tpl->tpl_vars['section']->value)."_label"),$_smarty_tpl);?>
</th></tr>
            <?php }?>
            
            <?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['questions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['question']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['question']->iteration=0;
 $_smarty_tpl->tpl_vars['question']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value){
$_smarty_tpl->tpl_vars['question']->_loop = true;
 $_smarty_tpl->tpl_vars['question']->iteration++;
 $_smarty_tpl->tpl_vars['question']->index++;
 $_smarty_tpl->tpl_vars['question']->first = $_smarty_tpl->tpl_vars['question']->index === 0;
 $_smarty_tpl->tpl_vars['question']->last = $_smarty_tpl->tpl_vars['question']->iteration === $_smarty_tpl->tpl_vars['question']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['question']['first'] = $_smarty_tpl->tpl_vars['question']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['question']['last'] = $_smarty_tpl->tpl_vars['question']->last;
?>
                <?php echo smarty_function_cycle(array('assign'=>'alt','name'=>$_smarty_tpl->tpl_vars['section']->value,'values'=>'ow_alt1,ow_alt2'),$_smarty_tpl);?>

                <tr class=" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['question']['last']){?>ow_tr_last<?php }?> edit_info_main">
                    <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_label edit_info_left in-block">
                        <?php echo smarty_function_label(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name']),$_smarty_tpl);?>

                    </td>
                    <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_value edit_info_right in-block">
                        <?php echo smarty_function_input(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name'],'class'=>'edit_input'),$_smarty_tpl);?>

                        <div style="height:1px;"></div>
                        <?php echo smarty_function_error(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name']),$_smarty_tpl);?>

                    </td>
                    <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_desc ow_small">
                        <?php echo smarty_function_question_description_lang(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name']),$_smarty_tpl);?>

                    </td>
                </tr>
            <?php } ?>
            <?php if (!empty($_smarty_tpl->tpl_vars['section']->value)){?><?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['question']['first']){?>
            <tr class="ow_tr_delimiter"><td></td></tr>
            <?php }?>
            <?php }?>
        <?php } ?>
    </table>
	<div class="clearfix ow_stdmargin<?php if (!$_smarty_tpl->tpl_vars['isAdmin']->value){?> ow_btn_delimiter<?php }?>">
	   <div class="ow_right save_edit">
		   <?php if (!$_smarty_tpl->tpl_vars['isAdmin']->value){?>
				<?php echo smarty_function_decorator(array('name'=>"button",'class'=>"unregister_profile_button ow_ic_delete ow_red ow_negative",'langLabel'=>'base+delete_profile'),$_smarty_tpl);?>

		   <?php }?>
		   <?php echo smarty_function_submit(array('name'=>'editSubmit','class'=>'pro_btnsin'),$_smarty_tpl);?>

	   </div>
	</div>


<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>'editForm'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_superwide ow_automargin"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }} ?>