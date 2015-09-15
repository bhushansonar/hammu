<?php /* Smarty version Smarty-3.1.12, created on 2015-05-12 10:15:04
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/photo/views/components/sort_control.html" */ ?>
<?php /*%%SmartyHeaderCode:200312912355520ae86d7b60-63246423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b048c7e7da92900924a2bfa13420ee2ba42d1bf8' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/photo/views/components/sort_control.html',
      1 => 1430991245,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200312912355520ae86d7b60-63246423',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'itemList' => 0,
    'item' => 0,
    'key' => 0,
    'initSearchEngine' => 0,
    'tag' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55520ae8760a51_66694332',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55520ae8760a51_66694332')) {function content_55520ae8760a51_66694332($_smarty_tpl) {?><?php if (!is_callable('smarty_function_text')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.text.php';
?>

<div class="ow_box_menu ow_fw_menu">
    <span class="ow_explore_photos_show"><?php echo smarty_function_text(array('key'=>"photo+show_by"),$_smarty_tpl);?>
:</span>
    <div class="ow_fw_btns">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['itemList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['url'];?>
" list-type="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['isActive']){?> class="active"<?php }?>>
                <span><?php echo $_smarty_tpl->tpl_vars['item']->value['label'];?>
</span>
            </a>
        <?php } ?>
    </div>
    <?php if (!empty($_smarty_tpl->tpl_vars['initSearchEngine']->value)){?>
        <div id="photo-list-search" class="ow_right">
            <div class="ow_searchbar clearfix">
                <div class="ow_searchbar_input ow_left">
                    <input id="search-photo" type="text" class="invitation" value="<?php if (!empty($_smarty_tpl->tpl_vars['tag']->value)){?><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
<?php }else{ ?><?php echo smarty_function_text(array('key'=>'photo+search_invitation'),$_smarty_tpl);?>
<?php }?>">
                    <div class="ow_searchbar_ac_wrap">
                        <ul class="ow_searchbar_ac" style="display: none"></ul>
                        <div class="ow_hidden">
                            <li class="hash-prototype browse-photo-search clearfix" style="display: none">
                                <div class="ow_search_result_tag"></div>
                                <span class="ow_searchbar_ac_count ow_right"></span>
                            </li>
                            <li class="user-prototype browse-photo-search clearfix" style="display: none">
                                <div class="ow_search_result_user ow_mini_avatar ow_left">
                                    <div class="ow_avatar">
                                        <img style="max-width: 100%;" alt="" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D">
                                    </div>
                                    <span class="ow_searchbar_username ow_small"></span>
                                </div>
                                <span class="ow_searchbar_ac_count ow_right"></span>
                            </li>
                        </div>
                    </div>
                    <div class="ow_btn_close_search"></div>
                </div>
                <span class="ow_searchbar_btn ow_ic_lens ow_cursor_pointer ow_left"></span>
            </div>
        </div>
    <?php }?>
</div>
<?php }} ?>