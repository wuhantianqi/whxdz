<?php /* Smarty version Smarty-3.1.8, created on 2017-04-14 17:31:41
         compiled from "widget:tenders/templateform.html" */ ?>
<?php /*%%SmartyHeaderCode:2286358f096fd392f22-01785242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4864640736adc6909e2cd787eb6b42671654e5f5' => 
    array (
      0 => 'widget:tenders/templateform.html',
      1 => 1490931414,
      2 => 'widget',
    ),
  ),
  'nocache_hash' => '2286358f096fd392f22-01785242',
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
  'unifunc' => 'content_58f096fd427644_23734502',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f096fd427644_23734502')) {function content_58f096fd427644_23734502($_smarty_tpl) {?><style>
	.templateform{
		width: 100%;
		overflow: hidden;
		margin: 0 auto;
		padding: 5px 0;
	}
	.templateform .templateform-form{
		width: 1200px;
		height: 100px;
		margin: 0 auto;
		background-color: #fff;
		position: relative;
		box-shadow: 0px 0px 10px #ccc;
		background-image: url(/themes/default/images/only.png);
	}
	.templateform .templateform-form ul{
		position: absolute;
		top:0px;
		left: 357px;
	}
	.templateform .templateform-form ul li{
		float: left;
	}
	.templateform .templateform-form ul li:first-child{
		width: 157px;
	}
	.templateform .templateform-form ul li:first-child input{
		width: 155px;
	    height: 28px;
	    margin-top: 15px;
	    border: none;
	}
	.templateform .templateform-form ul li:first-child input:last-child{
	    margin-top: 16px;
	}
	.templateform .templateform-form ul li:nth-child(2){
		width: 130px;
	    margin-left: 12px;
	    padding-top: 14px;
	}
	.templateform .templateform-form ul li:nth-child(2) select{
		width: 115px;
	    height: 30px;
	    border: none;
	}
	.templateform .templateform-form ul li:nth-child(2) input{
		width: 82px;
	    height: 28px;
	    margin-top: 15px;
	    border: none;
	    text-indent: 5px;
	}
	.templateform .templateform-form ul li:last-child{
		width: 100px;
    	height: 100px;
    	margin-left: 16px;
    	cursor: pointer;
    	background-image: url(/themes/default/images/only-00.png);
	}
	.templateform .templateform-form ul li:hover:last-child{
		background-image: url(/themes/default/images/only-0.png);
	}
</style>
<div class="templateform">
	<div class="templateform-form">
		<form action="/index.php?tender-save.html" method="post" id="form">
			<ul>
				<li>
					<input type="text" name="data[name]" placeholder="请输入您的称呼">
					<input type="text" name="data[mobile]" placeholder="请输入您的联系方式">						
				</li>
				<li>
					<select name="data[way_id]">
						<option value="0">装修需求</option>
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
					<input type="text" name="data[area]" placeholder="装修面积">
				</li>
				<li class="submit-i"></li>
			</ul>
		</form>
	</div>
</div>
<?php }} ?>