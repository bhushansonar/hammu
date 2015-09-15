<?php /* Smarty version Smarty-3.1.12, created on 2015-05-18 01:12:45
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/admin/views/components/edit_question.html" */ ?>
<?php /*%%SmartyHeaderCode:423749536555974cd7a7309-13521121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '323077388e2c5041ce8a04ceb7909956c913105f' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/admin/views/components/edit_question.html',
      1 => 1430993529,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '423749536555974cd7a7309-13521121',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'questionLabel' => 0,
    'questionDescription' => 0,
    'formData' => 0,
    'formEl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_555974cd897981_70206044',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555974cd897981_70206044')) {function content_555974cd897981_70206044($_smarty_tpl) {?><?php if (!is_callable('smarty_block_form')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.form.php';
if (!is_callable('smarty_function_cycle')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_libraries/smarty3/plugins/function.cycle.php';
if (!is_callable('smarty_function_text')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.text.php';
if (!is_callable('smarty_function_label')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.label.php';
if (!is_callable('smarty_function_input')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.input.php';
if (!is_callable('smarty_function_error')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.error.php';
if (!is_callable('smarty_function_desc')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.desc.php';
if (!is_callable('smarty_function_submit')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.submit.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>'qst_edit_form')); $_block_repeat=true; echo smarty_block_form(array('name'=>'qst_edit_form'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

	<table class="ow_table_1 ow_form ow_admin_edit_profile_question">

         <tr class="<?php echo smarty_function_cycle(array('values'=>'ow_alt2,ow_alt1'),$_smarty_tpl);?>
 tr_qst_name ow_tr_first">
		        <td class="ow_label">
                     <?php echo smarty_function_text(array('key'=>"admin+questions_question_name_label"),$_smarty_tpl);?>

		        </td>
		        <td class="ow_value">
                     <a href="javascript://" class="question_label"><?php echo $_smarty_tpl->tpl_vars['questionLabel']->value;?>
</a>
		        </td>
		        <td class="ow_desc ow_small">
		        </td>
		 </tr>
         <tr class="<?php echo smarty_function_cycle(array('values'=>'ow_alt2,ow_alt1'),$_smarty_tpl);?>
 tr_qst_name">
		        <td class="ow_label">
                    <?php echo smarty_function_text(array('key'=>"admin+questions_edit_question_description_label"),$_smarty_tpl);?>

		        </td>
		        <td class="ow_value">
                    <a href="javascript://"  class="question_description" ><?php echo $_smarty_tpl->tpl_vars['questionDescription']->value;?>
</a>
		        </td>
		        <td class="ow_desc ow_small">
		        </td>
		 </tr>

		<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_smarty_tpl->tpl_vars['formEl'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['formData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['field']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['field']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
 $_smarty_tpl->tpl_vars['formEl']->value = $_smarty_tpl->tpl_vars['field']->key;
 $_smarty_tpl->tpl_vars['field']->iteration++;
 $_smarty_tpl->tpl_vars['field']->last = $_smarty_tpl->tpl_vars['field']->iteration === $_smarty_tpl->tpl_vars['field']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f']['last'] = $_smarty_tpl->tpl_vars['field']->last;
?>
		    <tr class="<?php echo smarty_function_cycle(array('values'=>'ow_alt2,ow_alt1'),$_smarty_tpl);?>
 tr_<?php echo $_smarty_tpl->tpl_vars['formEl']->value;?>
 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['f']['last']){?>ow_tr_last<?php }?>">
		        <td class="ow_label">
		            <?php echo smarty_function_label(array('name'=>$_smarty_tpl->tpl_vars['formEl']->value),$_smarty_tpl);?>

		        </td>
		        <td class="ow_value">
                <?php echo smarty_function_input(array('name'=>$_smarty_tpl->tpl_vars['formEl']->value),$_smarty_tpl);?>

                <br/>
                <?php echo smarty_function_error(array('name'=>$_smarty_tpl->tpl_vars['formEl']->value),$_smarty_tpl);?>

		        </td>
		        <td class="ow_desc ow_small"><?php echo smarty_function_desc(array('name'=>$_smarty_tpl->tpl_vars['formEl']->value),$_smarty_tpl);?>
</td>
		    </tr>
        <?php } ?>
		</table>
    <div class="clearfix ow_stdmargin ow_submit"><div class="ow_right">
    <?php echo smarty_function_submit(array('name'=>'qst_submit'),$_smarty_tpl);?>

    </div></div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>'qst_edit_form'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>