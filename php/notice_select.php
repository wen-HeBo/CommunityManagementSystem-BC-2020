<?php 
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','database');
    session_start();//启用session
    header("Content-Type: text/html;charset=utf-8"); //设置编码格式为utf-8
    date_default_timezone_set('PRC'); //调整时区
    if (isset($_POST["atime"])&&isset($_POST["head"])){
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $atime=mysqli_real_escape_string($dbc,trim($_POST['atime']));//密码
        $head=mysqli_real_escape_string($dbc,trim($_POST['head']));
       
        mysqli_query($dbc,"set names 'utf8' ");
        $query="SELECT * FROM annou WHERE DATE_FORMAT(ADATE,'%Y-%c-%d %H:%i')=DATE_FORMAT('$atime','%Y-%c-%d %H:%i') AND AHEADE='$head'";
        $result = $dbc->query($query);
        $person = array();
        while($row = mysqli_fetch_array($result)){
            array_push($person, $row);
        }
        echo json_encode($person);
        
    }
 ?>