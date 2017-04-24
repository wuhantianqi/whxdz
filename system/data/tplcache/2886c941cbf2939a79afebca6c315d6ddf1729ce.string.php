<?php /* Smarty version Smarty-3.1.8, created on 2017-04-14 09:33:50
         compiled from "2886c941cbf2939a79afebca6c315d6ddf1729ce" */ ?>
<?php /*%%SmartyHeaderCode:2156958f026fe4d3662-81012261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2886c941cbf2939a79afebca6c315d6ddf1729ce' => 
    array (
      0 => '2886c941cbf2939a79afebca6c315d6ddf1729ce',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '2156958f026fe4d3662-81012261',
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
  'unifunc' => 'content_58f026fe4eebf7_93124412',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f026fe4eebf7_93124412')) {function content_58f026fe4eebf7_93124412($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
if (!is_callable('smarty_modifier_cutstr')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\modifier.cutstr.php';
?>
        <div class="mobile_main_case_img lt">
            <a title="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" href="<?php echo smarty_function_link(array('ctl'=>'case:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['case_id']),$_smarty_tpl);?>
">
                <img width="150" height="120px" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
_thumb.jpg" />
                <div class="opaticy_bg"></div>
                <p><?php echo smarty_modifier_cutstr($_smarty_tpl->tpl_vars['item']->value['title'],24,'..');?>
</p>
            </a>
        </div>
        <?php }} ?>