<?php /* Smarty version Smarty-3.1.8, created on 2017-04-14 17:31:47
         compiled from "widget:attr/case.html" */ ?>
<?php /*%%SmartyHeaderCode:1423858f097035c2e99-87629121%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fcaf317e1df97fba3c65e5f0d84afadde5d85adc' => 
    array (
      0 => 'widget:attr/case.html',
      1 => 1487749454,
      2 => 'widget',
    ),
  ),
  'nocache_hash' => '1423858f097035c2e99-87629121',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'attr' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f097035e2296_70232517',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f097035e2296_70232517')) {function content_58f097035e2296_70232517($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['attr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['attrs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['attr']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['attr']->key => $_smarty_tpl->tpl_vars['attr']->value){
$_smarty_tpl->tpl_vars['attr']->_loop = true;
 $_smarty_tpl->tpl_vars['attr']->index++;
?>
<?php if ($_smarty_tpl->tpl_vars['attr']->index<3){?>
<span><font class="ico case_ico<?php echo $_smarty_tpl->tpl_vars['attr']->index+4;?>
"></font><?php echo $_smarty_tpl->tpl_vars['attr']->value['title'];?>
:
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['attr']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<?php if (in_array($_smarty_tpl->tpl_vars['v']->value['attr_value_id'],$_smarty_tpl->tpl_vars['data']->value['value'])){?><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
<?php }?>
<?php } ?>
</span>
<?php }?>
<?php } ?>
<?php }} ?>