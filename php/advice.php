<?php
  require("config.php");
  $conn=mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD) or die("error connecting");
  mysqli_query($conn,"set names 'utf8'"); //数据库输出编码
  mysqli_select_db($conn,$DB_NAME); //打开数据库
  $result = mysqli_query($conn,"select * from advise");//打开你的表
  $data="";
  $array= array();
  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $array[$row['symptom']] = $row['advice'];
  }
  $data=json_encode($array);
  // echo "{".'"user"'.":".$data."}";
  echo $data;
?>