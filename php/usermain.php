<?php 
	define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','database');
	header("Content-type:text/html;charset=utf-8");//设置编码格式为utf-8
	if(isset($_COOKIE['name'])){
		$username=$_COOKIE['name'];
	}
	if($username!=''){
		$query = "select * from user where UID='$username'";
		// 连接数据库
		$conn = db_connection(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		$result = $conn->query($query);

		$ss = array();
		$row = mysqli_fetch_array($result);
		if(is_file("../images/".$row['PHOTO']) && filesize("../images/".$row['PHOTO'])>0)
			$row["flag"]=1;
		else
			$row["flag"]=-1;
		array_push($ss,$row);
		//echo "<script>console.log($ss)</script>";
		echo json_encode($ss);

	}

	function db_connection($host, $username, $password, $databaseName){
        $conn = mysqli_connect($host, $username, $password, $databaseName);
        // 下面两条语句用来防止中文乱码
    	mysqli_query($conn,"set character set 'utf8'");
		mysqli_query($conn,"set names 'utf8'");
        if (mysqli_connect_errno()) {
     		echo "Could not connect to database.";
     		exit();
        }
        return $conn; // 返回连接对象
    }
 ?>