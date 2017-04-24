<?php /* Smarty version Smarty-3.1.8, created on 2017-04-13 18:30:48
         compiled from "widget:adv/adv_photo.html" */ ?>
<?php /*%%SmartyHeaderCode:3101358ef5358990036-24588691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a1f2b6f3a02f63a398c2ce07c7cd8535949ab05' => 
    array (
      0 => 'widget:adv/adv_photo.html',
      1 => 1487749450,
      2 => 'widget',
    ),
  ),
  'nocache_hash' => '3101358ef5358990036-24588691',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'item' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58ef53589d26c1_83108563',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58ef53589d26c1_83108563')) {function content_58ef53589d26c1_83108563($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
<a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['link'];?>
"<?php if ($_smarty_tpl->tpl_vars['data']->value['style']){?> style="<?php echo $_smarty_tpl->tpl_vars['data']->value['style'];?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['data']->value['class']){?> class="<?php echo $_smarty_tpl->tpl_vars['data']->value['class'];?>
"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"<?php if ($_smarty_tpl->tpl_vars['item']->value['target']){?> target="<?php echo $_smarty_tpl->tpl_vars['item']->value['target'];?>
"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['thumb'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
"<?php if ($_smarty_tpl->tpl_vars['data']->value['width']){?> width="<?php echo $_smarty_tpl->tpl_vars['data']->value['width'];?>
"<?php }elseif($_smarty_tpl->tpl_vars['data']->value['adv']['config']['width']){?> width="<?php echo $_smarty_tpl->tpl_vars['data']->value['adv']['config']['width'];?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['data']->value['height']){?>height="<?php echo $_smarty_tpl->tpl_vars['data']->value['height'];?>
"<?php }elseif($_smarty_tpl->tpl_vars['data']->value['adv']['config']['height']){?> height="<?php echo $_smarty_tpl->tpl_vars['data']->value['adv']['config']['height'];?>
"<?php }?>/></a>
<?php } ?><?php }} ?>