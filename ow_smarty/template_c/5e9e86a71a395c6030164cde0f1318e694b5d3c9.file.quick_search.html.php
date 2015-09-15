<?php /* Smarty version Smarty-3.1.12, created on 2015-05-15 03:29:20
         compiled from "/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/usearch/views/components/quick_search.html" */ ?>
<?php /*%%SmartyHeaderCode:20075395165555a050917528-45495666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e9e86a71a395c6030164cde0f1318e694b5d3c9' => 
    array (
      0 => '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_plugins/usearch/views/components/quick_search.html',
      1 => 1430991311,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20075395165555a050917528-45495666',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'questionList' => 0,
    'question' => 0,
    'form' => 0,
    '_owForms_' => 0,
    'advancedUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5555a0509d6fc1_77531977',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5555a0509d6fc1_77531977')) {function content_5555a0509d6fc1_77531977($_smarty_tpl) {?><?php if (!is_callable('smarty_block_style')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.style.php';
if (!is_callable('smarty_block_form')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/block.form.php';
if (!is_callable('smarty_function_label')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.label.php';
if (!is_callable('smarty_function_input')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.input.php';
if (!is_callable('smarty_function_text')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.text.php';
if (!is_callable('smarty_function_error')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.error.php';
if (!is_callable('smarty_function_submit')) include '/homepages/11/d222791150/htdocs/Hammulandingpage/hammu/ow_smarty/plugin/function.submit.php';
?><?php $_smarty_tpl->smarty->_tag_stack[] = array('style', array()); $_block_repeat=true; echo smarty_block_style(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>



    .ow_qs_header { 
        padding-bottom: 20px; 
    }

    .ow_qs_field { 
        padding-bottom: 15px; 
    }

    .ow_qs_label { 
        padding: 0 10px 0 10px; 
    }

    .ow_qs_field input[type="text"] {
        max-width: 70%;
    }

    .ow_qs_field input.ow_googlelocation_search_location
    {
        max-width:100%;
    }

   .ow_qs_field .ow_qs_miles {
        width: 50px;
        text-align: center;
    }

     .ow_qs_field .ow_qs_locationstr { 
        width: 150px; 
    }

    form .ow_googlelocation_search_distance { 
        text-align: center; 
    }

    .ow_qs_btn .ow_qs_label {
        padding: 6px 10px 0px;
        display: inline-block;
    }

<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_style(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>


<div class="ow_qs">
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('form', array('name'=>'QuickSearchForm')); $_block_repeat=true; echo smarty_block_form(array('name'=>'QuickSearchForm'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>


    <?php  $_smarty_tpl->tpl_vars['question'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['question']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['questionList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['question']->key => $_smarty_tpl->tpl_vars['question']->value){
$_smarty_tpl->tpl_vars['question']->_loop = true;
?>

        <?php if ($_smarty_tpl->tpl_vars['question']->value->name=='match_sex'){?>
            <?php if (!empty($_smarty_tpl->tpl_vars['form']->value->displayAccountType)){?>
                <div class="ow_qs_field">
                    <span class="ow_qs_label"><?php echo smarty_function_label(array('name'=>$_smarty_tpl->tpl_vars['question']->value->name),$_smarty_tpl);?>
</span>
                    <span class="ow_qs_value"><?php echo smarty_function_input(array('name'=>$_smarty_tpl->tpl_vars['question']->value->name),$_smarty_tpl);?>
</span>
                </div>
            <?php }?>
        <?php }elseif($_smarty_tpl->tpl_vars['question']->value->name=='sex'){?>
            <?php if (!empty($_smarty_tpl->tpl_vars['form']->value->displayAccountType)){?>
                <div class="ow_qs_field">
                    <span class="ow_qs_label"><?php echo smarty_function_label(array('name'=>$_smarty_tpl->tpl_vars['question']->value->name),$_smarty_tpl);?>
</span>
                    <span class="ow_qs_value"><?php echo smarty_function_input(array('name'=>$_smarty_tpl->tpl_vars['question']->value->name),$_smarty_tpl);?>
</span>
                </div>
            <?php }?>
        <?php }elseif($_smarty_tpl->tpl_vars['question']->value->name=='birthdate'){?>
             <div class="ow_qs_field">
                <span class="ow_qs_label"><label><?php echo smarty_function_text(array('key'=>'usearch+age'),$_smarty_tpl);?>
</label></span>
                <span class="ow_qs_value"><?php echo smarty_function_input(array('name'=>'birthdate'),$_smarty_tpl);?>
</span>
                <div><?php echo smarty_function_error(array('name'=>'birthdate'),$_smarty_tpl);?>
</div>
            </div>
        <?php }elseif($_smarty_tpl->tpl_vars['question']->value->name=='googlemap_location'){?>
            <div class="ow_qs_field">
                <?php echo smarty_function_input(array('name'=>'googlemap_location'),$_smarty_tpl);?>

                <?php echo smarty_function_error(array('name'=>'googlemap_location'),$_smarty_tpl);?>

            </div>
        <?php }else{ ?>
            <div class="ow_qs_field">
                <span class="ow_qs_label"><?php echo smarty_function_label(array('name'=>$_smarty_tpl->tpl_vars['question']->value->name),$_smarty_tpl);?>
</span>
                <span class="ow_qs_value"><?php echo smarty_function_input(array('name'=>$_smarty_tpl->tpl_vars['question']->value->name),$_smarty_tpl);?>
</span>
            </div>
        <?php }?>

    <?php } ?>

     <?php if ($_smarty_tpl->tpl_vars['_owForms_']->value['QuickSearchForm']->getElement('online')){?>
        <div class="ow_qs_field" style="width:50%; float:left;">
            <span class="ow_qs_value"><?php echo smarty_function_input(array('name'=>'online'),$_smarty_tpl);?>
</span>
            <span class="ow_qs_label"><?php echo smarty_function_label(array('name'=>'online'),$_smarty_tpl);?>
</span>
        </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->tpl_vars['_owForms_']->value['QuickSearchForm']->getElement('with_photo')){?>
        <div class="ow_qs_field" style="width:50%; float:left;">
            <span class="ow_qs_value"><?php echo smarty_function_input(array('name'=>'with_photo'),$_smarty_tpl);?>
</span>
            <span class="ow_qs_label"><?php echo smarty_function_label(array('name'=>'with_photo'),$_smarty_tpl);?>
</span>
        </div>
    <?php }?>

    <div class="clearfix ow_stdmargin ow_qs_btn">
        <?php echo smarty_function_submit(array('name'=>'search'),$_smarty_tpl);?>


        <span class="ow_qs_label">
            <a href="<?php echo $_smarty_tpl->tpl_vars['advancedUrl']->value;?>
" class="ow_nowrap"><?php echo smarty_function_text(array('key'=>'usearch+advanced_search'),$_smarty_tpl);?>
</a>
        </span>
    </div>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_form(array('name'=>'QuickSearchForm'), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div><?php }} ?>