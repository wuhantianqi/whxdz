<?php /* Smarty version Smarty-3.1.8, created on 2017-05-02 13:42:40
         compiled from "6abaf40dbf1990695a456d778b7264c76f9e7631" */ ?>
<?php /*%%SmartyHeaderCode:1417359081c50688555-43343519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '1417359081c50688555-43343519',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_59081c506940d8_25661362',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59081c506940d8_25661362')) {function content_59081c506940d8_25661362($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_format')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\modifier.format.php';
?>
						<li>
							<p><span><?php echo smarty_modifier_format($_smarty_tpl->tpl_vars['item']->value['dateline'],'Y-m-d');?>
</span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</p>
							<p><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
</p>
						</li>
						<?php }} ?>