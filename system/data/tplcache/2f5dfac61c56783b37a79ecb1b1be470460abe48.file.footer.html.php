<?php /* Smarty version Smarty-3.1.8, created on 2017-05-02 11:17:43
         compiled from "D:\phpStudy\WWW\whxdz\themes\default\block\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:274945907fa57941151-05027925%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f5dfac61c56783b37a79ecb1b1be470460abe48' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\whxdz\\themes\\default\\block\\footer.html',
      1 => 1493693352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '274945907fa57941151-05027925',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pager' => 0,
    'CONFIG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5907fa5799ed68_22514981',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5907fa5799ed68_22514981')) {function content_5907fa5799ed68_22514981($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
if (!is_callable('smarty_function_widget')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.widget.php';
?>	<div class="footer">
		<div class="footer-top">
			<div class="footer-ico-list margin">
				<ul>
					<li>
						<span></span>
						<span><p>好设计</p>优秀设计，实景体验</span>
					</li>
					<li>
						<span></span>
						<span><p>好材料</p>优质材料，工厂化生产</span>
					</li>
					<li>
						<span></span>
						<span><p>好施工</p>标准工艺，工程直控</span>
					</li>
					<li>
						<span></span>
						<span><p>好服务</p>全程监管，全责售后</span>
					</li>
				</ul>
			</div>
		</div>
		<div class="footer-centent margin">
			<ul>
				<li>
					<p class="footer-title">关于我们</p>
					<dl>
						<dd><a href="<?php echo smarty_function_link(array('ctl'=>'about:about'),$_smarty_tpl);?>
">公司简介</a></dd>
						<dd><a href="<?php echo smarty_function_link(array('ctl'=>'about:contact'),$_smarty_tpl);?>
">联系我们</a></dd>
						<dd><a href="<?php echo smarty_function_link(array('ctl'=>'about:jobs'),$_smarty_tpl);?>
">企业直聘</a></dd>
					</dl>
				</li>
				<li>
					<p class="footer-title">走近我们</p>
					<dl>
						<dd><a href="<?php echo smarty_function_link(array('ctl'=>'case'),$_smarty_tpl);?>
">案例欣赏</a></dd>
						<dd><a href="<?php echo smarty_function_link(array('ctl'=>'designer'),$_smarty_tpl);?>
">设计团队</a></dd>
						<dd><a href="<?php echo smarty_function_link(array('ctl'=>'article'),$_smarty_tpl);?>
">装修头条</a></dd>
					</dl>
				</li>
				<li>
					<p class="footer-title">您的需求</p>
					<dl>
						<dd><a href="<?php echo smarty_function_link(array('ctl'=>'xfzx'),$_smarty_tpl);?>
">新房装修</a></dd>
						<dd><a href="<?php echo smarty_function_link(array('ctl'=>'jfzx'),$_smarty_tpl);?>
">旧房改造</a></dd>
						<dd><a href="<?php echo smarty_function_link(array('ctl'=>'#'),$_smarty_tpl);?>
">全案设计</a></dd>
					</dl>
				</li>
				<li>
					<img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['site']['weixin'];?>
" alt="微信扫一扫">
				</li>
				<li>
					<p>客服执线: <b><?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['site']['phone'];?>
</b></p>
					<p>装修咨询: <b><?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['site']['cellphone'];?>
</b></p>
					<p>在线咨询</p>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="footer-bottom">
			<p>武汉市鑫大众装饰设计工程有限公司 版权所有</p>
			<p>Copyright 2012-2112 <?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['site']['title'];?>
 All Rights Reserved <?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['site']['icp'];?>
</p>
<!-- 			<p><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['theme'];?>
/default/images/footer-bz.png" alt="安全标识"></p> -->
		</div>
	</div>
	<?php echo smarty_function_widget(array('id'=>"tenders/bottomform"),$_smarty_tpl);?>

</body>
</html><?php }} ?>