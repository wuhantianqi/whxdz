<?php /* Smarty version Smarty-3.1.8, created on 2017-05-02 10:45:15
         compiled from "admin:common/header.html" */ ?>
<?php /*%%SmartyHeaderCode:30775907f2bb776638-56327687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd70bbd4b43c557b98b5dd24eefe50a5ecc9864ac' => 
    array (
      0 => 'admin:common/header.html',
      1 => 1487749306,
      2 => 'admin',
    ),
  ),
  'nocache_hash' => '30775907f2bb776638-56327687',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'request' => 0,
    'pager' => 0,
    'CONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5907f2bb7b0fc5_12241844',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5907f2bb7b0fc5_12241844')) {function content_5907f2bb7b0fc5_12241844($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['request']->value['MINI']=='load'){?>
<style type="text/css">
.ui-dialog .ui-dialog-content{padding:5px;}
.ui-hack-widget-dialog .page-clew {margin:50px auto; width:500px;}
.ui-hack-widget-dialog .page-clew table{ width:500px;}
.ui-hack-widget-dialog .page-data table.form{margin:0px;border-width:0px;}
.ui-hack-widget-dialog .page-data table.form th{width:120px;}
.ui-hack-widget-dialog div.ui-dialog-content{padding:0px;}
</style>
<?php }elseif($_smarty_tpl->tpl_vars['request']->value['MINI']=='LoadIframe'){?>
<!Doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-CN" />
<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['pager']->value['title'])===null||$tmp==='' ? '江湖家居门户系统管理平台' : $tmp);?>
</title>
<link href="style/style.css"rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/style/kt.widget.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/ui/j.ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/script/kt.j.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/script/kt.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/script/widget.msgbox.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/ui/j.ui.js"></script>
<script type="text/javascript" src="script/kt.admin.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/script/jquery.cate_select.js"></script>
<!--
<script type="text/javascript">
window.jQuery = window.parent.jQuery;
window.$ = window.jQuery;
window.KT = window.parent.KT;
window.Widget = window.parent.Widget;
</script>
-->
<style type="text/css">
html{overflow-x:visible;overflow-y: scroll;overflow:-moz-scrollbars-vertical;}
/* jQuery ui hack nowrap*/
body div.ui-tooltip{border:1px solid #D7D7D7;padding:5px;}
body div.ui-tooltip-content{white-space:normal;}
.ui-tabs .ui-tabs-panel{display:table;border-width:1px;padding:0px;}
.ui-tabs-anchor{outline:none;}
.ui-tabs .ui-tabs-nav li.ui-tabs-active a, .ui-tabs .ui-tabs-nav li.ui-state-disabled a, .ui-tabs .ui-tabs-nav li.ui-tabs-loading a {cursor:default;}
.ui-tooltip{max-width:800px;overflow: hidden;border: 1px solid #D7D7D7;border-radius: 4px;background: #FFF;box-shadow: 0 1px 10px rgba(0,0,0,0.4);}
.page-data{margin:0;}
</style>
</head>
<body>
<iframe id="miniframe" name="miniframe" style="display:none;"></iframe>
<?php }else{ ?>
<!Doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-CN" />
<title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['pager']->value['title'])===null||$tmp==='' ? '江湖家居门户系统管理平台' : $tmp);?>
</title>
<link href="style/style.css"rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/style/kt.widget.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/script/kt.j.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/script/kt.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/script/widget.msgbox.js"></script>
<link href="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/ui/j.ui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/ui/j.ui.js"></script>
<script type="text/javascript" src="script/kt.admin.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/script/jquery.cate_select.js"></script>
<style type="text/css">
/* jQuery ui hack nowrap*/
body div.ui-tooltip{border:1px solid #D7D7D7;padding:5px;}
body div.ui-tooltip-content{white-space:normal;}
.ui-tabs .ui-tabs-panel{display:table;border-width:1px;padding:0px;}
.ui-tabs-anchor{outline:none;}
.ui-tabs .ui-tabs-nav li.ui-tabs-active a, .ui-tabs .ui-tabs-nav li.ui-state-disabled a, .ui-tabs .ui-tabs-nav li.ui-tabs-loading a {cursor:default;}
.ui-tooltip{max-width:800px;overflow: hidden;border: 1px solid #D7D7D7;border-radius: 4px;background: #FFF;box-shadow: 0 1px 10px rgba(0,0,0,0.4);}
</style>
<script type="text/javascript">window.URL={"domain":"<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['site']['domain'];?>
","res":"<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
"};</script>
</head>
<body>
<iframe id="miniframe" name="miniframe" style="display:none;"></iframe>
<?php }?><?php }} ?>