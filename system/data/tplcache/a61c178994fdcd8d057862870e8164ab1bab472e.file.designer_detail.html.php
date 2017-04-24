<?php /* Smarty version Smarty-3.1.8, created on 2017-04-14 17:31:47
         compiled from "D:\phpStudy\WWW\whxdz\themes\default\designer_detail.html" */ ?>
<?php /*%%SmartyHeaderCode:2590558f09703472f48-35601785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a61c178994fdcd8d057862870e8164ab1bab472e' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\whxdz\\themes\\default\\designer_detail.html',
      1 => 1490920437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2590558f09703472f48-35601785',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'detail' => 0,
    'pager' => 0,
    'attrvalues' => 0,
    'items' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f0970350b4e6_73115927',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f0970350b4e6_73115927')) {function content_58f0970350b4e6_73115927($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
if (!is_callable('smarty_block_calldata')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\block.calldata.php';
if (!is_callable('smarty_function_widget')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.widget.php';
?><?php echo $_smarty_tpl->getSubTemplate ("block/sheader.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("block/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <!--<div class="crumbs">
        <ul class="margin">
            <li>您当前的位置:</li>
            <li><a href="<?php echo smarty_function_link(array('ctl'=>'index'),$_smarty_tpl);?>
" >首页</a></li>
            <li>><a href="<?php echo smarty_function_link(array('ctl'=>'designer'),$_smarty_tpl);?>
">设计师</a></li>
            <li>><?php echo $_smarty_tpl->tpl_vars['detail']->value['name'];?>
</li>
        </ul>
    </div>-->
    <div class="clear"></div>
    <div class="site-banner" style="background:url(/themes/default/images/banner-sj.jpg) no-repeat center;"></div>
    <div class="site-content margin designer-detail">
        <div class="site-content-right">
            <div class="designer-detail-manager">
                <h2>人气设计师榜</h2>
                <ul>
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('calldata', array('mdl'=>'designer/designer','order'=>'hot','limit'=>5)); $_block_repeat=true; echo smarty_block_calldata(array('mdl'=>'designer/designer','order'=>'hot','limit'=>5), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                    <li>
                        <span>
                            <a href="<{link ctl='designer:detail' arg0=$item.designer_id}>" class="title"><p><{$item.name}></p></a>
                            <p>案例: <{$item.case_num}></p>
                            <p>关注<{$item.views}>人</p> 
                        </span>
                        <a href="<{link ctl='designer:detail' arg0=$item.designer_id}>" class="lt">
                            <img src="<{$pager.img}>/<{$item.face_pic}>">
                        </a>
                    </li>
                    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_calldata(array('mdl'=>'designer/designer','order'=>'hot','limit'=>5), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </ul>
            </div>
        </div>
        <div class="site-content-left">
            <div class="designer-detail-top">
            	<img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['detail']->value['face_pic'];?>
" alt="">
                <div class="designer-detail-introduce">
            		<ul>
			    		<li><?php echo $_smarty_tpl->tpl_vars['detail']->value['name'];?>
</li>
			    		<li>头衔：<?php echo $_smarty_tpl->tpl_vars['detail']->value['cate']['cate_name'];?>
 <?php echo smarty_function_widget(array('id'=>"attr/form",'from'=>"zx:designer",'value'=>$_smarty_tpl->tpl_vars['attrvalues']->value,'tpl'=>'case.html'),$_smarty_tpl);?>
</li>
			    		<li>毕业院校：<?php echo $_smarty_tpl->tpl_vars['detail']->value['school'];?>
</li>
			    		<li>设计理念：<?php echo $_smarty_tpl->tpl_vars['detail']->value['concept'];?>
</li>
			    		<li>所擅长风格：<?php echo $_smarty_tpl->tpl_vars['detail']->value['intro'];?>
</li>
			    		<li>已有<?php echo $_smarty_tpl->tpl_vars['detail']->value['views'];?>
人关注<b class="popupform">预约设计</b></li>
			    	</ul>		    	
                </div>
            </div>
            <div class="designer-detail-bottom">
                <h2>最新设计作品<i></i></h2>
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <li>
                        <div class="opacity_img">
                            <a href="<?php echo smarty_function_link(array('ctl'=>'case:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['case_id']),$_smarty_tpl);?>
">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
_thumb.jpg" width="100%" height="100%">
                                <p class="bg"></p>
                                <p class="text"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</p>
                            </a>
                        </div>
                    </li>
                    <?php } ?>
                	<li>
                        <a href="<?php echo smarty_function_link(array('ctl'=>'case:detail','arg0'=>$_smarty_tpl->tpl_vars['item']->value['case_id']),$_smarty_tpl);?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['img'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['photo'];?>
_thumb.jpg">
                        <p><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</p>
                        </a>
                	</li>
                </ul>
            </div>
        </div>
    </div>
<?php echo $_smarty_tpl->getSubTemplate ("block/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>