<?php 
	define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','database');
	session_start();//启用session
	header("Content-Type: text/html;charset=utf-8"); //设置编码格式为utf-8
	date_default_timezone_set('PRC'); //调整时区

	if (isset($_POST["submit"])&&$_POST['submit']=='确定'){
		$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		
		
		$fname=mysqli_real_escape_string($dbc,trim($_POST['fname']));
		$fid=mysqli_real_escape_string($dbc,trim($_POST['fid']));
		$price=mysqli_real_escape_string($dbc,trim($_POST['price']));
		// echo $sex;
		//echo $_POST['infoemail'];
		if(!empty($fname)  && !empty($fid) && !empty($price)){
			mysqli_query($dbc,"set names 'utf8' ");
			$query="INSERT INTO food(FID,FNAME,PRICE) VALUES('$fid','$fname','$price')";
		// $query="UPDATE user SET UID='123',NAME='fff',SEX='男',TEL='111',user.ADD='bdd' WHERE UID='$oldid'";
			$result = mysqli_query($dbc, $query);

			if(isset($_FILES['photo']['name'])){
				
				$filename = $_FILES['photo']['name'];
			    $tmp_name = $_FILES['photo']['tmp_name'];
			    //print_r($filename.$tmp_name.$_POST['photo']);
			    // move_uploaded_file($tmp_name,"../images/".$filename);
			    $path = "../images/".$filename;
			    echo "<script> console.log('$filename');</script>";
					    
			    print_r($path);
			    mysqli_query($dbc,"set names 'utf8' ");  
			    $sql = "UPDATE food SET Fimg='$path' WHERE FID='$fid'";  
			    $result = mysqli_query($dbc,$sql); 
		     }
			echo "<script>alert('添加成功！');location.href='../html/admin_main.html';</script>";		
		}	
		else{
			echo "<script>alert('添加失败！');location.href='../html/admin_main.html';</script>";
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
