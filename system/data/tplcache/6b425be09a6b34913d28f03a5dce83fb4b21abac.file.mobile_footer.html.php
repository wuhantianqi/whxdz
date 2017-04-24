<?php /* Smarty version Smarty-3.1.8, created on 2017-04-18 15:06:22
         compiled from "D:\phpStudy\WWW\whxdz\themes\default\block\mobile_footer.html" */ ?>
<?php /*%%SmartyHeaderCode:1918958f026fe4fa777-54276839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b425be09a6b34913d28f03a5dce83fb4b21abac' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\whxdz\\themes\\default\\block\\mobile_footer.html',
      1 => 1492499103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1918958f026fe4fa777-54276839',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58f026fe525706_61499396',
  'variables' => 
  array (
    'request' => 0,
    'CONFIG' => 0,
    'pager' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58f026fe525706_61499396')) {function content_58f026fe525706_61499396($_smarty_tpl) {?><?php if (!is_callable('smarty_function_link')) include 'D:\\phpStudy\\WWW\\whxdz\\system\\plugins/smarty\\function.link.php';
?><!--底部开始-->
<!-- <div class="mobile_bottom">
    <div class="mobile_bottom_son">
        <ul>
            <li class="li1 <?php if ($_smarty_tpl->tpl_vars['request']->value['ctl']=='mobile/index'){?>on <?php }?>">
                <a href="<?php echo smarty_function_link(array('ctl'=>'index'),$_smarty_tpl);?>
">首页</a>
            </li>
            <li class="li2 <?php if ($_smarty_tpl->tpl_vars['request']->value['ctl']=='mobile/case'){?>on <?php }?>">
                <a href="<?php echo smarty_function_link(array('ctl'=>'case'),$_smarty_tpl);?>
" >图库 </a>
            </li>
            <li class="li3 <?php if ($_smarty_tpl->tpl_vars['request']->value['ctl']=='mobile/site'){?>on <?php }?>">
                <a href="<?php echo smarty_function_link(array('ctl'=>'site'),$_smarty_tpl);?>
" >看工地 </a>
            </li>
            <li class="li4 <?php if ($_smarty_tpl->tpl_vars['request']->value['ctl']=='mobile/my'){?>on <?php }?>">
                <a href="<?php echo smarty_function_link(array('ctl'=>'my'),$_smarty_tpl);?>
" >我的</a>
            </li>
            <li class="li5">
                <a onclick="$('.mobile_show').toggle();" href="javascript:void(0)" >更多</a>
            </li>
        </ul>
    </div>
</div> -->
<!--底部结束-->
<!--隐藏列表开始-->
<!-- <div class="mobile_show none">
    <ul>
        <li>
            <a href="<?php echo smarty_function_link(array('ctl'=>'tuan'),$_smarty_tpl);?>
" class="li1">小区团装</a>
        </li>
        <li>
            <a href="<?php echo smarty_function_link(array('ctl'=>'tender'),$_smarty_tpl);?>
" class="li2">我要装修</a>
        </li>
        <li>
            <a href="<?php echo smarty_function_link(array('ctl'=>'designer'),$_smarty_tpl);?>
" class="li3">设计师</a>
        </li>
        <li>
            <a href="tel:<?php echo $_smarty_tpl->tpl_vars['CONFIG']->value['site']['phone'];?>
" class="li4">装修咨询</a>
        </li>
        <li class="last_li">
            <a href="<?php echo smarty_function_link(array('ctl'=>'activity'),$_smarty_tpl);?>
" class="li5">优惠信息</a>
        </li>
    </ul>
</div>
<script>
    $(document).ready(function() {
        var boxWidth = 300;
        var boxHeight = 400;
        $(".html_contents img").each(function() {
            var imgWidth = $(this).width();
            var imgHeight = $(this).height();
            //比较imgBox的长宽比与img的长宽比大小
            if ((boxWidth / boxHeight) >= (imgWidth / imgHeight))
            {
                //重新设置img的width和height
                $(this).width((boxHeight * imgWidth) / imgHeight);
                $(this).height(boxHeight);
            }
            else
            {
                //重新设置img的width和height
                $(this).width(boxWidth);
                $(this).height((boxWidth * imgHeight) / imgWidth);

            }

        });
    });
</script> -->
<!--隐藏列表结束-->
<!-- <div class="pg-ft">
    <ul>
        <li><a href="tel:4006900288">400-690-0288</a></li>
        <li></li>
        <li><img src="<?php echo $_smarty_tpl->tpl_vars['pager']->value['themepath'];?>
/images/mobile/m-logo.png" alt=""></li>
    </ul>
</div> -->
<div class="site-info">
        鑫大众装饰致力于为广大业主提供透明、保障、省心的装修服务！了解装修量房设计，获取武汉装修报价、就到武汉鑫大众装饰。
</div>
<div class="company-info">手机鑫大众装饰：<a href="//m.whxdz.com">m.whxdz.com</a>&nbsp;鄂ICP备17006956号-1</div>
<script>
    /*弹出框表单提交*/
    $(document).on('click', '.liji', function(){
        layer.open({
          type: 2,
          title: false,
          closeBtn: 1,
          shadeClose: true,
          shade: 0.8,
          area: ['80%', '320px'],
          content: 'http://m.whbej.com/index.php?tender-form.html',
        }); 
    })
    /*普通表单提交*/
    var lock = 0;
    (function(K, $) {
        $("#tender_submit").click(function(){
          if (lock == 0) {    
                lock = 1;
                $.post("/index.php?ctl=tender&act=save",$("#tenders_form").serialize(),function(ret){
                    if(ret.error){
                        lock = 0 ;
                        // layer.alert(ret.message)
                        // layer.alert(""+ret.message)
                        layer.msg(""+ret.message, {
                          icon: 1,
                          time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        }); 
                    }else{
                        layer.msg(""+ret.message, {
                          icon: 1,
                          time: 3000 //2秒关闭（如果不配置，默认是3秒）
                        }); 
                    }
                },'json');
            } 
        });
    })(window.KT, window.jQuery);
</script>
<style>
    .layui-layer-setwin .layui-layer-close2{
        right: -18px;
        top: -18px;
    }
</style>
</body>
</html><?php }} ?>