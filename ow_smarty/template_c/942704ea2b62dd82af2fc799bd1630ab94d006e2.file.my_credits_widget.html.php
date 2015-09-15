<?php /* Smarty version Smarty-3.1.12, created on 2015-05-15 03:29:20
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/user_credits/views/components/my_credits_widget.html" */ ?>
<?php /*%%SmartyHeaderCode:7786320325555a050a5c098-91125307%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '942704ea2b62dd82af2fc799bd1630ab94d006e2' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/user_credits/views/components/my_credits_widget.html',
      1 => 1430991345,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7786320325555a050a5c098-91125307',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'balance' => 0,
    'showEarning' => 0,
    'showHistory' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5555a050a88eb8_52761294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5555a050a88eb8_52761294')) {function content_5555a050a88eb8_52761294($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.style.php';
if (!is_callable('smarty_function_text')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.text.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


    .ow_user_credits {
        text-align: center;
    }
    .ow_credits_count {
        font-size: 27px;
        margin: 8px 0;
    }
    .ow_credits_links {
        padding-top: 16px;
    }
    .ow_credits_links a {
        font-size: 11px;
        line-height: 12px;
    }

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<div class="ow_user_credits">
    <?php echo smarty_function_text(array('key'=>'usercredits+credits_balance'),$_smarty_tpl);?>
:
    <h3 class="ow_credits_count"><?php echo $_smarty_tpl->tpl_vars['balance']->value;?>
</h3>
</div>
<div class="ow_left ow_credits_links">
    <?php if ($_smarty_tpl->tpl_vars['showEarning']->value){?><a href="javascript://" id="credits-link-earn"><?php echo smarty_function_text(array('key'=>'usercredits+earn_credits'),$_smarty_tpl);?>
</a><br/><?php }?>
    <?php if ($_smarty_tpl->tpl_vars['showHistory']->value){?><a href="javascript://" id="credits-link-history"><?php echo smarty_function_text(array('key'=>'usercredits+history'),$_smarty_tpl);?>
</a><?php }?>
</div><?php }} ?>