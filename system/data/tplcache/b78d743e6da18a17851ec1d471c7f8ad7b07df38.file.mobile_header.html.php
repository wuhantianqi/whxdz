<?php /* Smarty version Smarty-3.1.8, created on 2017-04-15 11:37:49
         compiled from "D:\phpStudy\WWW\whxdz\themes\default\block\mobile_header.html" */ ?>
<?php /*%%SmartyHeaderCode:2121658f026fe279ce8-96604589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b78d743e6da18a17851ec1d471c7f8ad7b07df38' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\whxdz\\themes\\default\\block\\mobile_header.html',
      1 => 1491982869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2121658f026fe279ce8-96604589',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f026fe2df5f0_88322716',
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f026fe2df5f0_88322716')) {function content_58f026fe2df5f0_88322716($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
        <script type="text/javascript"  src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/script/lib-flexible-master/build/flexible_css.js"></script>
        <script type="text/javascript"  src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/script/lib-flexible-master/build/flexible.js"></script>
        <script type="text/javascript"  src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/script/kt.j.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/css/mobile_master.css?20140514"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <script type="text/javascript"  src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['theme'];?>
/default/js/jquery-3.1.1.js"></script>
        <script type="text/javascript"  src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['theme'];?>
/default/js/layer-v3.0.3/layer.js"></script>
    </head>
    <body><?php }} ?>