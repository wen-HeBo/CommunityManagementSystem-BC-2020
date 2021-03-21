<?php
header("Content-Type: text/html;charset=utf-8"); //设置编码格式为utf-8
if(isset($_FILES['file']['name']))
{
$filename=$_FILES["file"]["name"];
$name=date('Ymd').'_'.$filename;
if(move_uploaded_file($_FILES["file"]["tmp_name"],"../images/imgUploads/" . $name))
{   
    $path="../images/imgUploads/".$name;
    echo '{"code": 0
    ,"msg": "成功"
    ,"data": {
    "src": "'.$path.'"
    }}';
}
}
// $name='2018';
// $path="imgUploads/".$name.".jpg";
// echo '{"code": 0, "msg":"成功", "data": {"src":'.$path.'}}';
?>