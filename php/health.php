<?php 
	define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','database');
	session_start();//启用session
	header("Content-Type: text/html;charset=utf-8"); //设置编码格式为utf-8
	date_default_timezone_set('PRC'); //调整时区
	if (isset($_POST["submit"])&&$_POST['submit']=='确认'){
		$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		if(isset($_COOKIE['name'])){
			$oldid=$_COOKIE['name'];
		}	
		$tall=mysqli_real_escape_string($dbc,trim($_POST['tall']));
		$weight=mysqli_real_escape_string($dbc,trim($_POST['weight']));
		$tep=mysqli_real_escape_string($dbc,trim($_POST['tep']));
		$sbp=mysqli_real_escape_string($dbc,trim($_POST['sbp']));
		$dbp=mysqli_real_escape_string($dbc,trim($_POST['dbp']));
		$rate=mysqli_real_escape_string($dbc,trim($_POST['rate']));
		$sport=mysqli_real_escape_string($dbc,trim($_POST['sport']));
		echo $sport;
		if(!empty($tall) && !empty($weight) && !empty($tep) && !empty($sbp) && !empty($dbp) && !empty($rate) && !empty($sport)){
			mysqli_query($dbc,"set names 'utf8' ");
			$query="INSERT INTO health(UID,HDATE,TRM,TALL,WEIGHT,DBP,SBP,RATE,SPORT) VALUES('$oldid',now(),'$tep','$tall','$weight','$dbp','$sbp','$rate','$sport')";
			// $query="UPDATE user SET UID='123',NAME='fff',SEX='男',TEL='111',user.ADD='bdd' WHERE UID='$oldid'";
			mysqli_query($dbc,$query);
			mysqli_close($dbc);
		}
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