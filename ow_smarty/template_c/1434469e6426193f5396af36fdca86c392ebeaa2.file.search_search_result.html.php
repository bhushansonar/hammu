<?php /* Smarty version Smarty-3.1.12, created on 2015-07-04 07:02:45
         compiled from "E:\wamp\www\hammu\ow_plugins\usearch\views\controllers\search_search_result.html" */ ?>
<?php /*%%SmartyHeaderCode:18951559768f57c72e8-87824643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1434469e6426193f5396af36fdca86c392ebeaa2' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\usearch\\views\\controllers\\search_search_result.html',
      1 => 1432099688,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18951559768f57c72e8-87824643',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'searchResultMenu' => 0,
    'page' => 0,
    'itemCount' => 0,
    'cmp' => 0,
    'searchUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_559768f581f790_09280907',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_559768f581f790_09280907')) {function content_559768f581f790_09280907($_smarty_tpl) {?><?php if (!is_callable('smarty_function_add_content')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.add_content.php';
if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
?><?php if (isset($_smarty_tpl->tpl_vars['menu']->value)){?><?php echo $_smarty_tpl->tpl_vars['menu']->value;?>
<?php }?>



<?php echo smarty_function_add_content(array('key'=>"base.content.user_list_top",'listType'=>'usearch_search_result'),$_smarty_tpl);?>


<?php if (isset($_smarty_tpl->tpl_vars['searchResultMenu']->value)){?>
    <?php echo $_smarty_tpl->tpl_vars['searchResultMenu']->value;?>

<?php }?>
<?php if ($_smarty_tpl->tpl_vars['page']->value>1){?>
    <div class="ow_fw_menu ow_center usearch_load_earlier_profiles">
        <a href="javascript://"><?php echo smarty_function_text(array('key'=>"usearch+load_earlier_profiles"),$_smarty_tpl);?>
</a>
    </div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['itemCount']->value){?>
    <div class="ow_search_results_photo_gallery_container ow_photo_list_wrap ow_photo_userlist">
        <?php echo $_smarty_tpl->tpl_vars['cmp']->value;?>

    </div>
<?php }else{ ?>
    <div class="ow_nocontent"><?php echo smarty_function_text(array('key'=>"usearch+no_users_found",'searchUrl'=>$_smarty_tpl->tpl_vars['searchUrl']->value),$_smarty_tpl);?>
</div>
<?php }?><?php }} ?>