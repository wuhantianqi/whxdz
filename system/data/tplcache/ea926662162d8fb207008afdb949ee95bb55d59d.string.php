<?php /* Smarty version Smarty-3.1.8, created on 2017-05-02 11:17:43
         compiled from "ea926662162d8fb207008afdb949ee95bb55d59d" */ ?>
<?php /*%%SmartyHeaderCode:111475907fa578f2f45-90617406%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '111475907fa578f2f45-90617406',
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
  'unifunc' => 'content_5907fa57925bd4_12061084',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5907fa57925bd4_12061084')) {function content_5907fa57925bd4_12061084($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
if (!is_callable('smarty_modifier_cutstr')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\modifier.cutstr.php';
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