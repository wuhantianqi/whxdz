<?php /* Smarty version Smarty-3.1.8, created on 2017-04-13 18:30:48
         compiled from "1858a7297185dba761ae2f2ab61d2d5537889ab5" */ ?>
<?php /*%%SmartyHeaderCode:2127158ef5358a8def3-48620347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1858a7297185dba761ae2f2ab61d2d5537889ab5' => 
    array (
      0 => '1858a7297185dba761ae2f2ab61d2d5537889ab5',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '2127158ef5358a8def3-48620347',
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
  'unifunc' => 'content_58ef5358a9d8f9_46356673',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ef5358a9d8f9_46356673')) {function content_58ef5358a9d8f9_46356673($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
?>
					<li><a href="<?php echo smarty_function_link(array('ctl'=>'manager:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['manager_id']),$_smarty_tpl);?>
" target="_blank" ><p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['face_pic'];?>
" alt=""></a></li>    
					<?php }} ?>