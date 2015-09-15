<?php /* Smarty version Smarty-3.1.12, created on 2015-05-12 10:20:04
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/components/change_password.html" */ ?>
<?php /*%%SmartyHeaderCode:191804637155520c1413a850-42442816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7aa8589d64b1090c4f08fa09303fe63abb37b1da' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/components/change_password.html',
      1 => 1430993589,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191804637155520c1413a850-42442816',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55520c141d5e91_56306879',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55520c141d5e91_56306879')) {function content_55520c141d5e91_56306879($_smarty_tpl) {?><?php if (!is_callable('smarty_block_script')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.script.php';
if (!is_callable('smarty_function_text')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.text.php';
if (!is_callable('smarty_function_decorator')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.decorator.php';
if (!is_callable('smarty_block_form')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.form.php';
if (!is_callable('smarty_function_label')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.label.php';
if (!is_callable('smarty_function_input')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.input.php';
if (!is_callable('smarty_function_error')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.error.php';
if (!is_callable('smarty_function_submit')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.submit.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('script', array()); $_block_repeat=true; echo smarty_block_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>



        $(function(){
            $("#change_password_button").click(
                function() { 
                    window.oldPassword.floatBox = new OW_FloatBox({$title: '<?php echo smarty_function_text(array('key'=>'base+change_password'),$_smarty_tpl);?>
', $contents: $('#change-password-div'), width: 480});
                    window.owForms['change-user-password'].resetForm();
                    window.owForms['change-user-password'].removeErrors();
                }
            );
       });


<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php echo smarty_function_decorator(array('name'=>"button",'id'=>"change_password_button",'langLabel'=>'base+change_password'),$_smarty_tpl);?>

<div style="display:none;">
    <div id="change-password-div">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>"change-user-password")); $_block_repeat=true; echo smarty_block_form(array('name'=>"change-user-password"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                <table class="ow_table_1 ow_form">
                    <tr class="ow_alt2 ow_tr_first">
                        <td class="ow_label" style="width:40%;"><?php echo smarty_function_label(array('name'=>'oldPassword'),$_smarty_tpl);?>
</td>
                        <td class="ow_value"><?php echo smarty_function_input(array('name'=>"oldPassword"),$_smarty_tpl);?>
<br/><?php echo smarty_function_error(array('name'=>"oldPassword"),$_smarty_tpl);?>
</td>
                    </tr>
                    <tr class="ow_alt1" width="40">
                        <td class="ow_label" style="width:40%;"><?php echo smarty_function_label(array('name'=>'password'),$_smarty_tpl);?>
</td>
                        <td class="ow_value"><?php echo smarty_function_input(array('name'=>"password"),$_smarty_tpl);?>
<br/><?php echo smarty_function_error(array('name'=>"password"),$_smarty_tpl);?>
</td>
                    </tr>
                    <tr class="ow_alt2 ow_tr_last">
                        <td class="ow_label" style="width:40%;"><?php echo smarty_function_label(array('name'=>'repeatPassword'),$_smarty_tpl);?>
</td>
                        <td class="ow_value"><?php echo smarty_function_input(array('name'=>"repeatPassword"),$_smarty_tpl);?>
<br/><?php echo smarty_function_error(array('name'=>"repeatPassword"),$_smarty_tpl);?>
</td>
                    </tr>

                </table>
                
                <div class="clearfix ow_stdmargin"><div class="ow_right"><?php echo smarty_function_submit(array('name'=>"change"),$_smarty_tpl);?>
</div></div>
         <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>"change-user-password"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
</div>
<?php }} ?>