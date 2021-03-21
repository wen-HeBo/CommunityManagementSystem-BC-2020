var pageIndex = 1;    //页面索引初始值   
var pageSize = 8;     //每页显示条数初始化，修改显示条数，修改这里即可   
var pageCount = 30;   //总的记录数，随便赋个初值好了，后面会重新赋值的 
$(document).ready(function () {
   $.ajax({
        url: '../php/historyall.php',
        async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
        type: 'POST',
        dataType: 'json',
        data: {index: '0', size: pageSize}, // 提交数据
        success: function(data){
             pageCount = data.total;
             console.log(data.total);
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
         , limit: 8                      //默认每页显示条数
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
        url: '../php/historyall.php',
        async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
        type: 'POST',
        dataType: 'json',
        data: {index:pindex, size:pageSize}, // 提交数据
        success: function(data){
             $.each(data, function(){
                var td = $("<td></td>").text(this['OHDATE'].substring(0,10));
                var td2= $("<td></td>").text(this['FNAME']);
                var td3= $("<td></td>").text(this['PRICE']);
                var tr = $("<tr></tr>").append(td, td2, td3);
                $('tbody').append(tr);
                });
        },
        error: function() {
          
            alert("error");
        }
    });
}

