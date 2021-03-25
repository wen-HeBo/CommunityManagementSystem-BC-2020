<?php
  require_once('config.php');

  $id = $_POST['id'];
  $index = $_POST['ind'];
  $uname = $_POST['uid'];

    // 连接数据库
    $dbc = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
    // 将要执行的SQL语句
    $query="INSERT INTO history VALUES ('$uname', now(), '$id')";
    // 执行数据库操作
    mysqli_query($dbc, $query);
    // 关闭数据库连接
    mysqli_close($dbc);

?>