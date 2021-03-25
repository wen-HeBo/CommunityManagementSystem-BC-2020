var pageIndex = 10;    //页面索引初始值   
var pageSize = 10;     //每页显示条数初始化，修改显示条数，修改这里即可   
var pageCount = 30;   //总的记录数，随便赋个初值好了，后面会重新赋值的 
$(document).ready(function () {
	// 得到要显示的总的记录数
	$.ajax({
		url: '../php/notice.php',
		async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
		type: 'POST',
		dataType: 'json',
		data: {index: '0', size: pageSize}, // 提交数据
		success: function(data){
			 
		},
		error: function() {
			alert("error");
		}
	});
	
    InitTable(pageIndex);    //初始化表格数据
});
//翻页调用   
function pageCallback(index, jq) {
    InitTable(index + 1);
}
//请求数据   
function InitTable(pageIndex) {
    $.ajax({
        type: "POST",
        url: "../php/notice.php",
        dataType: "json",
        //提交两个参数：pageIndex(页面索引)，pageSize(显示条数)
        data: {index: pageIndex, size: pageSize},  
        async:false,               
        success: function (data) {
            var head = "";
            var time = "";
            var i = 1;

            // 设置表格内容
            $.each(data, function(){
                head = this['AHEADE'];
                time = this['ADATE'];
                time = time.substring(0,19)
                //console.log(time);
                if (i==6){
                    return false;
                }else{
                    $("#"+i+"Notice").text(head);
                    $("#"+i+"Time").text(time);
                    i = i + 1;
                }
            });
        },
        error: function() {
			alert("error");
		}
    });
}

$(document).ready(function(){
    $("a").click(function(){
        var id = $(this).text();
        $("#myModalLabel").html(id);
        var i = 0;
        var flag = 0; 
        var str = '';
        $.ajax({
            type: "POST",
            url: "../php/notice.php",
            dataType: "json",
            //提交两个参数：pageIndex(页面索引)，pageSize(显示条数)
            data: {index: pageIndex, size: pageSize},            
            success: function (data) {
                result = data;
                $.each(data, function(){
                    i++;
                    if (id=="更多"){
                        flag = 1;
                        str += "<div>";
                        str += "<a id='n'>" + this['AHEADE'] + "</a>";
                        str += "<span id='t'>" + this['ADATE'] + "</span>";
                        str += "</div><hr>";
                    }else if (this['AHEADE'] == id){
                        $("#first_modal").html(this['ABODY']);
                        $(".modal-body").html(this['ABODY']);
                        return false;
                    }
                }); 
                if (flag == 1 && i == data.length){
                    str +='</ul>';
                    $(".modal-body").html(str);
                    $(".modal-body a").click(function(){
                        var titles = $(this).text();
                        $("#myModalLabel").html(titles);
                        $.each(data, function(){
                            if (titles==this['AHEADE']){
                                $("#first_modal").html(this['ABODY']);
                                $(".modal-body").html(this['ABODY']);
                                    return false;
                            }
                        }); 
                    });
                }
            },
            error: function() {
                alert("error");
            },

        });
        
       
    });
});
