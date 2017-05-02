<?php /* Smarty version Smarty-3.1.8, created on 2017-05-02 11:17:43
         compiled from "widget:tenders/bottomform.html" */ ?>
<?php /*%%SmartyHeaderCode:209115907fa579b25f4-32216096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46718206933bcac2e3b780f8fb5ca48970c4cd49' => 
    array (
      0 => 'widget:tenders/bottomform.html',
      1 => 1490930465,
      2 => 'widget',
    ),
  ),
  'nocache_hash' => '209115907fa579b25f4-32216096',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'type' => 0,
    'setting' => 0,
    'detail' => 0,
    'key' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5907fa57a2b788_37277624',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5907fa57a2b788_37277624')) {function content_5907fa57a2b788_37277624($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
?><!-- 底部缩放表单 -->
<div class="bottom-form">
	<div class="dform">
		<div class="form-ren">
			<div>
				<p class="arrow">
					<span><i></i><i></i></span>
					<span><i></i><i></i></span>
				</p>
			</div>
		</div>
		<div class="form-content">
			<form  action="<?php echo smarty_function_link(array('ctl'=>'tender:save','http'=>'empty'),$_smarty_tpl);?>
" method="post" mini-form="tender1">
				<ul>
					<li><input name="data[name]" type="text" placeholder="请输入您的称呼"></li>
					<li><input name="data[mobile]" type="text" placeholder="请输入您的联系方式"></li>
					<li>
						<select name="data[house_type_id]" class="text">
							<option value="0">请选择</option>
                             <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['setting']->value[$_smarty_tpl->tpl_vars['type']->value['house_type']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                 <option <?php if ($_smarty_tpl->tpl_vars['detail']->value['house_type_id']==$_smarty_tpl->tpl_vars['key']->value){?> selected="selected" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                             <?php } ?>
						</select>
					</li>
					<li>
						<select name="data[way_id]" class="text">
							<option value="0">请选择</option>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['setting']->value[$_smarty_tpl->tpl_vars['type']->value['way']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
                                 <option <?php if ($_smarty_tpl->tpl_vars['detail']->value['way_id']==$_smarty_tpl->tpl_vars['key']->value){?> selected="selected" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</option>
                             <?php } ?>
						</select>
					</li>
					<li><input name="data[area]" type="text" placeholder="请输入房屋面积"><i>㎡</i></li>
				</ul>
				<div class="form-circular">立即<br />提交</div>
			</form>
		</div>
	</div>
</div> <?php }} ?>