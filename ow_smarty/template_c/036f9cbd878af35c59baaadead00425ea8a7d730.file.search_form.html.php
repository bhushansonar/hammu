<?php /* Smarty version Smarty-3.1.12, created on 2015-07-04 06:59:35
         compiled from "E:\wamp\www\hammu\ow_plugins\usearch\views\controllers\search_form.html" */ ?>
<?php /*%%SmartyHeaderCode:19069559768376e4740-46310401%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '036f9cbd878af35c59baaadead00425ea8a7d730' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\usearch\\views\\controllers\\search_form.html',
      1 => 1432099689,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19069559768376e4740-46310401',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'authMessage' => 0,
    'displayAccountType' => 0,
    'displayGender' => 0,
    'alt' => 0,
    'questionList' => 0,
    'section' => 0,
    'questions' => 0,
    'question' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_559768379ca5f2_16574928',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559768379ca5f2_16574928')) {function content_559768379ca5f2_16574928($_smarty_tpl) {?><?php if (!is_callable('smarty_block_script')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.script.php';
if (!is_callable('smarty_block_form')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.form.php';
if (!is_callable('smarty_function_cycle')) include 'E:\\wamp\\www\\hammu\\ow_libraries\\smarty3\\plugins\\function.cycle.php';
if (!is_callable('smarty_function_label')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.label.php';
if (!is_callable('smarty_function_input')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.input.php';
if (!is_callable('smarty_function_error')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.error.php';
if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_submit')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.submit.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('script', array()); $_block_repeat=true; echo smarty_block_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


$(function(){
    $("form[name='MainSearchForm'] [name='match_sex']").change(
        function(){ this.form.submit(); }
    );
});

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php if (isset($_smarty_tpl->tpl_vars['menu']->value)){?><?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['authMessage']->value)){?>
<div class="ow_anno ow_std_margin ow_nocontent"><?php echo $_smarty_tpl->tpl_vars['authMessage']->value;?>
</div>
<?php }else{ ?>
<div class="clearfix">
    <div class="ow_superwide ow_automargin">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>'MainSearchForm')); $_block_repeat=true; echo smarty_block_form(array('name'=>'MainSearchForm'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <table class="ow_table_1 ow_form">
            <?php if ($_smarty_tpl->tpl_vars['displayAccountType']->value==true){?>
                <?php if (!empty($_smarty_tpl->tpl_vars['displayGender']->value)){?>
                    <tr class=" ow_tr_first ow_tr_last">
                        <?php echo smarty_function_cycle(array('assign'=>'alt','values'=>'ow_alt1,ow_alt2'),$_smarty_tpl);?>

                        <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_label">
                            <?php echo smarty_function_label(array('name'=>'sex'),$_smarty_tpl);?>

                        </td>
                        <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_value">
                            <?php echo smarty_function_input(array('name'=>'sex'),$_smarty_tpl);?>

                            <div style="height:1px;"></div>
                            <?php echo smarty_function_error(array('name'=>'sex'),$_smarty_tpl);?>

                        </td>
                    </tr>
                <?php }?>
                <tr class="ow_tr_first">
                    <?php echo smarty_function_cycle(array('assign'=>'alt','values'=>'ow_alt1,ow_alt2'),$_smarty_tpl);?>

                    <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_label">
                        <?php echo smarty_function_label(array('name'=>'match_sex'),$_smarty_tpl);?>

                    </td>
                    <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_value">
                        <?php echo smarty_function_input(array('name'=>'match_sex'),$_smarty_tpl);?>

                        <div style="height:1px;"></div>
                        <?php echo smarty_function_error(array('name'=>'match_sex'),$_smarty_tpl);?>

                    </td>
                </tr>
                
                <tr class="">
                    <?php echo smarty_function_cycle(array('assign'=>'alt','values'=>'ow_alt1,ow_alt2'),$_smarty_tpl);?>

                    <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_label">
                        <?php echo smarty_function_label(array('name'=>'online'),$_smarty_tpl);?>

                    </td>
                    <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_value">
                        <?php echo smarty_function_input(array('name'=>'online'),$_smarty_tpl);?>

                        <div style="height:1px;"></div>
                        <?php echo smarty_function_error(array('name'=>'online'),$_smarty_tpl);?>

                    </td>
                </tr>
                
                <tr class="ow_tr_last">
                    <?php echo smarty_function_cycle(array('assign'=>'alt','values'=>'ow_alt1,ow_alt2'),$_smarty_tpl);?>

                    <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_label">
                        <?php echo smarty_function_label(array('name'=>'with_photo'),$_smarty_tpl);?>

                    </td>
                    <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_value">
                        <?php echo smarty_function_input(array('name'=>'with_photo'),$_smarty_tpl);?>

                        <div style="height:1px;"></div>
                        <?php echo smarty_function_error(array('name'=>'with_photo'),$_smarty_tpl);?>

                    </td>
                </tr>
                
                <tr class="ow_tr_delimiter"><td></td></tr>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['questionList']->value)){?>
            <?php  $_smarty_tpl->tpl_vars['questions'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['questions']->_loop = false;
 $_smarty_tpl->tpl_vars['section'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['questionList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['questions']->key => $_smarty_tpl->tpl_vars['questions']->value){
$_smarty_tpl->tpl_vars['questions']->_loop = true;
 $_smarty_tpl->tpl_vars['section']->value = $_smarty_tpl->tpl_vars['questions']->key;
?>
            <?php if (!empty($_smarty_tpl->tpl_vars['section']->value)){?>
            <tr class="ow_tr_first"><th colspan="3"><?php echo smarty_function_text(array('key'=>"base+questions_section_".((string)$_smarty_tpl->tpl_vars['section']->value)."_label"),$_smarty_tpl);?>
</th></tr>
            <?php }?>
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
                <tr class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['question']['last']){?>ow_tr_last<?php }?>">
                    <?php echo smarty_function_cycle(array('assign'=>'alt','values'=>'ow_alt1,ow_alt2'),$_smarty_tpl);?>

                    <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_label">
                        <?php echo smarty_function_label(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name']),$_smarty_tpl);?>

                    </td>
                    <td class="<?php echo $_smarty_tpl->tpl_vars['alt']->value;?>
 ow_value">
                        <?php echo smarty_function_input(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name']),$_smarty_tpl);?>

                        <div style="height:1px;"></div>
                        <?php echo smarty_function_error(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name']),$_smarty_tpl);?>

                    </td>
                </tr>
            <?php } ?>
            <tr class="ow_tr_delimiter"><td></td></tr>
            <?php } ?>
            <?php }?>
        </table>
        <div class="clearfix">
            <div class="ow_right">
                <?php echo smarty_function_submit(array('name'=>'MainSearchFormSubmit'),$_smarty_tpl);?>

            </div>
        </div>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>'MainSearchForm'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
</div>
<?php }?>
<?php }} ?>