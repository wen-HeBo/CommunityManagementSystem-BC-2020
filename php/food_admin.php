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
	if(isset($_POST["index"])){
  		$pageIndex = $_POST["index"];
	}
	if(isset($_POST["size"])){
  		$pageSize = $_POST["size"];
	}
	// 首次查询，只需要得到记录数量即可
	if($pageIndex==0){
		$query = "select count(*) from food";
		// 连接数据库
		$conn = db_connection(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		// 执行查询操作
		$result = $conn->query($query);

		echo json_encode(array("total"=>mysqli_fetch_array($result)['0']));
	}
	else{
		$startRowNum = ($pageIndex-1) * $pageSize;  
		$numOfRows = $pageSize;  // 返回的最多行数
		$query = "select * from food limit ".$startRowNum.",".$numOfRows;
		// 连接数据库
		$conn = db_connection(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		// 执行查询操作
		$result = $conn->query($query);

		$teachers = array();
		while($row = mysqli_fetch_array($result)){
		    array_push($teachers, $row);
		}

		echo json_encode($teachers);
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