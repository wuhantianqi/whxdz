<?php /* Smarty version Smarty-3.1.8, created on 2017-04-13 18:30:48
         compiled from "4ccc0b7e0c2d89f8cbc2d8eeea98cc9293567df9" */ ?>
<?php /*%%SmartyHeaderCode:52858ef5358a53563-68434097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ccc0b7e0c2d89f8cbc2d8eeea98cc9293567df9' => 
    array (
      0 => '4ccc0b7e0c2d89f8cbc2d8eeea98cc9293567df9',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '52858ef5358a53563-68434097',
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
  'unifunc' => 'content_58ef5358a62f72_66385882',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ef5358a62f72_66385882')) {function content_58ef5358a62f72_66385882($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
?>
				<li>
					<span>
			            <a href="javascript:;" class="popupform">预约设计</a>
			            <a class="like" href="javascript:;" data-like="<?php echo smarty_function_link(array('ctl'=>'case:like','arg0'=>$_smarty_tpl->tpl_vars['item']->value['case_id']),$_smarty_tpl);?>
">喜欢</a>
			        </span>
					<p><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</p>
					<a href="<?php echo smarty_function_link(array('ctl'=>'case:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['case_id']),$_smarty_tpl);?>
" target="_blank" ><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
" alt="" width="100%" height="100%"></a>
				</li>
				<?php }} ?>