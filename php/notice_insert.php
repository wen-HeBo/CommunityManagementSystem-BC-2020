<?php 
    define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','database');
    session_start();//启用session
    header("Content-Type: text/html;charset=utf-8"); //设置编码格式为utf-8
    date_default_timezone_set('PRC'); //调整时区
    if (isset($_POST["str"])&&isset($_POST["title"])){
        $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        $str=mysqli_real_escape_string($dbc,trim($_POST['str']));//密码
        $title=mysqli_real_escape_string($dbc,trim($_POST['title']));
        if($str!=''&&$title!=''){
            mysqli_query($dbc,"set names 'utf8' ");
            $query="INSERT INTO annou(AHEADE,ADATE,ABODY) VALUES('$title',now(),'$str')";
            mysqli_query($dbc,$query);
            mysqli_close($dbc);
            echo $str;
            echo "<script>alert('公告发布成功！');location.href='../html/admin_main.html';</script>";
        }
        else{
            echo "<script>alert('标题或内容不能为空！');</script>";
        }
    }
 ?>