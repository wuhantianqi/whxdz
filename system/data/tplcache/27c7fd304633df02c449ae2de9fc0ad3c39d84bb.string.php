<?php /* Smarty version Smarty-3.1.8, created on 2017-05-02 13:42:40
         compiled from "27c7fd304633df02c449ae2de9fc0ad3c39d84bb" */ ?>
<?php /*%%SmartyHeaderCode:240159081c5061af35-27271218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27c7fd304633df02c449ae2de9fc0ad3c39d84bb' => 
    array (
      0 => '27c7fd304633df02c449ae2de9fc0ad3c39d84bb',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '240159081c5061af35-27271218',
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
  'unifunc' => 'content_59081c5062a936_68171139',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59081c5062a936_68171139')) {function content_59081c5062a936_68171139($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
?>
					<li><a href="<?php echo smarty_function_link(array('ctl'=>'manager:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['manager_id']),$_smarty_tpl);?>
" target="_blank" ><p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p><img class="lazy" data-original="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['face_pic'];?>
" alt=""></a></li>    
					<?php }} ?>