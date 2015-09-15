<?php /* Smarty version Smarty-3.1.12, created on 2015-05-15 03:34:20
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/components/profile_action_toolbar.html" */ ?>
<?php /*%%SmartyHeaderCode:8326009055555a17caee0f9-24211906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '107cf5cf9f618dde6bed2d695e5ed35aa4bf0190' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/components/profile_action_toolbar.html',
      1 => 1430993611,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8326009055555a17caee0f9-24211906',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'toolbar' => 0,
    'action' => 0,
    'groups' => 0,
    'group' => 0,
    'cmpsMarkup' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5555a17cb53412_09057226',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5555a17cb53412_09057226')) {function content_5555a17cb53412_09057226($_smarty_tpl) {?><div class="ow_profile_gallery_action_toolbar ow_profile_action_toolbar_wrap clearfix ow_stdmargin">
    <ul class="ow_bl ow_profile_action_toolbar clearfix ow_small ow_left">
        <?php  $_smarty_tpl->tpl_vars['action'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['action']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['toolbar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['action']->key => $_smarty_tpl->tpl_vars['action']->value){
$_smarty_tpl->tpl_vars['action']->_loop = true;
?>
            <li>
                <a <?php echo $_smarty_tpl->tpl_vars['action']->value['attrs'];?>
 >
                    <?php echo $_smarty_tpl->tpl_vars['action']->value['label'];?>

                </a>
            </li>
        <?php } ?>
    </ul>

    <?php  $_smarty_tpl->tpl_vars["group"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["group"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["group"]->key => $_smarty_tpl->tpl_vars["group"]->value){
$_smarty_tpl->tpl_vars["group"]->_loop = true;
?>
        <?php echo $_smarty_tpl->tpl_vars['group']->value;?>

    <?php } ?>

    <?php echo $_smarty_tpl->tpl_vars['cmpsMarkup']->value;?>

</div>
<?php }} ?>