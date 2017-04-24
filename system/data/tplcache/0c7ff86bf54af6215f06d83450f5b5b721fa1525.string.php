<?php /* Smarty version Smarty-3.1.8, created on 2017-04-14 17:31:47
         compiled from "0c7ff86bf54af6215f06d83450f5b5b721fa1525" */ ?>
<?php /*%%SmartyHeaderCode:2978658f0970358c389-07208692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c7ff86bf54af6215f06d83450f5b5b721fa1525' => 
    array (
      0 => '0c7ff86bf54af6215f06d83450f5b5b721fa1525',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '2978658f0970358c389-07208692',
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
  'unifunc' => 'content_58f097035a3a82_26701523',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f097035a3a82_26701523')) {function content_58f097035a3a82_26701523($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
?>
                    <li>
                        <span>
                            <a href="<?php echo smarty_function_link(array('ctl'=>'designer:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['designer_id']),$_smarty_tpl);?>
" class="title"><p><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</p></a>
                            <p>案例: <?php echo $_smarty_tpl->tpl_vars['item']->value['case_num'];?>
</p>
                            <p>关注<?php echo $_smarty_tpl->tpl_vars['item']->value['views'];?>
人</p> 
                        </span>
                        <a href="<?php echo smarty_function_link(array('ctl'=>'designer:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['designer_id']),$_smarty_tpl);?>
" class="lt">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['face_pic'];?>
">
                        </a>
                    </li>
                    <?php }} ?>