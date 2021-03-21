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
      //console.log(document.cookie);
    return "";
}

//console.log(document.cookie);
var uname = getCookie('name');
console.log(uname);

$(document).ready(function () {
	$.ajax({
        url: '../php/usermain.php',
        async: false,  // 取消异步，因为只有先得到总记录数，才能计算实际需要多少页
        type: 'POST',
        dataType: 'json',
        data:{username:uname},
        success: function(data){
        	str=''
        	str='../images/'+data[0]['PHOTO'];
            //console.log(data[0]["flag"]);
            $('#infoid').val(data[0]['UID']);
            //console.log(data[0]['UID']);
            if(data[0]['NAME']!=null){
                $('#infoname').val(data[0]['NAME']);
            }
            if(data[0]['SEX']!=null){
                if(data[0]['SEX']=='男'){
                    $('#men').attr("checked","checked");
                    if($('#women').is(":checked"))
                        $('#women').removeattr("checked");
                }
                if(data[0]['SEX']=='女'){
                    $('#women').attr("checked","checked");
                    if($('#men').is(":checked"))
                        $('#men').removeattr("checked");
                }
            }
            if(data[0]['TEL']!=null){
                $('#infotel').val(data[0]['TEL']);
            }
            if(data[0]['ADD']!=null){
                $('#infoadd').val(data[0]['ADD']);
            }
            if(data[0]['EMAIL']!=null){
                $('#infoemail').val(data[0]['EMAIL']);
            }

        	img=''
            if(data[0]["flag"]==1){
            	img="<img src="+str+" alt='' class='img-circle' id='phto'>";
		    }
		    else{
		      img="<img src='../images/background.jpg' alt='' class='img-circle' id='phto'>";
		    }
		    $('#img').html(img);
            
            
        },
        error: function() {
            alert("error");
        }
    });
    $("#pad1").hide();
    $("#pad2").hide();
    $("#pad3").hide();
});

$('#changepassword').click(function() {
    $("#pad").hide();   
    $("#pad1").show();
    $("#pad2").show();
    $("#pad3").show();
});
$('#photo').change(function(){
    var canUpload = false; // 该变量用来判断是否符合上传的条件
        var fdata = new FormData();
        $.each($('#photo')[0].files, function(i, file) {
            var fileSize = $(this)[0].size;
            var fileType = $(this)[0].type;
            screenshot = $(this)[0].name; 
            // 如果大小和类型符合要求
            if((fileType=='image/gif' || fileType=='image/jpeg' || fileType=='image/pjpeg' || fileType=='image/png')&& (fileSize>0 && fileSize<2097152)){
                // 为表单添加数据
                fdata.append('upload_file', file);
                canUpload = true;

            }
            else{
                alert("图像必须是 GIF, JPEG, 或者PNG格式, 文件大小不能超过2M!");
            }
        });
        console.log(fdata.get('upload_file'));
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
                    console.log(data.path);
                    img="<img src="+data.path+" alt='' class='img-circle' id='phto'>";
                    $('#img').html(img);
                    // $("#feedback").empty();
                    // // 添加子元素（图片），但需要确保"<"不被转换成"&lt;",确保“>”不被转换成“&gt;” 
                    // $("#feedback").append(data.replace(/&lt;/g,'<').replace(/&gt;/g,'>'));
                }
            });//Ajax结束
        }
    // $.ajax({
    //     url: '../php/userinfo.php',
    //     type: 'POST',
    //     dataType: 'json',
    //     success:function(data){
    //         imgpath=data.path;
    //         console.log(imgpath);
    //     },
    // })
    
})