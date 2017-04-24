<?php /* Smarty version Smarty-3.1.8, created on 2017-04-14 17:31:24
         compiled from "D:\phpStudy\WWW\whxdz\themes\default\activity_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:1006458f096ec953cb9-38932294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c65367df44fa6c16dc644f4c885431b031f0e1' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\whxdz\\themes\\default\\activity_detail.html',
      1 => 1490839263,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1006458f096ec953cb9-38932294',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'detail' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f096ec9a9bc4_89587181',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f096ec9a9bc4_89587181')) {function content_58f096ec9a9bc4_89587181($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
?><?php echo $_smarty_tpl->getSubTemplate ("block/sheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("block/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="mainwd">
	<div class="h20"></div>
	<div class="activity_banner">
		<a href="<?php echo smarty_function_link(array('ctl'=>'activity:yuyue','arg0'=>$_smarty_tpl->tpl_vars['detail']->value['activity_id']),$_smarty_tpl);?>
" mini-load="我要参加<?php echo $_smarty_tpl->tpl_vars['detail']->value['title'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['detail']->value['banner'];?>
"></a>
	</div>
	<div class="activity_box" id="nav_info">
		<h2><a href="javascript:;" class="popupform">立即报名 ></a>活动详情</h2>
		<div class="article activity_article"><?php echo $_smarty_tpl->tpl_vars['detail']->value['info'];?>
</div>
	</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("block/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>