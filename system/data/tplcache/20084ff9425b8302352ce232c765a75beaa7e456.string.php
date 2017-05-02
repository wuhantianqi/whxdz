<?php /* Smarty version Smarty-3.1.8, created on 2017-05-02 11:17:43
         compiled from "20084ff9425b8302352ce232c765a75beaa7e456" */ ?>
<?php /*%%SmartyHeaderCode:89725907fa577be573-01912452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '89725907fa577be573-01912452',
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
  'unifunc' => 'content_5907fa577f5087_56592855',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5907fa577f5087_56592855')) {function content_5907fa577f5087_56592855($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
if (!is_callable('smarty_modifier_cutstr')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\modifier.cutstr.php';
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