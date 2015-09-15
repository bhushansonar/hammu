<?php /* Smarty version Smarty-3.1.12, created on 2015-06-23 08:47:57
         compiled from "E:\wamp\www\hammu\ow_system_plugins\base\views\components\paging.html" */ ?>
<?php /*%%SmartyHeaderCode:242365589011d135620-49740409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1b53189e90250cb6d7456c818cc9add93343374' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_system_plugins\\base\\views\\components\\paging.html',
      1 => 1432102814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '242365589011d135620-49740409',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'less' => 0,
    'url' => 0,
    'prefix' => 0,
    'prev' => 0,
    'page' => 0,
    'page_shortcut_count' => 0,
    'start' => 0,
    'p' => 0,
    'count' => 0,
    'more' => 0,
    'next' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5589011d2bc6f7_24199517',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5589011d2bc6f7_24199517')) {function content_5589011d2bc6f7_24199517($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_math')) include 'E:\\wamp\\www\\hammu\\ow_libraries\\smarty3\\plugins\\function.math.php';
?><div class="ow_paging clearfix ow_smallmargin">
    <span><?php echo smarty_function_text(array('key'=>'base+pages_label'),$_smarty_tpl);?>
</span>
    <?php $_smarty_tpl->tpl_vars['p'] = new Smarty_variable('0', null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['less']->value){?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['prefix']->value;?>
page=1"><?php echo smarty_function_text(array('key'=>"base+paging_label_first"),$_smarty_tpl);?>
</a><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['prev']->value){?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['prefix']->value;?>
page=<?php echo smarty_function_math(array('equation'=>'x-1','x'=>$_smarty_tpl->tpl_vars['page']->value),$_smarty_tpl);?>
"><?php echo smarty_function_text(array('key'=>"base+paging_label_prev"),$_smarty_tpl);?>
</a><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['less']->value){?><span>...</span><?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['name'] = "paging";
$_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['page_shortcut_count']->value+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['start'] = (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['step'] = ((int)1) == 0 ? 1 : (int)1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["paging"]['total']);
?>
    	<?php echo smarty_function_math(array('equation'=>"x + y",'x'=>$_smarty_tpl->tpl_vars['start']->value,'y'=>$_smarty_tpl->getVariable('smarty')->value['section']['paging']['index'],'assign'=>'p'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['p']->value<=$_smarty_tpl->tpl_vars['count']->value){?><a <?php if ($_smarty_tpl->tpl_vars['p']->value==$_smarty_tpl->tpl_vars['page']->value){?>class="active"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['prefix']->value;?>
page=<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</a><?php }?>
    <?php endfor; endif; ?>
    <?php if ($_smarty_tpl->tpl_vars['more']->value){?><span>...</span><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['next']->value){?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['prefix']->value;?>
page=<?php echo smarty_function_math(array('equation'=>'x+1','x'=>$_smarty_tpl->tpl_vars['page']->value),$_smarty_tpl);?>
"><?php echo smarty_function_text(array('key'=>'base+paging_label_next'),$_smarty_tpl);?>
</a><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['more']->value){?><a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
&<?php echo $_smarty_tpl->tpl_vars['prefix']->value;?>
page=<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
"><?php echo smarty_function_text(array('key'=>'base+paging_label_last'),$_smarty_tpl);?>
</a><?php }?>
</div><?php }} ?>