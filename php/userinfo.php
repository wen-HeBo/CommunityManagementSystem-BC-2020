<?php 
	define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','database');
	session_start();//启用session
	header("Content-Type: text/html;charset=utf-8"); //设置编码格式为utf-8
	date_default_timezone_set('PRC'); //调整时区

	//if(isset($_FILES['photo']['name'])){
				
		
	 //}

	if (isset($_POST["submit"])&&$_POST['submit']=='确定'){
		$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		if(isset($_COOKIE['name'])){
			$oldid=$_COOKIE['name'];
		}
		
		$name=mysqli_real_escape_string($dbc,trim($_POST['infoname']));
		$sex=mysqli_real_escape_string($dbc,trim($_POST['sex']));
		$tel=mysqli_real_escape_string($dbc,trim($_POST['infotel']));
		$add=mysqli_real_escape_string($dbc,trim($_POST['infoadd']));
		$email=mysqli_real_escape_string($dbc,trim($_POST['infoemail']));
		// echo $sex;
		//echo $_POST['infoemail'];
		if(!empty($name)  && !empty($sex) && !empty($tel) && !empty($add) && !empty($email)){
			mysqli_query($dbc,"set names 'utf8' ");
			$query="UPDATE user SET NAME='$name',SEX='$sex',TEL='$tel',user.ADD='$add',EMAIL='$email' WHERE UID='$oldid'";
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
			    $sql = "UPDATE user SET PHOTO='$path' WHERE UID='$oldid'";  
			    $result = mysqli_query($dbc,$sql); 
		     }
		    if(isset($_POST['oldpad'])&&isset($_POST['newpad'])&&!empty($_POST['oldpad'])&&!empty($_POST['newpad'])){
		    	$pad1=$_POST['oldpad'];
		    	$pad2=$_POST['newpad'];
		    	$pad1=mysqli_real_escape_string($dbc,trim($_POST['oldpad']));//密码
				$pad2=mysqli_real_escape_string($dbc,trim($_POST['newpad']));//密码
		    	if (preg_match('/^\w{6,20}$/',$pad2)){
		    		$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		    		$query="SELECT * FROM user WHERE UID = '$oldid' AND UPASSWORD=SHA('$pad1')";
		    		$data=mysqli_query($dbc,$query);
		    		mysqli_close($dbc);
		    		if(mysqli_num_rows($data)!=0){
		    			$query="UPDATE user SET UPASSWORD=SHA('123456') WHERE UID = 'whb'";
							$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
							mysqli_query($dbc,$query);
							mysqli_close($dbc);
		    		}
		    		else{
		    			echo "<script>alert('旧密码不正确！');location.href='../html/user_main.html';</script>";
		    		}
		    	}
		    	else{
					echo "<script>alert('请输入6-20位由字母、下划线、数字组成的密码！');location.href='../html/user_main.html';</script>";
				}
		    }
			echo "<script>alert('修改成功！');location.href='../html/user_main.html';</script>";	

			
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
