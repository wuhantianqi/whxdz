// JavaScript Document
function set(name,cursel,n){
	  for(i=1;i<=n;i++){
	  var menu=document.getElementById(name+i);
	  var con=document.getElementById(name+"_"+i);
	  menu.className=i==cursel?"Z_hover":"";
	  con.style.display=i==cursel?"block":"none";
	} 
  }
 function showList(id,num){
	if(num == 1){
		document.getElementById(id).style.display = "block";
	}
	else{
		document.getElementById(id).style.display = "none";
	}
} 
