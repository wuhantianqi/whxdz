$(function() {
    $.fn.manhuatoTop = function(options) {
        var defaults = {
            showHeight: 150,

            speed: 1000
        };
        var options = $.extend(defaults, options);
        $("body").prepend('<div class="backtop none"> </div>');
        
        var myleft = 1000 + ($(this).width() - 1000) / 2;   
        var $toTop = $(this);
        options.top = $(this).height() - 100;
        $(".backtop").css('left', myleft + 'px');
        $(window).resize(function(){
            $(".backtop").css('left', (1000 + ($("body").width() - 1000) / 2) + 'px');
        });
        
        $toTop.scroll(function() {
            var scrolltop = $(this).scrollTop();
            if (scrolltop >= options.showHeight) {
                $(".backtop").show().css('top',options.top + scrolltop + 'px');
            }
            else {
                $(".backtop").hide();
            }
        });

        $(".backtop").click(function() {
            $("html,body").animate({scrollTop: 0}, options.speed);
        });
    }
});



/**
NAME:图片半透明显示  
Date:2013-08-29 14:07:27
param:
	sel				string			图片选择器
	opaValue		string			图片半透明值
return:NULL
method:
	imgOpacity("#shop img","0.618");
NOTICE:图片外面的div容器的背景必须要有黑色/白色
**/
function imgOpacity(sel,opaValue){
	if(!opaValue){opaValue='0.618';}
	$(sel).mouseover(function(){
		$(this).css({'opacity':opaValue,'cursor':'pointer'});
	}).mouseout(function(){
		$(this).css({'opacity':'1'});	
	});
}