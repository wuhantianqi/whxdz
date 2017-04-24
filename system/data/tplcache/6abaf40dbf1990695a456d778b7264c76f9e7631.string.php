<?php /* Smarty version Smarty-3.1.8, created on 2017-04-13 18:30:48
         compiled from "6abaf40dbf1990695a456d778b7264c76f9e7631" */ ?>
<?php /*%%SmartyHeaderCode:1870458ef5358abcd02-29758475%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '1870458ef5358abcd02-29758475',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58ef5358ac8881_09014105',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ef5358ac8881_09014105')) {function content_58ef5358ac8881_09014105($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_format')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\modifier.format.php';
?>
						<li>
							<p><span><?php echo smarty_modifier_format($_smarty_tpl->tpl_vars['item']->value['dateline'],'Y-m-d');?>
</span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</p>
							<p><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
</p>
						</li>
						<?php }} ?>