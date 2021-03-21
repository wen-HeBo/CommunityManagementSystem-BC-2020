var pageIndex = 1;    //页面索引初始值   
var pageSize = 6;     //每页显示条数初始化，修改显示条数，修改这里即可   
var pageCount = 30;   //总的记录数，随便赋个初值好了，后面会重新赋值的 
$(document).ready(function () {
   $.ajax({
        url: '../php/notice_admin.php',
        async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
        type: 'POST',
        dataType: 'json',
        data: {index: '0', size: pageSize}, // 提交数据
        success: function(data){
             pageCount = data.total;
        },
        error: function() {
            alert("error");
        }
    });
   showRecord(pageIndex);

   layui.use(['laypage','jquery'], function() {
     var laypage = layui.laypage,$ = layui.$;
     laypage.render({
         elem: $("#page")
         //注意，这里的 elem 指向存放分页的容器，值可以是容器ID、DOM对象。
         //例1. elem: 'idName' 注意：如果这么写，这里不能加 # 号
         //例2. elem: document.getElementById('idName')
         //例3. elem: $("#idName")
         ,count: pageCount //数据总数，从服务端得到
         , limit: 6                      //默认每页显示条数
         // , limits: [10, 20, 30]           //可选每页显示条数
         , curr: 1                        //起始页
         , groups: 5                      //连续页码个数
         , prev: '上一页'                 //上一页文本
         , netx: '下一页'                 //下一页文本
         , first: 1                      //首页文本
         , last: 100                     //尾页文本
         , layout: ['prev', 'page', 'next','skip']
         , theme:"#314076"
         //跳转页码时调用
         , jump: function (obj, first) { //obj为当前页的属性和方法，第一次加载first为true
             //非首次加载 do something
             if (!first) {
                 //清空以前加载的数据
                 $('tbody').empty();
                 //调用加载函数加载数据
                 
                 showRecord(obj.curr);
             }
         }
     });
  })

});

function showRecord(pindex){
     $.ajax({
        url: '../php/notice_admin.php',
        async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
        type: 'POST',
        dataType: 'json',
        data: {index:pindex, size:pageSize}, // 提交数据
        success: function(data){
             $.each(data, function(){
                var td = $("<td id='time'></td>").text(this['ADATE'].substring(0,16));
                var td2= $("<td id='head'></td>").text(this['AHEADE']);
                var td3= $("<td></td>").html("<div class='layui-btn-group'><button type='button' class='layui-btn layui-btn-primary layui-btn-sm' id='infomation'><i class='layui-icon'>&#xe60b;</i></button><button type='button' class='layui-btn layui-btn-primary layui-btn-sm' id='agin'><i class='layui-icon'>&#xe642;</i></button><button type='button' class='layui-btn layui-btn-primary layui-btn-sm' id='delete'><i class='layui-icon'>&#xe640;</i></button></div>");
                var tr = $("<tr></tr>").append(td, td2, td3);
                $('tbody').append(tr);
                });

              $("td #infomation").click(function(){
                // 得到该条记录中的“first_name”信息
                var atime = $(this).parent().parent().siblings("#time").text();
                var head = $(this).parent().parent().siblings("#head").text();
                str='';
                $.ajax({
                    url: '../php/notice_select.php',
                    async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
                    type: 'POST',
                    dataType: 'json',
                    data: {atime: atime, head: head}, // 提交数据
                    success: function(data){
                        $.each(data, function(){
                            str+="<div style='margin-left: 30px; height:500px;overflow-y: scroll;'><h2>"+this['AHEADE']+"</h2>";
                            str+=this['ABODY']+"</div>";
                        });
                        $(".maincontent").empty();
                        $(".maincontent").append(str);
                    },
                    error: function() {
                        alert("error");
                    }
                });
            });

            $("td #agin").click(function(){
                var atime = $(this).parent().parent().siblings("#time").text();
                var head = $(this).parent().parent().siblings("#head").text();
                str1='';
                str2='';
                $.ajax({
                    url: '../php/notice_select.php',
                    async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
                    type: 'POST',
                    dataType: 'json',
                    data: {atime: atime, head: head}, // 提交数据
                    success: function(data){
                        $.each(data, function(){
                            str1=this['AHEADE'];
                            str2=this['ABODY'];
                            
                        });
                         
                        $(".maincontent").load("notice.html");
                        $.ajax({
                            url:"notice.html",
                            type:'get',
                            dataType:"html",
                            success:function(result){
                                $("#title").val(str1);
                                $("textarea").html(str2)
                            }
                        });

                        $.ajax({
                            url: '../php/notice_delete.php',
                            async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
                            type: 'POST',
                            dataType: 'json',
                            data: {atime: atime, head: head}, // 提交数据
                            success: function(data){
                            },
                            error: function() {
                                alert("error");
                            }
                        }); 

                    },
                    error: function() {
                        alert("error");
                    }
                });
            });

            $("td #delete").click(function(){
                var atime = $(this).parent().parent().siblings("#time").text();
                var head = $(this).parent().parent().siblings("#head").text();
                $.ajax({
                    url: '../php/notice_delete.php',
                    async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
                    type: 'POST',
                    dataType: 'json',
                    data: {atime: atime, head: head}, // 提交数据
                    success: function(data){
                         alert("删除成功！");
                    },
                    error: function() {
                        alert("error");
                    }
                });
                $(".maincontent").load("notice_admin.html");
            });

        },
        error: function() {
            alert("error");
        }
    });
}

$("#addNotice").click(function(){
  $(".maincontent").load("notice.html");
})