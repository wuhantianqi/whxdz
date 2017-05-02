<?php /* Smarty version Smarty-3.1.8, created on 2017-05-02 11:17:43
         compiled from "6abaf40dbf1990695a456d778b7264c76f9e7631" */ ?>
<?php /*%%SmartyHeaderCode:77975907fa578aca35-13446278%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '77975907fa578aca35-13446278',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5907fa578bc430_68311411',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5907fa578bc430_68311411')) {function content_5907fa578bc430_68311411($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_format')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\modifier.format.php';
?>
						<li>
							<p><span><?php echo smarty_modifier_format($_smarty_tpl->tpl_vars['item']->value['dateline'],'Y-m-d');?>
</span><?php echo $_smarty_tpl->tpl_vars['item']->value['nickname'];?>
</p>
							<p><?php echo $_smarty_tpl->tpl_vars['item']->value['content'];?>
</p>
						</li>
						<?php }} ?>