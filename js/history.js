$(document).ready(function () {    
	console.log("start");
	initFirst();
	menu();
});

function initFirst(){
	function DateMinus(sDate){
		　　var sdate = new Date(sDate.replace(/-/g, "/"));
		　　var now = new Date();
		　　var days = now.getTime() - sdate.getTime();
		　　var day = parseInt(days / (1000 * 60 * 60 * 24));
		　　return day;
		}
	
		function pastDate(){
			var base = new Date().getTime();
			var oneDay = 24 * 3600 * 1000;
			var ssday = [];
			var data = [Math.random() * 300];
			var time = new Date(base);
			ssday.push([time.getFullYear(),time.getMonth()+1,time.getDate()].join('-'));
			for(var i = 1;i < 7;i++){
				var now = new Date(base -= oneDay);
				ssday.push([now.getFullYear(),now.getMonth()+1,now.getDate()].join('-'));
				//ssday.push(Math.round((Math.random() - 0.5) * 20 + data[i - 1]));
			}
			return ssday;
		}
		console.log(pastDate()[1]);
	
		$.ajax({
			url: '../php/history.php',
			async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
			type: 'POST',
			dataType: 'json',
			success: function(data){
				sday = [0,0,0,0,0,0,0]
				$.each(data, function(){
					i=0;
					s=DateMinus(this['OHDATE'].substring(0,10));
					if(s==0){
						$('#t1 h3').html(this['OHDATE'].substring(0,10));
						str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
						$('#t1').append(str);
						sday[i] = 1;
					}
					else if(s==1){
						$('#t2 h3').html(this['OHDATE'].substring(0,10));
						str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
						$('#t2').append(str);
						sday[i] = 1;
					}
					else if(s==2){
						$('#t3 h3').html(this['OHDATE'].substring(0,10));
						str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
						$('#t3').append(str);
						sday[i] = 1;
					}
					else if(s==3){
						$('#t4 h3').html(this['OHDATE'].substring(0,10));
						str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
						$('#t4').append(str);
						sday[i] = 1;
					}
					else if(s==4){
						$('#t5 h3').html(this['OHDATE'].substring(0,10));
						str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
						$('#t5').append(str);
						sday[i] = 1;
					}
					else if(s==5){
						$('#t6 h3').html(this['OHDATE'].substring(0,10));
						str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
						$('#t6').append(str);
						sday[i] = 1;
					}
					else if(s==6){
						$('#t7 h3').html(this['OHDATE'].substring(0,10));
						str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
						$('#t7').append(str);
						sday[i] = 1;
					}
					i++;
				});
				console.log(sday);
				sday.forEach((value,index) => {
					if(value==0){
						switch(index){
							case 0:
								$('#t1 h3').html(pastDate()[index]);
								str="<li>"+"无订单记录"+"</li>";
								$('#t1').append(str);
								break;
							case 1:
								$('#t2 h3').html(pastDate()[index]);
								str="<li>"+"无订单记录"+"</li>";
								$('#t2').append(str);
								break;
							case 2:
								$('#t3 h3').html(pastDate()[index]);
								str="<li>"+"无订单记录"+"</li>";
								$('#t3').append(str);
								break;
							case 3:
								$('#t4 h3').html(pastDate()[index]);
								str="<li>"+"无订单记录"+"</li>";
								$('#t4').append(str);
								break;
							case 4:
								$('#t5 h3').html(pastDate()[index]);
								str="<li>"+"无订单记录"+"</li>";
								$('#t5').append(str);
								break;
							case 5:
								$('#t6 h3').html(pastDate()[index]);
								str="<li>"+"无订单记录"+"</li>";
								$('#t6').append(str);
								break;
							case 6:
								$('#t7 h3').html(pastDate()[index]);
								str="<li>"+"无订单记录"+"</li>";
								$('#t7').append(str);
								break;
								
						}
					}
				});
			},
			error: function() {
				alert("error");
			}
		});
}

function menu(){

	$.ajax({
		type: "POST",
		global:false,
		url: "../php/menu_pic.php",
		dataType: "html",
		//提交两个参数：pageIndex(页面索引)，pageSize(显示条数)
		// data: {index: pageIndex, size: pageSize},  
		data:{}, 
		async:false,
		success: function (data) {
			// 设置表格标题
			$(".addfood").html(data);
			 console.log(data);
		},
		error: function() {
			alert("error");
		}
	});
}

$('#all').click(function(){
	$(".maincontent").load("historyall.html");
});