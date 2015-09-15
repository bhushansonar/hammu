<?php /* Smarty version Smarty-3.1.12, created on 2015-08-11 12:15:42
         compiled from "E:\wamp\www\hammu\ow_plugins\membership\views\controllers\admin_index.html" */ ?>
<?php /*%%SmartyHeaderCode:720955c9cb4e9d1bb2-09284498%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b7bcbee39f450cfe28ededc65e6a53044b9af08' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\membership\\views\\controllers\\admin_index.html',
      1 => 1432099330,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '720955c9cb4e9d1bb2-09284498',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu' => 0,
    'showAccTypes' => 0,
    'accTypesUrl' => 0,
    'memberships' => 0,
    'item' => 0,
    'plan' => 0,
    'users' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55c9cb4ec88615_13542542',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c9cb4ec88615_13542542')) {function content_55c9cb4ec88615_13542542($_smarty_tpl) {?><?php if (!is_callable('smarty_block_script')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.script.php';
if (!is_callable('smarty_block_form')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.form.php';
if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_input')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.input.php';
if (!is_callable('smarty_block_block_decorator')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.block_decorator.php';
if (!is_callable('smarty_function_cycle')) include 'E:\\wamp\\www\\hammu\\ow_libraries\\smarty3\\plugins\\function.cycle.php';
if (!is_callable('smarty_function_error')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.error.php';
if (!is_callable('smarty_function_submit')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.submit.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('script', array()); $_block_repeat=true; echo smarty_block_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


    $('tr.type', '#types' ).hover(
        function(){
            $('td a.edit_type, td a.delete_type', this).show();
        },
        function(){
            $('td a.edit_type, td a.delete_type', this).hide();
        }
    );

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>


<div class="ow_automargin ow_superwide">
    <?php if ($_smarty_tpl->tpl_vars['showAccTypes']->value){?>
    <div class="ow_box_normal ow_automargin ow_no_cap ow_break_word" style="margin-bottom: 16px;">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>'acc-type-select-form')); $_block_repeat=true; echo smarty_block_form(array('name'=>'acc-type-select-form'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <label for="qst_account_type_select"><?php echo smarty_function_text(array('key'=>'membership+for_account_type'),$_smarty_tpl);?>
</label>
        <?php echo smarty_function_input(array('name'=>'accountType'),$_smarty_tpl);?>

        <a style="margin-left: 15px;" class="ow_lbutton" href="<?php echo $_smarty_tpl->tpl_vars['accTypesUrl']->value;?>
"><?php echo smarty_function_text(array('key'=>'admin+questions_edit_account_types_button'),$_smarty_tpl);?>
</a>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>'acc-type-select-form'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['memberships']->value){?>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>'box','addClass'=>"ow_stdmargin",'type'=>'empty','langLabel'=>'membership+types_list','iconClass'=>'ow_ic_update')); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>'box','addClass'=>"ow_stdmargin",'type'=>'empty','langLabel'=>'membership+types_list','iconClass'=>'ow_ic_update'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <form method="post">
        <table id="types" class="ow_table_1 ow_form ow_center">
            <tr class="ow_tr_first">
                <th><?php echo smarty_function_text(array('key'=>'membership+membership'),$_smarty_tpl);?>
</th>
                <th width="1"><?php echo smarty_function_text(array('key'=>'membership+plans'),$_smarty_tpl);?>
</th>
                <th width="1"></th>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['memberships']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['item']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['item']->iteration++;
 $_smarty_tpl->tpl_vars['item']->last = $_smarty_tpl->tpl_vars['item']->iteration === $_smarty_tpl->tpl_vars['item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['ms']['last'] = $_smarty_tpl->tpl_vars['item']->last;
?>
                <tr class="type <?php echo smarty_function_cycle(array('values'=>'ow_alt1, ow_alt2'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['ms']['last']){?> ow_tr_last<?php }?>">
                    <td class="ow_txtleft">
                        <?php echo smarty_function_text(array('key'=>"base+authorization_role_".((string)$_smarty_tpl->tpl_vars['item']->value['name'])),$_smarty_tpl);?>
  
                    </td>
                    <td class="ow_nowrap ow_small ow_txtleft">
                    <ul>
                        <?php if (!empty($_smarty_tpl->tpl_vars['item']->value['plans'])){?>
                            <?php  $_smarty_tpl->tpl_vars['plan'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plan']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['plans']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plan']->key => $_smarty_tpl->tpl_vars['plan']->value){
$_smarty_tpl->tpl_vars['plan']->_loop = true;
?>
                                <li><?php echo $_smarty_tpl->tpl_vars['plan']->value['plan_format'];?>
</li>
                            <?php } ?>
                        <?php }else{ ?>
                            <?php echo smarty_function_text(array('key'=>'membership+no_plans'),$_smarty_tpl);?>

                        <?php }?>
                    </ul>
                    </td>
                    <td style="min-width: 80px; height: 20px">
                        <a class="ow_lbutton edit_type" style="display: none;" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="javascript://">
                            <?php echo smarty_function_text(array('key'=>'admin+btn_label_edit'),$_smarty_tpl);?>

                        </a>
                        <a class="ow_lbutton delete_type" style="display: none;" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" data-count="<?php echo $_smarty_tpl->tpl_vars['users']->value[$_smarty_tpl->tpl_vars['item']->value['id']];?>
" href="javascript://">
                            <?php echo smarty_function_text(array('key'=>'admin+btn_label_delete'),$_smarty_tpl);?>

                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>'box','addClass'=>"ow_stdmargin",'type'=>'empty','langLabel'=>'membership+types_list','iconClass'=>'ow_ic_update'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php }?>
    
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>'box','type'=>'empty','langLabel'=>'membership+add','iconClass'=>'ow_ic_add')); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>'box','type'=>'empty','langLabel'=>'membership+add','iconClass'=>'ow_ic_add'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div class="ow_smallmargin"><?php echo smarty_function_text(array('key'=>'membership+create_membership_plan'),$_smarty_tpl);?>
</div>
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>'add-membership-form')); $_block_repeat=true; echo smarty_block_form(array('name'=>'add-membership-form'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <table class="ow_table_1 ow_form ow_center ow_smallmargin">
        <tr class="ow_tr_first">
            <th width="30%"><?php echo smarty_function_text(array('key'=>'membership+select_auth_role'),$_smarty_tpl);?>
</th>
            <th width="28%"><?php echo smarty_function_text(array('key'=>'membership+period'),$_smarty_tpl);?>
</th>
            <th width="28%"><?php echo smarty_function_text(array('key'=>'membership+price'),$_smarty_tpl);?>
</th>
            <th width="14%"><?php echo smarty_function_text(array('key'=>'membership+recurring'),$_smarty_tpl);?>
</th>
        </tr>
        <tr class="ow_tr_last type ow_alt1">
            <td>
                <div><?php echo smarty_function_input(array('name'=>'role'),$_smarty_tpl);?>
</div>
                <?php echo smarty_function_error(array('name'=>'role'),$_smarty_tpl);?>

            </td>
            <td class="ow_value">
                <div><?php echo smarty_function_input(array('name'=>'period','class'=>'ow_settings_input'),$_smarty_tpl);?>
 <?php echo smarty_function_text(array('key'=>'membership+days'),$_smarty_tpl);?>
</div>
                <?php echo smarty_function_error(array('name'=>'period'),$_smarty_tpl);?>

            </td>
            <td style="min-width: 40px;">
                <div><?php echo smarty_function_input(array('name'=>'price','class'=>'ow_settings_input'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
</div>
                <?php echo smarty_function_error(array('name'=>'price'),$_smarty_tpl);?>

            </td>
            <td>
                <?php echo smarty_function_input(array('name'=>'isRecurring'),$_smarty_tpl);?>

            </td>
        </tr>
    </table>
    <div class="clearfix"><div class="ow_right"><?php echo smarty_function_submit(array('name'=>'save','class'=>'ow_ic_add ow_positive'),$_smarty_tpl);?>
</div></div>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>'add-membership-form'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>'box','type'=>'empty','langLabel'=>'membership+add','iconClass'=>'ow_ic_add'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div><?php }} ?>