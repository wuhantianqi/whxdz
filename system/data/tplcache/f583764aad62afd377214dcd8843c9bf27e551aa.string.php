<?php /* Smarty version Smarty-3.1.8, created on 2017-04-13 18:30:48
         compiled from "f583764aad62afd377214dcd8843c9bf27e551aa" */ ?>
<?php /*%%SmartyHeaderCode:2603458ef5358a0d059-63781182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f583764aad62afd377214dcd8843c9bf27e551aa' => 
    array (
      0 => 'f583764aad62afd377214dcd8843c9bf27e551aa',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '2603458ef5358a0d059-63781182',
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
  'unifunc' => 'content_58ef5358a2c463_92393408',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ef5358a2c463_92393408')) {function content_58ef5358a2c463_92393408($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
if (!is_callable('smarty_modifier_cutstr')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\modifier.cutstr.php';
?>
				<li>
					<p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
					<a href="<?php echo smarty_function_link(array('ctl'=>'designer:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['designer_id']),$_smarty_tpl);?>
" target="_blank" ><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['face_pic'];?>
" alt=""></a>
					<dl>
						<dt><a href="<?php echo smarty_function_link(array('ctl'=>'designer:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['designer_id']),$_smarty_tpl);?>
" target="_blank"  ><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></dt>
						<dd><?php echo $_smarty_tpl->tpl_vars['item']->value['cate']['cate_name'];?>
</dd>
						<dd>设计理念：<?php echo smarty_modifier_cutstr($_smarty_tpl->tpl_vars['item']->value['concept'],120);?>
</dd>
						<dd class="popupform">预约设计</dd>
					</dl>
				</li>
				<?php }} ?>