// 文件装载完成后，调用initPage函数
window.onload = initPage;

function initPage() {
	$(".maincontent").load("main.html");
	$(".leftmain a").click(function(){
		var titleAttr = $(this).attr("title");

		if(titleAttr=="userinfo"){
			$(".maincontent").load("userinfo.html");
		}
		else if(titleAttr=="health"){
			$(".maincontent").load("health.html");
		}
		else if(titleAttr=="history"){
			$(".maincontent").load("history.html");
			
		}


	});

}

function getCookie(c_name){
	if (document.cookie.length>0)
	  {
	  c_start=document.cookie.indexOf(c_name + "=")
	  if (c_start!=-1)
	    { 
	    c_start=c_start + c_name.length+1 
	    c_end=document.cookie.indexOf(";",c_start)
	    if (c_end==-1) c_end=document.cookie.length
	    return unescape(document.cookie.substring(c_start,c_end))
	    } 
	  }
	  console.log(document.cookie);
	return "";
}

//console.log(document.cookie);
var uname = getCookie('name');
console.log(uname);

$('#back .user').html('欢迎 '+uname+'用户');

Date.prototype.format = function (fmt) {
    var o = {
        "y+": this.getFullYear, //年
        "M+": this.getMonth() + 1, //月份
        "d+": this.getDate(), //日
        "h+": this.getHours(), //小时
        "m+": this.getMinutes(), //分
        "s+": this.getSeconds() //秒
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}

setInterval("document.getElementById('dateTime').innerHTML = (new Date()).format('yyyy-MM-dd hh:mm:ss');", 1000);



$(document).ready(function photo() {
	$.ajax({
        url: '../php/usermain.php',
        async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
        type: 'POST',
        dataType: 'json',
        data:{username:uname},
        success: function(data){
        	$.each(data, function(){
        		str=''
	        	str=this['PHOTO'];
	        	img='';
	        	//tt=str.replace("\/","/");
	            if(this['flag']==1){
	            	img="<img src="+str+" alt='' class='img-circle' id='pic'>";
	            	console.log(str);
			    }
			    else{
			      img="<img src='../images/background.jpg' alt='' class='img-circle' id='pic'>";
			      // console.log(this["0"],str);
			    }
			    
			    $('#userphoto').html(img);
        	});
        },
        error: function() {
            alert("error");
        }
    });
});


