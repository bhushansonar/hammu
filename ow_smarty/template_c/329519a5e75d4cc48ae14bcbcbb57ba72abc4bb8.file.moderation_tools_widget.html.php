<?php /* Smarty version Smarty-3.1.12, created on 2015-05-18 01:41:51
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/components/moderation_tools_widget.html" */ ?>
<?php /*%%SmartyHeaderCode:73210217655597b9fa93394-04799584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '329519a5e75d4cc48ae14bcbcbb57ba72abc4bb8' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_system_plugins/base/views/components/moderation_tools_widget.html',
      1 => 1430993610,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73210217655597b9fa93394-04799584',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'uniqId' => 0,
    'items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55597b9fb0c768_48516542',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55597b9fb0c768_48516542')) {function content_55597b9fb0c768_48516542($_smarty_tpl) {?><?php if (!is_callable('smarty_block_script')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.script.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('script', array()); $_block_repeat=true; echo smarty_block_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


var p = $("#<?php echo $_smarty_tpl->tpl_vars['uniqId']->value;?>
");

p.on("click", "[data-tab]", function() {
    $("[data-tab]", p).removeClass("active");
    $("[data-content]", p).hide();
    var tab = $(this).addClass("active").data("tab");
    $("[data-content=" + tab + "]", p).show();
});

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<div id="<?php echo $_smarty_tpl->tpl_vars['uniqId']->value;?>
">
    <div class="clearfix">
        <div class="ow_box_menu">
            <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value){
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
                <a href="javascript://" <?php if ($_smarty_tpl->tpl_vars['item']->value['active']){?> class="active"<?php }?> data-tab="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                   <span><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>
                </a>
            <?php } ?>
        </div>
    </div>

    <div class="ow_moderation_panel_content">
        <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value){
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
            <div data-content="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" <?php if (!$_smarty_tpl->tpl_vars['item']->value['active']){?> style="display: none;"<?php }?>>
                 <?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>

            </div>
        <?php } ?>
    </div>
</div><?php }} ?>