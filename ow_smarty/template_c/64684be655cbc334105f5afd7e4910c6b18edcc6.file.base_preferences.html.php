<?php /* Smarty version Smarty-3.1.12, created on 2015-05-18 06:42:42
         compiled from "E:\wamp\www\hammu\ow_plugins\matchmaking\views\controllers\base_preferences.html" */ ?>
<?php /*%%SmartyHeaderCode:66615559c22286b2b4-89681364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64684be655cbc334105f5afd7e4910c6b18edcc6' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\matchmaking\\views\\controllers\\base_preferences.html',
      1 => 1431930819,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66615559c22286b2b4-89681364',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'noQuestions' => 0,
    'questionArray' => 0,
    'section' => 0,
    'questions' => 0,
    'question' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5559c222bb2df7_46936569',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559c222bb2df7_46936569')) {function content_5559c222bb2df7_46936569($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_block_form')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.form.php';
if (!is_callable('smarty_function_cycle')) include 'E:\\wamp\\www\\hammu\\ow_libraries\\smarty3\\plugins\\function.cycle.php';
if (!is_callable('smarty_function_label')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.label.php';
if (!is_callable('smarty_function_input')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.input.php';
if (!is_callable('smarty_function_error')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.error.php';
if (!is_callable('smarty_function_submit')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.submit.php';
?><div class="ow_box_empty ow_superwide ow_automargin ow_no_cap ow_break_word" style="">
    <?php if ($_smarty_tpl->tpl_vars['noQuestions']->value){?>
    <div class="ow_stdmargin">
        <?php echo smarty_function_text(array('key'=>'matchmaking+no_questions'),$_smarty_tpl);?>

    </div>
    <?php }else{ ?>
    <div class="ow_stdmargin">
        <?php echo smarty_function_text(array('key'=>'matchmaking+preferences_invitation'),$_smarty_tpl);?>

    </div>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>'MATCHMAKING_PreferencesForm')); $_block_repeat=true; echo smarty_block_form(array('name'=>'MATCHMAKING_PreferencesForm'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <table class="ow_table_1 ow_form ow_stdmargin">
            <tbody>
            <?php  $_smarty_tpl->tpl_vars['questions'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['questions']->_loop = false;
 $_smarty_tpl->tpl_vars['section'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['questionArray']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['questions']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['questions']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['questions']->key => $_smarty_tpl->tpl_vars['questions']->value){
$_smarty_tpl->tpl_vars['questions']->_loop = true;
 $_smarty_tpl->tpl_vars['section']->value = $_smarty_tpl->tpl_vars['questions']->key;
 $_smarty_tpl->tpl_vars['questions']->iteration++;
 $_smarty_tpl->tpl_vars['questions']->last = $_smarty_tpl->tpl_vars['questions']->iteration === $_smarty_tpl->tpl_vars['questions']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["q"]['last'] = $_smarty_tpl->tpl_vars['questions']->last;
?>
            <?php if (!empty($_smarty_tpl->tpl_vars['section']->value)){?>
            <tr class="ow_tr_first"><th colspan="3"><?php echo smarty_function_text(array('key'=>"base+questions_section_".((string)$_smarty_tpl->tpl_vars['section']->value)."_label"),$_smarty_tpl);?>
</th></tr>
            <?php }?>
            <?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['questions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value){
$_smarty_tpl->tpl_vars['question']->_loop = true;
?>
            <tr class="<?php echo smarty_function_cycle(array('values'=>'ow_alt1, ow_alt2'),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['q']['last']){?>ow_tr_last<?php }?>">
                <td class="ow_label"><?php echo smarty_function_label(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name']),$_smarty_tpl);?>
</td>
                <td class="ow_value"><?php echo smarty_function_input(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name']),$_smarty_tpl);?>
<div style="height:1px;"></div><?php echo smarty_function_error(array('name'=>$_smarty_tpl->tpl_vars['question']->value['name']),$_smarty_tpl);?>
</td>
                <td class="ow_desc ow_small ow_txtcenter"><?php echo $_smarty_tpl->tpl_vars['question']->value['acc_type_label'];?>
</td>
            </tr>
            <?php } ?>
            <?php } ?>

            <tr class="ow_tr_delimiter"><td></td></tr>
            </tbody></table>

        <!------------ ---------->

        <div class="clearfix ow_stdmargin">
            <div class="ow_right">
                <?php echo smarty_function_submit(array('name'=>'save','class'=>'ow_ic_save'),$_smarty_tpl);?>

            </div>
        </div>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>'MATCHMAKING_PreferencesForm'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php }?>
</div><?php }} ?>