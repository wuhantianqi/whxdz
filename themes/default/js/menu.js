$(document).ready(function(){
	/* 首页导航切换 */
	var viceh = $('.menu ul li').length-1;   //获取副导航的整体长度
	$('.menu ul li').mouseover(function(){
		if($(this).index() == viceh){
			$('.top-menu').find('div.vice-menu').css('display','block');
		}else{
			$('.top-menu').find('div.vice-menu').css('display','none');
		}
	})
	/*顶部固定导航*/
	$(window).scroll(function() {
		if($(document).scrollTop() >= 35){
			$('.top-menu').addClass('fixed-menu')
		}else{
			$('.top-menu').removeClass('fixed-menu')
		}
	});
	/*首页banner图切换*/
	$('.index-banner').unslider({
		animation: 'fade',
		autoplay: true,
		arrows: false,
		// speed: 0,               
		// delay: 5000, 
		});
	/*首页banner图其它图片3秒后再加载*/
	// var indexImages = ['%THEME%/images/banner-z1.jpg','%THEME%/images/banner-z2.jpg','%THEME%/images/banner-z3.jpg','%THEME%/images/banner-z4.jpg'];

	/* 效果图图片切换 */
	var gheight = 600;                         //固定高度
	var img = document.createElement('img');   //添加img标签
	var gfater = $('.ftoollist ul');           //缩略国父级
	var ximg = $("<img src='/themes/default/images/loading.gif' />").css({
		width : '24px',
		height : '24px',
		display : "block",
		margin : "288px auto",
	});
	$('.focusimg').append(ximg);   //图片为加载完时显示gif动图
	var qimg = $('.ftoollist ul li').eq(0).find('img').data('big');
	loadimg( img, qimg, gheight );
	//设置父级宽度
	gfater.css({
		'width' : gfater.find("li").length*gfater.find("li").eq(0).width(),
		'height' : "65px"
			});
	//左移动
	$(document).on('click','.focustool .btn_pre',function(){
		if( $(this).parent().find('ul').width() > $(this).parent().width()+116 ){
			lrmover( gfater, "-=", 800 );
			// gfater.animate({
			// 	'left' : "-=116px"
			// }, 800);
		}
	})
	//右移动
	$(document).on('click','.focustool .btn_next',function(){
		if( $(this).parent().find('ul').position().left < -116 ){
			lrmover( gfater, "+=", 800 );
			// gfater.animate({
			// 	'left' : "+=116px"
			// }, 800);
		}
	})
	function lrmover( gfater, calculation, speed ){
		gfater.animate({
			'left' : calculation+"116px"
		}, speed);
	}
	$(document).on('mouseover','.ftoollist li',function(){
		$(this).siblings().removeClass("on");
		$(this).addClass("on");
		var bigsrc = $(this).find('img').data('big');
		loadimg( img, bigsrc, gheight )
	});
	function loadimg( img, bigsrc, gheight ){
		var yw;         //原图宽
		var yh;         //原图高
		$('.focusimg').find("img").remove();  //清除初始加载的gif
		img.src = bigsrc;
		img.addEventListener('load',function(){
			yw = this.width+'px';
			yh = this.height+'px';
			if( parseInt(yh) > gheight ){ 
				var xw = Math.ceil ( (gheight*parseInt(yw))/parseInt(yh));
				$('.focusimg').append(this).find("img").css({
					width : xw,
					height : gheight+"px",
					display : "block",
					margin : "0 auto",
					opacity: 0
				}).animate({
					opacity: 1,
				}, 1000); 
			}else{
				$('.focusimg').append(this).find("img").css({
					width : yw,
					height : yh,
					display : "block",
					margin : "0 auto",
					opacity: 0
				}).animate({
					opacity: 1,
				}, 1000); 
			}
		})
	}

	/*统一弹出框*/
	$(document).on('click','.popupform',function(){
		layer.open({
		  type: 2,
		  title: '',
		  shadeClose: true,
		  shade: 0.5,
		  area: ['980px', '370px'],
		  content: 'http://192.168.0.101/index.php?tender-eject.html' //iframe的url
		}); 
	})
	/*首页三重礼弹出框*/
	$(document).on('click','.index-activity ul li p',function(){
		layer.open({
		  type: 2,
		  title: '',
		  shadeClose: true,
		  shade: 0.5,
		  area: ['600px', '270px'],
		  content: 'http://192.168.0.101/index.php?package-yuyue-'+$(this).data("id")+'.html' //iframe的url
		}); 
	})	
	/* 底部表单切换 */
	$(document).on('click','.form-ren div',function(){
		var wheight = $(window).height();
		var bwheight =$('.bottom-form').height();
		var x = parseInt(wheight-bwheight);
		var bheight = $('.bottom-form').position().top;
		if( bheight <= x){
			$('.bottom-form').animate({
				"bottom":'-370px'
			},800)		
		}else{
			$('.bottom-form').animate({
				"bottom":'0px'
			},1000)
		}
		$(this).toggleClass("arrow-rotate-down");
	})
	/*首页直接表单提交*/
	$(document).on('click','.submit-i',function(){
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1}))+\d{8})$/;    //手机正则表达式
		var fater = $(this).parents("form");
		var fname = fater.find("input").eq(0);
		var fphone = fater.find("input").eq(1);
		if( fname.val() == '' || fname.val() == null ){
			layer.alert('姓名不能为空', {
			  title : '',
			  skin: 'layui-layer-molv' //样式类名
			  ,closeBtn: 0
			});
			return;	
		}
		if( fphone.val() == '' || fphone.val() == null ){
			layer.alert('手机号不能为空', {
			  title : '',
			  skin: 'layui-layer-molv' //样式类名
			  ,closeBtn: 0
			});
			return;		
		}else if(!myreg.test(fphone.val())){
			layer.alert('请添写正确的11位手机号码', {
			  title : '',
			  skin: 'layui-layer-molv' //样式类名
			  ,closeBtn: 0
			});	
			return;	
		}	
		var datas = {"data[name]" : fname.val(),
			"data[mobile]": fphone.val()};
		var layers = {skin: 'layui-layer-lan'
			    ,closeBtn: 0
			    ,anim: 0 //动画类型
			};
		submitf( datas,layers, "/index.php?tender-save.html" );
	})
	/*  底部表单提交 */
	$(document).on('click','.form-circular',function(){
		var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1}))+\d{8})$/;    //手机正则表达式
		var fater = $(this).parents("form");
		fater.find('p').remove();
		var fname = fater.find("input").eq(0);
		var fphone = fater.find("input").eq(1);
		if( fname.val() == '' || fname.val() == null ){
			fater.find('ul').append("<p>*姓名不能为空</p>");
			return;	
		}
		if( fphone.val() == '' || fphone.val() == null ){
			fater.find('ul').append("<p>*手机号不能为空</p>");
			return;		
		}else if(!myreg.test(fphone.val())){
			fater.find('ul').append("<p>*请添写正确的11位手机号码</p>");	
			return;	
		}	
		var datas = {"data[name]" : fname.val(),
			"data[mobile]": fphone.val()};
		var layers = {skin: 'layui-layer-lan'
			    ,closeBtn: 0
			    ,anim: 4 //动画类型
			    ,offset: '70%'
			    ,title: ''};
		submitf( datas,layers, "/index.php?tender-save.html" );
	})
	/* 案例展示评论提交 */
	$(document).on( 'click', '.anlisubmit', function(){
		var commentname = $(this).parents('ul').find('input').val();
		var commentconter = $(this).parents('ul').find('textarea').val();
		if( commentname == '' || commentname == null ){
			layer.alert('姓名不能为空', {
			  skin: 'layui-layer-molv' //样式类名
			  ,closeBtn: 0
			});
			return;
		} 
		if( commentconter == '' || commentconter == null ){
			layer.alert('评论内容不能为空', {
			  skin: 'layui-layer-molv' //样式类名
			  ,closeBtn: 0
			});
			return;
		} 
		var datas = {
			"data[nickname]" : commentname,
			"data[content]": commentconter
		};
		var layers = {skin: 'layui-layer-lan'
			    ,closeBtn: 0
			    ,anim: 0 //动画类型
			};
		submitf( datas,layers, $(this).parents('form').find('input[type="hidden"]').val() )
	})
	/* 案例图喜欢 */
	$(document).on( "click", '.like', function(){
		var datas = {};
		var layers = {skin: 'layui-layer-lan'
		    ,closeBtn: 0
		    ,anim: 0 //动画类型
		};
		submitf( datas,layers, $(this).data('like') );
	} )
	/**
	 * 表单提交
	 * @param  array datas    表单提交数据
	 * @param  array layers   弹框数据
	 * @return                返回弹出框
	 */
	function submitf( datas,layers, curl ){
		var request = $.ajax({
		  url: curl,
		  method: "POST",
		  data: datas,
		  dataType: "json"
		});
		request.done(function( msg ) {
			layer.alert(msg.message['0'],layers);
		});
	}
	/*装修流程切换*/
	$('.index-process ul li').mouseover(function(){
		$(this).find("p").stop().animate({
			opacity: "1",
			marginTop: "-342px"
		}, 500);
	}).mouseout(function(){
		$(this).find("p").stop().animate({
			opacity: "0",
			marginTop: "+342px"
		}, 500);
	})
	/* 设计团队切换 */
	$('.index-design ul li').mouseover(function(){
		$(this).find("p").css('display','none');
		$(this).find("dl").stop().animate({
			marginTop: "-341px"
		}, 500);
	}).mouseout(function(){
		$(this).find("dl").stop().animate({
			marginTop: "-0px"
		}, 500, function(){
			$(this).prev().prev().css('display','block');
		});
	})
	/* 首页两处文字滚动 */
	/* 客户信息 */
	var frow = parseInt($("div.index-form-gun ul").height()) - 64;  //获取ul的高度
	$("div.index-form-gun").myScroll({
		speed:50, //数值越大，速度越慢
		rowHeight: frow
	});
	/* 业主心声 */
	var frow = parseInt($("div.index-construction-right-gl ul").height()) - 240;  //获取ul的高度
	$("div.index-construction-right-gl").myScroll({
		speed:90, //数值越大，速度越慢
		rowHeight: frow
	});
	/* 新房装修方案切换 */
	$('.xfzx-switch-right p').eq(1).css("display","none");
	$(document).on('mouseover', '.xfzx-switch-right h2 span',function(index){
		$('.xfzx-switch-right h2 span').css({
			"background-color":"#fff",
			'color': "#000"
		})
		$('.xfzx-switch-right p').css("display","none");
		$(this).css({
			"background-color":"#eb0000",
			'color': "#fff"
		})
		$(this).parent().siblings().eq($(this).index()).css("display","block");
	})



})
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 