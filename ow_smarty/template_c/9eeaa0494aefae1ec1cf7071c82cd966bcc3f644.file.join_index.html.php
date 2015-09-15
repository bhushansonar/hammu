<?php /* Smarty version Smarty-3.1.12, created on 2015-05-12 09:26:42
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/skadate/views/controllers/join_index.html" */ ?>
<?php /*%%SmartyHeaderCode:17935462685551ff92d1e122-08254715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9eeaa0494aefae1ec1cf7071c82cd966bcc3f644' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/skadate/views/controllers/join_index.html',
      1 => 1430991273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17935462685551ff92d1e122-08254715',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'notValidInviteCode' => 0,
    'step' => 0,
    'joinConnectHook' => 0,
    'item' => 0,
    'questionArray' => 0,
    'section' => 0,
    'questions' => 0,
    'question' => 0,
    'isLastStep' => 0,
    'display_photo' => 0,
    'display_terms_of_use' => 0,
    'display_captcha' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5551ff92ef4c24_11133057',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5551ff92ef4c24_11133057')) {function content_5551ff92ef4c24_11133057($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.style.php';
if (!is_callable('smarty_block_block_decorator')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.block_decorator.php';
if (!is_callable('smarty_function_text')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.text.php';
if (!is_callable('smarty_block_form')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.form.php';
if (!is_callable('smarty_function_label')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.label.php';
if (!is_callable('smarty_function_input')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.input.php';
if (!is_callable('smarty_function_error')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.error.php';
if (!is_callable('smarty_function_question_description_lang')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.question_description_lang.php';
if (!is_callable('smarty_function_cycle')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_libraries/smarty3/plugins/function.cycle.php';
if (!is_callable('smarty_function_submit')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.submit.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

.ow_box_cap_empty{ border:none !important; }

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>"box",'type'=>"empty",'addClass'=>"ow_superwide ow_automargin")); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_superwide ow_automargin"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php if (isset($_smarty_tpl->tpl_vars['notValidInviteCode']->value)){?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>"box",'type'=>"empty",'addClass'=>"ow_center",'style'=>"padding:15px; 
display:none; ")); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_center",'style'=>"padding:15px; 
display:none; "), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php echo smarty_function_text(array('key'=>"base+join_not_valid_invite_code"),$_smarty_tpl);?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_center",'style'=>"padding:15px; 
display:none; "), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }else{ ?>
<?php if ($_smarty_tpl->tpl_vars['step']->value==1){?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>"box",'type'=>"empty",'addClass'=>"ow_center",'style'=>"padding:15px; 
display:none;")); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_center",'style'=>"padding:15px; 
display:none;"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php echo smarty_function_text(array('key'=>"base+join_promo"),$_smarty_tpl);?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_center",'style'=>"padding:15px; 
display:none;"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php if (!empty($_smarty_tpl->tpl_vars['joinConnectHook']->value)){?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>"box",'addClass'=>"ow_center",'style'=>"overflow:hidden;",'iconClass'=>'ow_ic_key','langLabel'=>'base+join_connect_title')); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>"box",'addClass'=>"ow_center",'style'=>"overflow:hidden;",'iconClass'=>'ow_ic_key','langLabel'=>'base+join_connect_title'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['joinConnectHook']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<?php echo $_smarty_tpl->tpl_vars['item']->value;?>

<?php } ?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>"box",'addClass'=>"ow_center",'style'=>"overflow:hidden;",'iconClass'=>'ow_ic_key','langLabel'=>'base+join_connect_title'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>"box",'type'=>"empty",'addClass'=>"ow_center",'style'=>"padding:15px;")); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_center",'style'=>"padding:15px;"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<?php echo smarty_function_text(array('key'=>"base+join_or"),$_smarty_tpl);?>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_center",'style'=>"padding:15px;"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>
<?php }?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>'box','type'=>'empty','iconClass'=>'ow_ic_user pink_title','langLabel'=>'base+join_form_title')); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>'box','type'=>'empty','iconClass'=>'ow_ic_user pink_title','langLabel'=>'base+join_form_title'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>'box','type'=>'empty','iconClass'=>'ow_ic_user pink_title','langLabel'=>'base+join_form_title'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>'joinForm')); $_block_repeat=true; echo smarty_block_form(array('name'=>'joinForm'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<table class="ow_table_1 ow_form">
    <?php  $_smarty_tpl->tpl_vars['questions'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['questions']->_loop = false;
 $_smarty_tpl->tpl_vars['section'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['questionArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['questions']->key => $_smarty_tpl->tpl_vars['questions']->value){
$_smarty_tpl->tpl_vars['questions']->_loop = true;
 $_smarty_tpl->tpl_vars['section']->value = $_smarty_tpl->tpl_vars['questions']->key;
?>
    <?php if (!empty($_smarty_tpl->tpl_vars['section']->value)){?><tr class="ow_tr_first" style="display: none; "><th 
            colspan="3"><?php echo smarty_function_text(array('key'=>"base+questions_section_".((string)$_smarty_tpl->tpl_vars['section']->value)."_label"),$_smarty_tpl);?>
</th></tr><?php }?>
    <?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['questions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['question']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['question']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value){
$_smarty_tpl->tpl_vars['question']->_loop = true;
 $_smarty_tpl->tpl_vars['question']->iteration++;
 $_smarty_tpl->tpl_vars['question']->last = $_smarty_tpl->tpl_vars['question']->iteration === $_smarty_tpl->tpl_vars['question']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['question']['last'] = $_smarty_tpl->tpl_vars['question']->last;
?>
    <tr class="<?php if (!empty($_smarty_tpl->tpl_vars['question']->value['trClass'])){?><?php echo $_smarty_tpl->tpl_vars['question']->value['trClass'];?>
<?php }?> <?php if (empty($_smarty_tpl->tpl_vars['section']->value)){?>ow_tr_first<?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['question']['last']&&$_smarty_tpl->tpl_vars['question']->value['name']!='password'){?>ow_tr_last<?php }?> main_input">
        <td class="ow_label main_inputleft">
            <?php echo smarty_function_label(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name'],'class'=>'main_inputleft'),$_smarty_tpl);?>

        </td>
        <td class="ow_value main_inputright">
            <?php echo smarty_function_input(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name'],'class'=>'pro_input'),$_smarty_tpl);?>

            <div style="height:1px;"></div>
            <?php echo smarty_function_error(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name']),$_smarty_tpl);?>

        </td>
        <td class="ow_desc">
            <?php echo smarty_function_question_description_lang(array('name'=>$_smarty_tpl->tpl_vars['question']->value['realName']),$_smarty_tpl);?>

        </td>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['question']->value['name']=='password'){?>
    <tr class="<?php if (!empty($_smarty_tpl->tpl_vars['question']->value['trClass'])&&$_smarty_tpl->tpl_vars['question']->value['trClass']=='ow_alt1'){?>ow_alt2<?php }else{ ?>ow_alt1<?php }?> <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['question']['last']){?>ow_tr_last<?php }?> main_input">
        <td class="ow_label main_inputleft">
            <?php echo smarty_function_label(array('name'=>'repeatPassword','class'=>'main_inputleft'),$_smarty_tpl);?>

        </td>
        <td class="ow_value main_inputright">
            <?php echo smarty_function_input(array('name'=>'repeatPassword','class'=>'pro_input'),$_smarty_tpl);?>

            <div style="height:1px;"></div>
            <?php echo smarty_function_error(array('name'=>'repeatPassword'),$_smarty_tpl);?>

        </td>
        <td class="ow_desc">
            <?php echo smarty_function_question_description_lang(array('name'=>'repeatPassword'),$_smarty_tpl);?>

        </td>
    </tr>
    <?php }?>
    <?php } ?>
    <?php if (!empty($_smarty_tpl->tpl_vars['section']->value)){?><tr class="ow_tr_delimiter"><td></td></tr><?php }?>
    <?php } ?>
    <?php if ($_smarty_tpl->tpl_vars['isLastStep']->value){?>
    <?php if ($_smarty_tpl->tpl_vars['display_photo']->value){?>
    <tr class="ow_tr_first pink_title"><th colspan="3"><?php echo smarty_function_text(array('key'=>"base+questions_section_user_photo_label"),$_smarty_tpl);?>
</th></tr>
    <tr class="<?php echo smarty_function_cycle(array('name'=>'userPhoto','values'=>'ow_alt1,ow_alt2'),$_smarty_tpl);?>
 ow_tr_last main_input">
        <td class="ow_label main_inputright main_inputleft">
            <?php echo smarty_function_label(array('name'=>'userPhoto','class'=>'main_inputleft'),$_smarty_tpl);?>

        </td>
        <td class="ow_value main_inputright">
            <?php echo smarty_function_input(array('name'=>'userPhoto'),$_smarty_tpl);?>

            <div style="height:1px;"></div>
            <?php echo smarty_function_error(array('name'=>'userPhoto'),$_smarty_tpl);?>

        </td>
        <td class="ow_desc">
            <?php echo smarty_function_question_description_lang(array('name'=>'user_photo'),$_smarty_tpl);?>

        </td>
    </tr>
    <tr class="ow_tr_delimiter"><td></td></tr>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['display_terms_of_use']->value){?>
    <tr class="ow_tr_first pink_title"><th colspan="3"><?php echo smarty_function_text(array('key'=>"base+questions_section_terms_of_use_label"),$_smarty_tpl);?>
</th></tr>
    <tr class="<?php echo smarty_function_cycle(array('name'=>'userPhoto','values'=>'ow_alt1,ow_alt2'),$_smarty_tpl);?>
 ow_tr_last main_input">
        <td class="ow_label main_inputright">
                                       <?php echo smarty_function_label(array('name'=>'termOfUse','class'=>'main_inputleft'),$_smarty_tpl);?>

        </td>
        <td class="ow_value main_inputright">
                                  <?php echo smarty_function_input(array('name'=>'termOfUse','class'=>'pro_input'),$_smarty_tpl);?>

            <div style="height:1px;"></div>
            <?php echo smarty_function_error(array('name'=>'termOfUse'),$_smarty_tpl);?>

        </td>
        <td class="ow_desc">

        </td>
    </tr>
    <tr class="ow_tr_delimiter"><td></td></tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['display_captcha']->value){?>
    <tr class="ow_tr_first pink_title"><th colspan="3"><?php echo smarty_function_text(array('key'=>"base+questions_section_captcha_label"),$_smarty_tpl);?>
</th></tr>
    <tr class="<?php echo smarty_function_cycle(array('name'=>'captchaField','values'=>'ow_alt1,ow_alt2'),$_smarty_tpl);?>
 
        ow_tr_last main_input" >

        <td colspan="3" class="ow_center main_inputright">
            <div style='padding:10px;'>
                <?php echo smarty_function_input(array('name'=>'captchaField','class'=>'pro_input'),$_smarty_tpl);?>

                <div style="height:1px;"></div>
                <?php echo smarty_function_error(array('name'=>'captchaField'),$_smarty_tpl);?>

            </div>
        </td>
    </tr>
    <?php }?>
    <tr class="ow_tr_delimiter"><td></td></tr>
    <?php }?>
</table>
<div class="clearfix">
    <div class="ow_right">
        <?php echo smarty_function_submit(array('name'=>'joinSubmit'),$_smarty_tpl);?>

    </div>
</div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>'joinForm'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>"box",'type'=>"empty",'addClass'=>"ow_superwide ow_automargin"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }} ?>