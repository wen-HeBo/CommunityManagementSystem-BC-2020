// 文件装载完成后，调用initPage函数
window.onload = initPage;

function initPage() {
	$(".leftmain a").click(function(){
		var titleAttr = $(this).attr("title");

		if(titleAttr=="user_admin"){
			$(".maincontent").load("user_admin.html");
		}
		else if(titleAttr=="food_admin"){
			$(".maincontent").load("food_admin.html");
		}
		else if(titleAttr=="notice_admin"){
			$(".maincontent").load("notice_admin.html");
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

$('#back .user').html('欢迎 '+uname+'管理员');

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

