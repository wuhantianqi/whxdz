(function($){
     $.fn.autoInput = function(param){
         var defaultValue = {
             'url':'index.php?ctl=ajax&act=companySearch',
             'type':'GET',
             'showNum':100,
             'useKey'   :false,
             'id'       : 'id'
         };
         $.extend(defaultValue,param);
         var obj = $(this);

         var cache = null;
         var cacheWord = null;
         var keyword  = '';
         var onNum = null;//null 代表键盘上下键没有起用

         $(this).keyup(function(e){
                switch(e.keyCode){
                    case 13 :
                        $(this).parent().find('.autoInput').remove();
                      break;
                    case 38 :
                    case 40 :
                         var rowNum = $(this).parent().find('.autoInput').find('li').length;
                         if(rowNum > 0){
                             if(onNum == null){
                                 onNum = e.keyCode==38 ? (rowNum -1) : 0;
                             }else if(onNum == 0){
                                 onNum = e.keyCode == 38 ? (rowNum -1) : (onNum + 1);
                             }
                             else if(onNum == (rowNum-1)){
                                 onNum = e.keyCode == 38 ? (onNum -1) : 0;
                             }
                             else{
                                 onNum = e.keyCode==38 ? (onNum -1)  : (onNum + 1);
                             }

                             for(a=0; a<rowNum; a++){
                                 if(a==onNum){
                                     $("#auto_"+a).css({background:"#ff0000"});
                                     $(this).val($("#auto_"+a).html());
                                     if(defaultValue.useKey){
                                         $("#"+defaultValue.id).val($("#auto_"+a).attr('rel'));
                                     }
                                 }else{
                                     $("#auto_"+a).css({background:"none"});
                                 }
                             }
                         }
                         break;
                    default:
                        onNum = null;
                        if(defaultValue.useKey){
                             $("#"+defaultValue.id).val('');
                        }
                        keyword = $(this).val().replace(/^\s+|\s+$/g,"");
                        if(cacheWord!=null && keyword!='' && cacheWord != undefined && keyword.indexOf(cacheWord)==0){//判断缓存的字是否在新的字中

                            if(cache!=null && cache.total<defaultValue.showNum){

                               var  showData = [];
                               for(a in cache.result){
                                   if(cache.result[a].name.indexOf(keyword)>=0){
                                       showData[a] = cache.result[a];
                                   }
                               }
                               $(this)._creatAutoInput(showData,obj,defaultValue);
                            }else{
                                 var urls = defaultValue.url+'&keyword='+encodeURI(keyword)+'&num='+defaultValue.showNum;
                                 $.ajax({type:defaultValue.type,url:urls,dataType:'json',success:function(d){
                                     if(d.ret == 0){    
                                        var showData = d.message.result;
                                        cache = d.message;
                                        $(this)._creatAutoInput(showData,obj,defaultValue);
                                     }
                                 }});
                                 cacheWord = keyword;
                            }
                        }
                        else{
                            if(keyword!=''){
                                 var urls = defaultValue.url+'&keyword='+encodeURI(keyword)+'&num='+defaultValue.showNum;
                                 $.ajax({type:defaultValue.type,url:urls,dataType:'json',success:function(d){
                                     if(d.ret == 0){    
                                        var showData = d.message.result;
                                        cache = d.message;
                                        $(this)._creatAutoInput(showData,obj,defaultValue);
                                     }
                                 }});
                                 cacheWord = keyword;
                            }
                        }
                     break;
             }
         });

         $(this).blur(function(){

            setTimeout("$(this).parent().find('.autoInput').remove()",200);
         });
         return $;
     },
     $.fn._creatAutoInput =function(data,obj,defaultValue){

         if(obj.parent().find('.autoInput').length>0){
             $(".autoInput").find('a').unbind('click').unbind('mouseover').unbind('mouseout');
             $(".autoInput").remove();
         }
         if(data.length>0){
             var str = '';
             var i = 0;
             str +='<div  class="autoInput"><ul>';
             for(a in data){
               str +='<li><a href="#" id="auto_'+i+'"  rel="'+data[a].id+'">'+data[a].name+'</a></li>';
               i++;
             }
             str+='</ul></div>';
             obj.parent().append(str);
             $(".autoInput").find('a').mouseover(function(){
                 $(".autoInput").find('a').each(function(){
                     $(this).css({background:"none"});
                 });
                 $(this).css({background:"#ff0000"});
             });
             $(".autoInput").find('a').mouseout(function(){
                 $(this).css({background:"none"});
             });
             $(".autoInput").find('a').click(function(){
                 obj.val($(this).html());
                 if(defaultValue.useKey){
                     $("#"+defaultValue.id).val($(this).attr('rel'));
                 }
                 $(".autoInput").remove();
             });
         }
         return $;
     };
 })(jQuery)