<?php /* Smarty version Smarty-3.1.8, created on 2017-05-03 16:41:28
         compiled from "ea926662162d8fb207008afdb949ee95bb55d59d" */ ?>
<?php /*%%SmartyHeaderCode:29115590997b8a33221-97205649%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea926662162d8fb207008afdb949ee95bb55d59d' => 
    array (
      0 => 'ea926662162d8fb207008afdb949ee95bb55d59d',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '29115590997b8a33221-97205649',
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
  'unifunc' => 'content_590997b8a48d98_60681760',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590997b8a48d98_60681760')) {function content_590997b8a48d98_60681760($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\PHPSTUDY\\phpstudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
if (!is_callable('smarty_modifier_cutstr')) include 'D:\\PHPSTUDY\\phpstudy\\WWW\\whxdz\\system\\plugins/smarty\\modifier.cutstr.php';
?>
				<li>
					<a href="<?php echo smarty_function_link(array('ctl'=>'site:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['site_id']),$_smarty_tpl);?>
" target="_blank" ><img class="lazy" data-original="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['face_pic'];?>
" alt=""></a>
					<p><b><?php echo $_smarty_tpl->tpl_vars['item']->value['status_title'];?>
</b><?php echo smarty_modifier_cutstr($_smarty_tpl->tpl_vars['item']->value['title'],20);?>
</p>
				</li>
				<?php }} ?>