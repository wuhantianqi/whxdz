<?php /* Smarty version Smarty-3.1.8, created on 2017-05-03 16:41:28
         compiled from "20084ff9425b8302352ce232c765a75beaa7e456" */ ?>
<?php /*%%SmartyHeaderCode:20168590997b896fed9-73255196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20084ff9425b8302352ce232c765a75beaa7e456' => 
    array (
      0 => '20084ff9425b8302352ce232c765a75beaa7e456',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '20168590997b896fed9-73255196',
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
  'unifunc' => 'content_590997b89925e0_37887981',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590997b89925e0_37887981')) {function content_590997b89925e0_37887981($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\PHPSTUDY\\phpstudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
if (!is_callable('smarty_modifier_cutstr')) include 'D:\\PHPSTUDY\\phpstudy\\WWW\\whxdz\\system\\plugins/smarty\\modifier.cutstr.php';
?>
				<li>
					<p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p>
					<a href="<?php echo smarty_function_link(array('ctl'=>'designer:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['designer_id']),$_smarty_tpl);?>
" target="_blank" ><img class="lazy" data-original="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['face_pic'];?>
"  alt=""></a>
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