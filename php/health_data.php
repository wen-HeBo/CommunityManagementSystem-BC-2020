<?php
  require("config.php");
  $conn=mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD) or die("error connecting");
  mysqli_query($conn,"set names 'utf8'"); //数据库输出编码
  mysqli_select_db($conn,$DB_NAME); //打开数据库
  $result = mysqli_query($conn,"select * from health");//打开你的表
  $data="";
  $array= array();
  class Health{
    public $id;
    public $date;
    public $temp;//字段添加处1
    public $tall;
    public $weight;
    public $dbp;
    public $sbp;
    public $rate;
    public $sport;
  }
  while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $user=new Health();
    $user->id = $row['UID'];
    $user->date = $row['HDATE'];
    $user->temp = $row['TRM'];
    $user->tall = $row['TALL'];
    $user->weight = $row['WEIGHT'];
    $user->dbp = $row['DBP'];
    $user->sbp = $row['SBP'];
    $user->rate = $row['RATE'];
    $user->sport = $row['SPORT'];
    $array[]=$user;
  }
  $data=json_encode($array);
  // echo "{".'"user"'.":".$data."}";
  echo $data;
?>