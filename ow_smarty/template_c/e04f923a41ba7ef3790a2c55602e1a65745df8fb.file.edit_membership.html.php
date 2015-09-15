<?php /* Smarty version Smarty-3.1.12, created on 2015-08-11 12:16:06
         compiled from "E:\wamp\www\hammu\ow_plugins\membership\views\components\edit_membership.html" */ ?>
<?php /*%%SmartyHeaderCode:2642555c9cb66b1de53-51321293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e04f923a41ba7ef3790a2c55602e1a65745df8fb' => 
    array (
      0 => 'E:\\wamp\\www\\hammu\\ow_plugins\\membership\\views\\components\\edit_membership.html',
      1 => 1432099324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2642555c9cb66b1de53-51321293',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'membership' => 0,
    'typeId' => 0,
    'currency' => 0,
    'plans' => 0,
    'plan' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_55c9cb66ca30d7_47330089',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c9cb66ca30d7_47330089')) {function content_55c9cb66ca30d7_47330089($_smarty_tpl) {?><?php if (!is_callable('smarty_block_block_decorator')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\block.block_decorator.php';
if (!is_callable('smarty_function_text')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.text.php';
if (!is_callable('smarty_function_cycle')) include 'E:\\wamp\\www\\hammu\\ow_libraries\\smarty3\\plugins\\function.cycle.php';
if (!is_callable('smarty_function_decorator')) include 'E:\\wamp\\www\\hammu\\ow_smarty\\plugin\\function.decorator.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('block_decorator', array('name'=>'box','type'=>'empty','iconClass'=>'ow_ic_clock','langLabel'=>'membership+plans','addClass'=>"ow_stdmargin")); $_block_repeat=true; echo smarty_block_block_decorator(array('name'=>'box','type'=>'empty','iconClass'=>'ow_ic_clock','langLabel'=>'membership+plans','addClass'=>"ow_stdmargin"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

<div class="ow_smallmargin" style="padding-left: 4px;"><?php echo smarty_function_text(array('key'=>'membership+manage_membership_plans','membership'=>$_smarty_tpl->tpl_vars['membership']->value),$_smarty_tpl);?>
</div>

<form method="post" id="plans-form">
    <input type="hidden" name="form_name" value="edit-plans-form" />
    <input type="hidden" name="type_id" value="<?php echo $_smarty_tpl->tpl_vars['typeId']->value;?>
" />
    <table id="plans" class="ow_table_1 ow_form ow_center ow_smallmargin">
        <tr class="ow_tr_first">
            <th width="1"></th>
            <th><?php echo smarty_function_text(array('key'=>'membership+period'),$_smarty_tpl);?>
, <span class="ow_small"><?php echo smarty_function_text(array('key'=>'membership+days'),$_smarty_tpl);?>
</span></th>
            <th><?php echo smarty_function_text(array('key'=>'membership+price'),$_smarty_tpl);?>
, <span class="ow_small"><?php echo $_smarty_tpl->tpl_vars['currency']->value;?>
</span></th>
            <th width="1"><?php echo smarty_function_text(array('key'=>'membership+recurring'),$_smarty_tpl);?>
</th>
            <?php if (!empty($_smarty_tpl->tpl_vars['plans']->value[0]['productId'])){?><th><?php echo smarty_function_text(array('key'=>'membership+product_id'),$_smarty_tpl);?>
</th><?php }?>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['plans']->value){?>
        <?php  $_smarty_tpl->tpl_vars['plan'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plan']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['plans']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plan']->key => $_smarty_tpl->tpl_vars['plan']->value){
$_smarty_tpl->tpl_vars['plan']->_loop = true;
?>
        <tr class="plan <?php echo smarty_function_cycle(array('values'=>'ow_alt1,ow_alt2'),$_smarty_tpl);?>
">
            <td><input type="checkbox" class="plan_id" name="plans[<?php echo $_smarty_tpl->tpl_vars['plan']->value['dto']->id;?>
]" value="1" data-pid="<?php echo $_smarty_tpl->tpl_vars['plan']->value['dto']->id;?>
" /></td>
            <td><input type="text" class="ow_settings_input" name="periods[<?php echo $_smarty_tpl->tpl_vars['plan']->value['dto']->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['plan']->value['dto']->period;?>
" /></td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['plan']->value['dto']->price!=0){?>
                    <input type="text" class="ow_settings_input" name="prices[<?php echo $_smarty_tpl->tpl_vars['plan']->value['dto']->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['plan']->value['dto']->price;?>
" />
                <?php }else{ ?>
                    <div class="ow_remark"><?php echo smarty_function_text(array('key'=>'membership+trial'),$_smarty_tpl);?>
</div>
                <?php }?>
            </td>
            <td><?php if ($_smarty_tpl->tpl_vars['plan']->value['dto']->price!=0){?><input type="checkbox" name="recurring[<?php echo $_smarty_tpl->tpl_vars['plan']->value['dto']->id;?>
]" value="1" <?php if ($_smarty_tpl->tpl_vars['plan']->value['dto']->recurring){?>checked="checked"<?php }?> /><?php }?></td>
            <?php if (!empty($_smarty_tpl->tpl_vars['plan']->value['productId'])){?><td class="ow_small"><?php echo $_smarty_tpl->tpl_vars['plan']->value['productId'];?>
</td><?php }?>
        </tr>
        <?php } ?>
        <?php }?>
        <tr class="paid-plan-template" style="display: none;">
            <td><input type="checkbox" class="new_plan_id" name="paid_plans[]" value="1" /></td>
            <td><input type="text" class="ow_settings_input" name="paid_periods[]" /></td>
            <td><input type="text" class="ow_settings_input" name="paid_prices[]" /></td>
            <td><input type="checkbox" name="paid_recurring[]" value="1" /></td>
            <?php if (!empty($_smarty_tpl->tpl_vars['plans']->value[0]['productId'])){?><td></td><?php }?>
        </tr>
        <tr class="trial-plan-template" style="display: none;">
            <td><input type="checkbox" class="new_plan_id" name="trial_plans[]" value="1" /></td>
            <td><input type="text" class="ow_settings_input" name="trial_periods[]" /></td>
            <td><div class="ow_remark"><?php echo smarty_function_text(array('key'=>'membership+trial'),$_smarty_tpl);?>
</div></td>
            <td></td>
            <?php if (!empty($_smarty_tpl->tpl_vars['plans']->value[0]['productId'])){?><td></td><?php }?>
        </tr>
        <tr class="ow_tr_last">
            <td>
                <input id="check_all" title="<?php echo smarty_function_text(array('key'=>'base+check_all'),$_smarty_tpl);?>
" type="checkbox" />
            </td>
            <td colspan="<?php if (!empty($_smarty_tpl->tpl_vars['plans']->value[0]['productId'])){?>4<?php }else{ ?>3<?php }?>">
                <div class="ow_txtleft">
                    <?php echo smarty_function_decorator(array('name'=>"button_list_item",'type'=>"button",'langLabel'=>"membership+delete_selected",'buttonName'=>"delete_plans",'id'=>"btn_delete",'class'=>"ow_red"),$_smarty_tpl);?>

                    <?php echo smarty_function_decorator(array('name'=>"button_list_item",'type'=>"button",'langLabel'=>"membership+add_paid_plan",'id'=>"btn_add_plan"),$_smarty_tpl);?>

                    <?php echo smarty_function_decorator(array('name'=>"button_list_item",'type'=>"button",'langLabel'=>"membership+add_trial_plan",'id'=>"btn_add_trial_plan"),$_smarty_tpl);?>

                </div>
            </td>
        </tr>
    </table>
    <div class="clearfix"><div class="ow_right">
        <?php echo smarty_function_decorator(array('name'=>"button",'type'=>"submit",'langLabel'=>"admin+save_btn_label",'buttonName'=>"update_plans"),$_smarty_tpl);?>

    </div></div>
</form>

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_block_decorator(array('name'=>'box','type'=>'empty','iconClass'=>'ow_ic_clock','langLabel'=>'membership+plans','addClass'=>"ow_stdmargin"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>