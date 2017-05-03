<?php /* Smarty version Smarty-3.1.8, created on 2017-05-03 16:41:28
         compiled from "6abaf40dbf1990695a456d778b7264c76f9e7631" */ ?>
<?php /*%%SmartyHeaderCode:14127590997b8a0bd37-80400334%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6abaf40dbf1990695a456d778b7264c76f9e7631' => 
    array (
      0 => '6abaf40dbf1990695a456d778b7264c76f9e7631',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '14127590997b8a0bd37-80400334',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_590997b8a18ab0_17003824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590997b8a18ab0_17003824')) {function content_590997b8a18ab0_17003824($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_format')) include 'D:\\PHPSTUDY\\phpstudy\\WWW\\whxdz\\system\\plugins/smarty\\modifier.format.php';
?>
						<li>
							<p><span><?php echo smarty_modifier_format($_smarty_tpl->tpl_vars['item']->value['dateline'],'Y-m-d');?>
</span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</p>
							<p><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
</p>
						</li>
						<?php }} ?>