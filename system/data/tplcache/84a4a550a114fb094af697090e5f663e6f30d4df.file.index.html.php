<?php /* Smarty version Smarty-3.1.8, created on 2017-04-19 11:01:23
         compiled from "D:\phpStudy\WWW\whxdz\themes\default\mobile\index.html" */ ?>
<?php /*%%SmartyHeaderCode:681258f026fe125f15-28193589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84a4a550a114fb094af697090e5f663e6f30d4df' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\whxdz\\themes\\default\\mobile\\index.html',
      1 => 1492570875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '681258f026fe125f15-28193589',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f026fe23b4d7_85846892',
  'variables' => 
  array (
    'pager' => 0,
    'CONFIG' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f026fe23b4d7_85846892')) {function content_58f026fe23b4d7_85846892($_smarty_tpl) {?><?php if (!is_callable('smarty_block_AD')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\block.AD.php';
if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
if (!is_callable('smarty_block_calldata')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\block.calldata.php';
?><?php echo $_smarty_tpl->getSubTemplate ("block/mobile_header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--头部开始-->
<div class="mobile_top">
    <p><a href="tel:13971172755">13971172755</a></p><a class="logo" href="/">
    <!-- <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/m-logo.png"/> -->
    </a>
</div>
<div class="cl50"></div>
<div class="mobile_banner">
    <div class="banner">
        <div class="inner">
            <?php $_smarty_tpl->smarty->_tag_stack[] = array('AD', array('name'=>"手机版首页广告位",'limit'=>"5")); $_block_repeat=true; echo smarty_block_AD(array('name'=>"手机版首页广告位",'limit'=>"5"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<a href="<{$item.link}>"><img src="<{$pager.img}>/<{$item.thumb}>"/></a><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_AD(array('name'=>"手机版首页广告位",'limit'=>"5"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </div>
    </div>
    <div class="pointer" id="pointer">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('AD', array('name'=>"手机版首页广告位",'limit'=>"5")); $_block_repeat=true; echo smarty_block_AD(array('name'=>"手机版首页广告位",'limit'=>"5"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
  <span class="color"></span><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_AD(array('name'=>"手机版首页广告位",'limit'=>"5"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['res'];?>
/script/flipsnap.min.js"></script>
<script type="text/javascript">
    var dimg = $('.inner').find('img').eq(0).width();
    var dleng = $('.inner').find('img').length;
    var innerwher =  dimg * dleng;
    $('.inner').css('width',innerwher+'px');
    var $pointer = $('.pointer span');
    $('.inner').find('img').css('width',dimg);
    $('.inner').find('a').css('width',dimg);
    var flipsnap = Flipsnap('.inner', {distance: dimg});
    flipsnap.element.addEventListener('fsmoveend', function() {
        $pointer.filter('.color').removeClass('color');
        $pointer.eq(flipsnap.currentPoint).addClass('color');
    }, false);
    //banner自动切换
    var t1 = window.setInterval(dsetInterval,3000);
    var setnumber = 1;
    function dsetInterval(){
        if( setnumber > 0 && setnumber < dleng ){
            flipsnap.toNext();
            setnumber ++;
        }else{
            flipsnap.toPrev();
            setnumber --;
        }  
    }
    //移入/移出停止/启动定时器
    document.addEventListener('touchstart',touch, false);
    document.addEventListener('touchend',touch, false); 
    function touch(event){
        switch(event.type){
            case "touchstart": 
                window.clearInterval(t1);
                break;
            case "touchend":
                t1 = window.setInterval(dsetInterval,3000);
        }
    }  
</script>
<!--头部结束-->

<div class="mobile_main">
    <!--首页列表选项开始-->
    <div class="mobile_main_list">
        <ul>
		    <li>
                <a href="<?php echo smarty_function_link(array('ctl'=>'xfzx'),$_smarty_tpl);?>
">
                    <p></p>
                    <p>新房装修</p>
                </a>
            </li>
			<li>
                <a href="<?php echo smarty_function_link(array('ctl'=>'jfzx'),$_smarty_tpl);?>
">
                    <p></p>
                    <p>旧房装修</p>
                </a>
            </li>
            <li>
                <a href="<?php echo smarty_function_link(array('ctl'=>'hxsj'),$_smarty_tpl);?>
">
                    <p></p>
                    <p>全屋设计</p>
                </a>
            </li>
           
            
            <li>
                <a href="<?php echo smarty_function_link(array('ctl'=>'my'),$_smarty_tpl);?>
">
                    <p></p>
                    <p>我的装修</p>
                </a>
            </li>
            <!-- <li>
                <p><a href="<?php echo smarty_function_link(array('ctl'=>'site'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/icon5.png" /></a></p>
                <p><a href="<?php echo smarty_function_link(array('ctl'=>'site'),$_smarty_tpl);?>
">看工地</a></p>
            </li>
            <li>
                <p><a href="tel:<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['site']['phone'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/icon6.png" /></a></p>
                <p><a href="tel:<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['site']['phone'];?>
">装修咨询</a></p>
            </li>
            <li>
                <p><a href="<?php echo smarty_function_link(array('ctl'=>'designer'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/icon7.png" /></a></p>
                <p><a href="<?php echo smarty_function_link(array('ctl'=>'designer'),$_smarty_tpl);?>
">设计师</a></p>
            </li>
            <li>
                <p><a href="<?php echo smarty_function_link(array('ctl'=>'activity'),$_smarty_tpl);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/icon8.png" /></a></p>
                <p><a href="<?php echo smarty_function_link(array('ctl'=>'activity'),$_smarty_tpl);?>
">优惠活动</a></p>
            </li> -->
        </ul>
    </div>
    <!--首页列表选项结束-->
    <!-- 表格列表start -->
    <section>
        <ul class="tablelist">
            <li><a href="<?php echo smarty_function_link(array('ctl'=>'designer'),$_smarty_tpl);?>
"><i class="rj"></i><span>设计团队</span></a></li>
            <li><a href="<?php echo smarty_function_link(array('ctl'=>'case'),$_smarty_tpl);?>
"><i class="fs"></i><span>案例美图</span></a></li>
            <li><a href="<?php echo smarty_function_link(array('ctl'=>'site'),$_smarty_tpl);?>
"><i class="xz"></i><span>在建工地</span></a></li>
            <li><a href="<?php echo smarty_function_link(array('ctl'=>'activity'),$_smarty_tpl);?>
"><i class="xw"></i><span>优惠活动</span></a></li>
            <li><a href="<?php echo smarty_function_link(array('ctl'=>'zxlc'),$_smarty_tpl);?>
"><i class="dk"></i><span>装修流程</span></a></li>
            <li><a href="<?php echo smarty_function_link(array('ctl'=>'threezx'),$_smarty_tpl);?>
"><i class="mb"></i><span>快学装修</span></a></li>
        </ul>
    </section>
    <!-- 抢免费设计名额开始 -->
    <div class="free-design" id="free-design">
        <header>
            <h1>抢免费设计名额</h1>
            <!-- <span class="free-design-tip">全国仅限<span class="free-design-tip-color">3000</span>名</span> -->
        </header>
        <div class="free-design-body">
            <div class="free-design-count">
                今日还剩
                <span class="num">
                    <div class="free-design-img"><span class="item1 animated infinite pulse">1</span></div>
                    <div class="free-design-img"><span class="item2 animated infinite pulse">3</span></div>
                   <div class="free-design-img"><span class="item3 animated infinite pulse">4</span></div>
                </span>
                免费名额
            </div>
            <form id='tenders_form' class="mfsj-from">
               <input class="row mfsj-name mfsj-from-fixed" name="data[name]" type="text" placeholder="您的称呼">
               <input class="row mfsj-tel mfsj-from-fixed" id="phone" name="data[mobile]" type="tel" placeholder="手机号码">
               <div class="mfsj-form-arrow">
                    <input class="row mfsj-area" id="area" readonly="true" name="data[addr]" placeholder="小区地址">
               </div>
               <div class="zxd-form-agree mfsj-form-agree">
                   <img class="checkbox" src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/quren.png" alt="">
                   我已阅读并接受<a href="" target="_blank">《装修常见问题条款》</a>
               </div>
               <div id='tender_submit' class="row mfsj-submit">立即申请</div>
           </form>
           <div class="free-design-gift">
                <div class="free-design-gift-wrap">
                   <div class="free-design-gift-box">
                       0元即可享受市场价12000元设计服务
                   </div>
                   <div class="free-design-gift-box">
                       专业设计师免费帮您设计3D全景图
                   </div>
                   <div class="free-design-gift-circle">
                       壕礼
                   </div>
                </div>
           </div>
        </div>
    </div>
    <!-- 抢免费设计名额结束 -->
    <!-- 设计师列表start -->
    <section>
    <ul class="index-designer">
        <li><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/mzsj-p1.png" alt=""></li>
        <li><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/mzsj-p1.png" alt=""></li>
        <li><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/mzsj-p1.png" alt=""></li>
        <li><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/mzsj-p1.png" alt=""></li>
    </ul>
    </section>
    <!-- 设计师列表end -->
    <!--首页经典案例开始-->
    <div class="mobile_main_case">
        <p class="title">实景案例<a href="<?php echo smarty_function_link(array('ctl'=>'case'),$_smarty_tpl);?>
"><b>更多></b></a></p>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('calldata', array('mdl'=>'case/case','limit'=>4)); $_block_repeat=true; echo smarty_block_calldata(array('mdl'=>'case/case','limit'=>4), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

        <div class="mobile_main_case_img lt">
            <a title="<{$item.title}>" href="<{link ctl='case:detail' arg0=$item.case_id}>">
                <img width="150" height="120px" src="<{$pager.img}>/<{$item.photo}>_thumb.jpg" />
                <div class="opaticy_bg"></div>
                <p><{$item.title|cutstr:24:'..'}></p>
            </a>
        </div>
        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_calldata(array('mdl'=>'case/case','limit'=>4), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
<!--     <ul class="mobile_main_wen">
        <li>背景墙</li>
        <li>吧台</li>
        <li>背景墙</li>
        <li>吧台</li>
        <li>背景墙</li>
        <li>吧台</li>
        <li>背景墙</li>
        <li>吧台</li>
    </ul> -->
    <!--首页经典案例结束-->
    <!-- 装修经验start -->
    <!-- <ul class="mobile_experience">
        <h2>装修经验<b>更多></b></h2>
        <li><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/m-logo.png" alt=""></li>
        <li><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/m-logo.png" alt=""></li>
        <li><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/m-logo.png" alt=""></li>
        <li><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/m-logo.png" alt=""></li>
    </ul> -->
    <!-- 装修经验end -->
    <!-- 文章列表start -->
    <!-- <div class="mobile-rticle">
        <ul>
            <li>
                <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/m-logo.png" alt="">
                <span>
                    <p>深圳板式家具厂家有哪些</p>
                    <p>随着人们生活条件好转、审美眼光的提高，在购买家具的时候不再是够用、能用就好，而是会讲究造型、材质等等，为自己买到合心意的家具产品。板式家具是目前人们喜欢的一种家具类型，各地家具厂家也大量生产板式家具，...</p>
                </span> 
            </li>
            <li>
                <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/m-logo.png" alt="">
                <span>
                    <p>深圳板式家具厂家有哪些</p>
                    <p>随着人们生活条件好转、审美眼光的提高，在购买家具的时候不再是够用、能用就好，而是会讲究造型、材质等等，为自己买到合心意的家具产品。板式家具是目前人们喜欢的一种家具类型，各地家具厂家也大量生产板式家具，...</p>
                </span> 
            </li>
            <li>
                <img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/m-logo.png" alt="">
                <span>
                    <p>深圳板式家具厂家有哪些</p>
                    <p>随着人们生活条件好转、审美眼光的提高，在购买家具的时候不再是够用、能用就好，而是会讲究造型、材质等等，为自己买到合心意的家具产品。板式家具是目前人们喜欢的一种家具类型，各地家具厂家也大量生产板式家具，...</p>
                </span> 
            </li>
        </ul>
    </div> -->
    <!-- 文章列表end -->
</div> 
<?php echo $_smarty_tpl->getSubTemplate ("block/mobile_footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>