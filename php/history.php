<?php 
	define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','database');
	session_start();//启用session
	header("Content-Type: text/html;charset=utf-8"); //设置编码格式为utf-8
	date_default_timezone_set('PRC'); //调整时区
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	if(isset($_COOKIE['name'])){
		$oldid=$_COOKIE['name'];
	}

	$query = "SELECT * FROM history ,food WHERE UID='$oldid' AND OHID=FID AND DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(OHDATE)";
	// 连接数据库
	$conn = db_connection(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	// 执行查询操作
	$result = $conn->query($query);

	$teachers = array();
	while($row = mysqli_fetch_array($result)){
	    array_push($teachers, $row);
	}

	echo json_encode($teachers);

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