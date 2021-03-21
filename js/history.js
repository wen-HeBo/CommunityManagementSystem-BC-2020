$(document).ready(function () {

	function DateMinus(sDate){
	　　var sdate = new Date(sDate.replace(/-/g, "/"));
	　　var now = new Date();
	　　var days = now.getTime() - sdate.getTime();
	　　var day = parseInt(days / (1000 * 60 * 60 * 24));
	　　return day;
	}

	$.ajax({
        url: '../php/history.php',
        async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
        type: 'POST',
        dataType: 'json',
        success: function(data){
            $.each(data, function(){
            	s=DateMinus(this['OHDATE'].substring(0,10));
            	if(s==0){
					$('#t1 h3').html(this['OHDATE'].substring(0,10));
					str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
					$('#t1').append(str);
            	}
            	else if(s==1){
            		$('#t2 h3').html(this['OHDATE'].substring(0,10));
            		str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
					$('#t2').append(str);
            	}
            	else if(s==2){
            		$('#t3 h3').html(this['OHDATE'].substring(0,10));
            		str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
					$('#t3').append(str);
            	}
            	else if(s==3){
            		$('#t4 h3').html(this['OHDATE'].substring(0,10));
            		str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
					$('#t4').append(str);
            	}
            	else if(s==4){
            		$('#t5 h3').html(this['OHDATE'].substring(0,10));
            		str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
					$('#t5').append(str);
            	}
            	else if(s==5){
            		$('#t6 h3').html(this['OHDATE'].substring(0,10));
            		str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
					$('#t6').append(str);
            	}
            	else if(s==6){
            		$('#t7 h3').html(this['OHDATE'].substring(0,10));
            		str="<li>"+this['FNAME']+"&emsp;￥"+this['PRICE']+"</li>"
					$('#t7').append(str);
            	}

            	
            });
        },
        error: function() {
            alert("error");
        }
    });

    

});

$('#all').click(function(){
	$(".maincontent").load("historyall.html");
});