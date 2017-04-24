<?php /* Smarty version Smarty-3.1.8, created on 2017-04-19 11:01:26
         compiled from "D:\phpStudy\WWW\whxdz\themes\default\mobile\xfzx.html" */ ?>
<?php /*%%SmartyHeaderCode:2522158f6d30639f7f2-31931484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f68a75f69bd59c6c89adf704d1c9608fd59d3f42' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\whxdz\\themes\\default\\mobile\\xfzx.html',
      1 => 1491544383,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2522158f6d30639f7f2-31931484',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f6d306410c89_18096509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f6d306410c89_18096509')) {function content_58f6d306410c89_18096509($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
?><?php echo $_smarty_tpl->getSubTemplate ("block/mobile_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--头部开始-->
<div class="content">
    <div class="zh-m-head">
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/img_01.jpg" />
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/img_02.jpg" />
      <div class="num">
          <span class="item1 animated infinite pulse">1</span>
          <span class="item2 animated infinite pulse">0</span>
          <span class="item3 animated infinite pulse">8</span>
      </div>
    </div>
    <div class="zh-m-form" id="zh-m-form">
      <h1>免费获取设计报价方案</h1>
      <p class="zh-m-under-title">您的信息将完全保密，请准确填写</p>
      <form class="tenders" action="<?php echo smarty_function_link(array('ctl'=>'mobile/tenders:save'),$_smarty_tpl);?>
" mini-form="tenders" method="post">
        <input type="hidden" name="data[from]" value="TZB" />
        <input type="text" name="data[contact]"  placeholder="您的姓名" />
        <input type="text" name="data[mobile]"  placeholder="联系方式" />
        <input type="text" name="data[house_mj]"  placeholder="装修面积" />
        <input type="text"  placeholder="请输入小区名称" />
        <input type="submit"  value="立即免费获取 " />
      </form>
<!--      <p>已有<span class="strong">1260</span>人预约设计服务</p> -->
      <p>申请成功后，装修管家会在2小时内向您致电</p>
    </div>
    <div class="zh-m-content">
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-1.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-2.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-3.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-4.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-5.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-6.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-7.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-8.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-9.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-10.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-11.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-12.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-13.png" alt="免费设计与报价"/>
      <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/design-14.png" alt="免费设计与报价"/>
    </div>
    <div class="site-info">
        土巴兔深圳装修网致力于为广大业主提供透明、保障、省心的装修服务！了解深圳装修公司排名，获取深圳装修报价、深圳装修预算就上土巴兔装修网
    </div>
<?php echo $_smarty_tpl->getSubTemplate ("block/mobile_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	<?php }} ?>