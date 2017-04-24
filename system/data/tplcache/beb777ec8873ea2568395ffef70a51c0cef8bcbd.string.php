<?php /* Smarty version Smarty-3.1.8, created on 2017-04-13 18:30:48
         compiled from "beb777ec8873ea2568395ffef70a51c0cef8bcbd" */ ?>
<?php /*%%SmartyHeaderCode:2295258ef5358ae7c86-37356069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'beb777ec8873ea2568395ffef70a51c0cef8bcbd' => 
    array (
      0 => 'beb777ec8873ea2568395ffef70a51c0cef8bcbd',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '2295258ef5358ae7c86-37356069',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'item' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58ef5358af7690_66435438',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ef5358af7690_66435438')) {function content_58ef5358af7690_66435438($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
if (!is_callable('smarty_modifier_cutstr')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\modifier.cutstr.php';
?>
				<li>
					<a href="<?php echo smarty_function_link(array('ctl'=>'site:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['site_id']),$_smarty_tpl);?>
" target="_blank" ><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['face_pic'];?>
" alt=""></a>
					<p><b><?php echo $_smarty_tpl->tpl_vars['item']->value['status_title'];?>
</b><?php echo smarty_modifier_cutstr($_smarty_tpl->tpl_vars['item']->value['title'],20);?>
</p>
				</li>
				<?php }} ?>