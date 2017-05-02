<?php /* Smarty version Smarty-3.1.8, created on 2017-05-02 11:17:43
         compiled from "27c7fd304633df02c449ae2de9fc0ad3c39d84bb" */ ?>
<?php /*%%SmartyHeaderCode:266685907fa578720a1-00711076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '266685907fa578720a1-00711076',
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
  'unifunc' => 'content_5907fa57885921_00540504',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5907fa57885921_00540504')) {function content_5907fa57885921_00540504($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
?>
					<li><a href="<?php echo smarty_function_link(array('ctl'=>'manager:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['manager_id']),$_smarty_tpl);?>
" target="_blank" ><p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p><img class="lazy" data-original="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['face_pic'];?>
" alt=""></a></li>    
					<?php }} ?>