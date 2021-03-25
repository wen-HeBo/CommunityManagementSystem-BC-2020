<?php 
	if(isset($_POST["index"])){
  		$pageIndex = $_POST["index"];
	}
	if(isset($_POST["size"])){
  		$pageSize = $_POST["size"];
	}

	$host = "127.0.0.1";   // 服务器地址 
    $username = "root";   // 用户名
    $password = "";  // 密码
    $databaseName = "database";  // 数据库名
	
	if($pageIndex==0){
		$query = "select count(*) from annou order by ADATE  desc";
		// 连接数据库
		$conn = db_connection($host, $username, $password, $databaseName);
		// 执行查询操作
		$result = $conn->query($query);

		echo json_encode(array("total"=>mysqli_fetch_array($result)['0']));
	}
	else{

		$query = "select * from annou order by ADATE desc";
		// 连接数据库
		$conn = db_connection($host, $username, $password, $databaseName);
		// 执行查询操作
		$result = $conn->query($query);

		$announcement = array();
		while($row = mysqli_fetch_array($result)){
	        array_push($announcement, $row);
		}
		echo json_encode($announcement);
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
