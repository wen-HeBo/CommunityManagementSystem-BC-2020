$('#food_select').click(function(){
    console.log(1);
    $(".maincontent").load("food_admin.html");
});
$('#food_add').click(function(){
    console.log(1);
    $(".maincontent").load("food_add.html");
});


$('#photo').change(function(){
    var canUpload = false; // 该变量用来判断是否符合上传的条件
        var fdata = new FormData();
        $.each($('#photo')[0].files, function(i, file) {
            var fileSize = $(this)[0].size;
            var fileType = $(this)[0].type;
            screenshot = $(this)[0].name; 
            // 如果大小和类型符合要求
            if((fileType=='image/gif' || fileType=='image/jpeg' || fileType=='image/pjpeg' || fileType=='image/png')){
                // 为表单添加数据
                fdata.append('upload_file', file);
                canUpload = true;

            }
            else{
                alert("图像必须是 GIF, JPEG, 或者PNG格式, 文件大小不能超过2M!");
            }
        });
        console.log(fdata);
        if(canUpload){  // 如果文件大小和类型都符合要求,则上传文件
            $.ajax({
                url:'../php/uploadimage.php',
                type:'POST',
                data:fdata,
                cache: false,
                contentType: false,    //不可缺
                processData: false,    //不可缺
                dataType: 'json',
                success:function(data){
                    img="<img src="+data.path+" alt='' class='img-thumbnail' style='width: 100%; height: 25vw; margin-bottom: 8px' >";
                    $('#img').html(img);
                    // $("#feedback").empty();
                    // // 添加子元素（图片），但需要确保"<"不被转换成"&lt;",确保“>”不被转换成“&gt;” 
                    // $("#feedback").append(data.replace(/&lt;/g,'<').replace(/&gt;/g,'>'));
                }
            });//Ajax结束
        }
})