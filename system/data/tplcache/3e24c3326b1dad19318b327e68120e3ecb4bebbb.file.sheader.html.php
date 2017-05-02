<?php /* Smarty version Smarty-3.1.8, created on 2017-05-02 11:17:43
         compiled from "D:\phpStudy\WWW\whxdz\themes\default\block\sheader.html" */ ?>
<?php /*%%SmartyHeaderCode:228165907fa57689bb8-63399203%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e24c3326b1dad19318b327e68120e3ecb4bebbb' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\whxdz\\themes\\default\\block\\sheader.html',
      1 => 1493693352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '228165907fa57689bb8-63399203',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'seo_sub_title' => 0,
    'seo_title' => 0,
    'SEO' => 0,
    'CONFIG' => 0,
    'seo_keywords' => 0,
    'seo_description' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5907fa576d7dc2_06075708',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5907fa576d7dc2_06075708')) {function content_5907fa576d7dc2_06075708($_smarty_tpl) {?><!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $_smarty_tpl->tpl_vars['seo_sub_title']->value;?>
<?php if ($_smarty_tpl->tpl_vars['seo_title']->value){?><?php echo $_smarty_tpl->tpl_vars['seo_title']->value;?>
<?php }elseif($_smarty_tpl->tpl_vars['SEO']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['SEO']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['site']['title'];?>
<?php }?></title>
        <meta name="keywords" content="<?php if ($_smarty_tpl->tpl_vars['seo_keywords']->value){?><?php echo $_smarty_tpl->tpl_vars['seo_keywords']->value;?>
<?php }elseif($_smarty_tpl->tpl_vars['SEO']->value['keywords']){?><?php echo $_smarty_tpl->tpl_vars['SEO']->value['keywords'];?>
<?php }?>" />
        <meta name="description" content="<?php if ($_smarty_tpl->tpl_vars['seo_description']->value){?><?php echo $_smarty_tpl->tpl_vars['seo_description']->value;?>
<?php }elseif($_smarty_tpl->tpl_vars['SEO']->value['description']){?><?php echo $_smarty_tpl->tpl_vars['SEO']->value['description'];?>
<?php }?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['pager']->value['theme'];?>
/default/css/public.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['pager']->value['theme'];?>
/default/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['pager']->value['theme'];?>
/default/css/menu.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['pager']->value['theme'];?>
/default/css/form.css">
        <script type="text/javascript"  src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['theme'];?>
/default/js/jquery-3.1.1.js"></script>
        <script type="text/javascript"  src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['theme'];?>
/default/js/menu.js"></script>
        <script type="text/javascript"  src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['theme'];?>
/default/js/scroll.js"></script>
        <script type="text/javascript"  src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['theme'];?>
/default/js/unslider.js"></script>
        <script type="text/javascript"  src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['theme'];?>
/default/js/layer-v3.0.3/layer.js"></script>  
    </head>
    <body><?php }} ?>