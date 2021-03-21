<?php 
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','database');
    session_start();//启用session
    header("Content-Type: text/html;charset=utf-8"); //设置编码格式为utf-8
    date_default_timezone_set('PRC'); //调整时区
    if (isset($_POST["fid"])){
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $fid=mysqli_real_escape_string($dbc,trim($_POST['fid']));
       
        mysqli_query($dbc,"set names 'utf8' ");
        $query="DELETE FROM food WHERE FID='$fid'";
        mysqli_query($dbc,$query);
        echo json_encode($fid);
        mysqli_close($dbc);
    }
 ?>