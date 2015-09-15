<?php /* Smarty version Smarty-3.1.12, created on 2015-08-11 12:16:42
         compiled from "E:\wamp\www\hammu\ow_plugins\membership\views\controllers\admin_settings.html" */ ?>
<?php /*%%SmartyHeaderCode:1440455c9cb8a27a9c1-66220887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57789897387ceba3c9d28d89b8535e6af7274039' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\membership\\views\\controllers\\admin_settings.html',
      1 => 1432099330,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1440455c9cb8a27a9c1-66220887',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55c9cb8a2ffdf2_81607179',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c9cb8a2ffdf2_81607179')) {function content_55c9cb8a2ffdf2_81607179($_smarty_tpl) {?><?php if (!is_callable('smarty_block_block_decorator')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.block_decorator.php';
if (!is_callable('smarty_block_form')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.form.php';
if (!is_callable('smarty_function_label')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.label.php';
if (!is_callable('smarty_function_input')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.input.php';
if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_error')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.error.php';
if (!is_callable('smarty_function_submit')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.submit.php';
?><?php echo $_smarty_tpl->tpl_vars['menu']->value;?>


<div class="ow_automargin ow_superwide">
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>'box','langLabel'=>'membership+notifications','type'=>'empty','addClass'=>'ow_stdmargin ow_break_word','iconClass'=>'ow_ic_mail')); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>'box','langLabel'=>'membership+notifications','type'=>'empty','addClass'=>'ow_stdmargin ow_break_word','iconClass'=>'ow_ic_mail'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>'settings-form')); $_block_repeat=true; echo smarty_block_form(array('name'=>'settings-form'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

            <table class="ow_table_1 ow_form ow_center">
                <tbody>
                <tr class="type ow_alt1">
                    <td style="width:50%;" class="ow_txtleft"><?php echo smarty_function_label(array('name'=>'period'),$_smarty_tpl);?>
</td>
                    <td>
                        <div><?php echo smarty_function_input(array('name'=>'period','class'=>'ow_settings_input'),$_smarty_tpl);?>
 <?php echo smarty_function_text(array('key'=>'membership+days'),$_smarty_tpl);?>
 <?php echo smarty_function_error(array('name'=>'period'),$_smarty_tpl);?>
</div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="clearfix">
                <div class="ow_right"><?php echo smarty_function_submit(array('name'=>'save','class'=>'ow_ic_save'),$_smarty_tpl);?>
</div>
            </div>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>'settings-form'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>'box','langLabel'=>'membership+notifications','type'=>'empty','addClass'=>'ow_stdmargin ow_break_word','iconClass'=>'ow_ic_mail'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div><?php }} ?>