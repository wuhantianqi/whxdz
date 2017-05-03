<?php /* Smarty version Smarty-3.1.8, created on 2017-05-03 16:41:28
         compiled from "f36ce4c377936c2573db96198f0f62c055dd3c77" */ ?>
<?php /*%%SmartyHeaderCode:437590997b89b3d82-23660584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f36ce4c377936c2573db96198f0f62c055dd3c77' => 
    array (
      0 => 'f36ce4c377936c2573db96198f0f62c055dd3c77',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '437590997b89b3d82-23660584',
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
  'unifunc' => 'content_590997b89c9162_24439171',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_590997b89c9162_24439171')) {function content_590997b89c9162_24439171($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\PHPSTUDY\\phpstudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
?>
				<li>
					<span>
			            <a href="javascript:;" class="popupform">预约设计</a>
			            <a class="like" href="javascript:;" data-like="<?php echo smarty_function_link(array('ctl'=>'case:like','arg0'=>$_smarty_tpl->tpl_vars['item']->value['case_id']),$_smarty_tpl);?>
">喜欢</a>
			        </span>
					<p><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</p>
					<a href="<?php echo smarty_function_link(array('ctl'=>'case:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['case_id']),$_smarty_tpl);?>
" target="_blank" ><img class="lazy" data-original="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
" alt="" width="100%" height="100%"></a>
				</li>
				<?php }} ?>