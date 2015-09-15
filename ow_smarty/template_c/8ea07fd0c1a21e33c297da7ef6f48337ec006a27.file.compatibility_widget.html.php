<?php /* Smarty version Smarty-3.1.12, created on 2015-06-26 13:07:00
         compiled from "E:\wamp\www\hammu\ow_plugins\matchmaking\views\components\compatibility_widget.html" */ ?>
<?php /*%%SmartyHeaderCode:17194558d3254a93d40-29692421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ea07fd0c1a21e33c297da7ef6f48337ec006a27' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\matchmaking\\views\\components\\compatibility_widget.html',
      1 => 1432099272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17194558d3254a93d40-29692421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'percent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_558d3254ad5f96_59167414',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_558d3254ad5f96_59167414')) {function content_558d3254ad5f96_59167414($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
?><div class="ow_box_empty ow_highbox ow_stdmargin ow_no_cap ow_break_word ow_center">
	<?php echo smarty_function_text(array('key'=>'matchmaking+compatibility_with'),$_smarty_tpl);?>
: <span class="ow_txt_value"><?php echo $_smarty_tpl->tpl_vars['percent']->value;?>
%</span>
</div><?php }} ?>