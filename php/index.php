<?php 
	define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','database');
	session_start();//启用session
	header("Content-type:text/html;charset=utf-8");//设置编码格式为utf-8
	date_default_timezone_set('PRC'); //调整时区
	if (isset($_POST["submit"])&&$_POST['submit']=='登录'){
		//判断是否点击了登录按钮
		if(isset($_POST["checkNum"])&&$_POST["checkNum"]!='')
			$checkNum = $_POST["checkNum"];
		else
			echo "<script>alert('验证码不能为空！');location.href='../html/index.html';</script>";
		if(isset($_POST["checkNum"])&&$checkNum==$_SESSION["validcode"]){
			$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
			$user_name=mysqli_real_escape_string($dbc,trim($_POST['username']));//用户名
			$user_password=mysqli_real_escape_string($dbc,trim($_POST['password']));//密码
			$identity =mysqli_real_escape_string($dbc,trim($_POST["identity"]));//用户身份
			$time = date("Y:m:d H:i:s",time());//获取登录时的时间
			$ip = $_SERVER["SERVER_ADDR"];//接收ip位置
			// echo "<script>alert('$user_name')</script>";
			//判断是否为空
			if(!empty($user_name)&&!empty($user_password)&&$identity=="admin"){
				$query="SELECT AID,APASSWORD FROM admin WHERE AID = '$user_name' AND APASSWORD = '$user_password'";
				$data = mysqli_query($dbc,$query);
				if(mysqli_num_rows($data)==1){
					$row=mysqli_fetch_array($data);
					$_SESSION["name"] = $row['AID'];
					$_SESSION["password"] =$row['APASSWORD'];
					$_SESSION["identity"] = $identity;
					$_SESSION["ip"] = $ip;
					$_SESSION["time"] = $time;
					setcookie('name',$row['AID'],time()+(60*60*24),'/');
					setcookie('password',$row['APASSWORD'],time()+(60*60*24));
					//$home_url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/main.html';
					header('location:../html/admin_main.html');
				}
				else{
					$_SESSION=array();
					if(isset($_COOKIE[session_name()])){
						setcookie(session_name(),'',time()-3600);
						setcookie('name','',time()-3600);
					}
					session_destroy();
					echo "<script>alert('用户名或密码错误！');location.href='../html/index.html';</script>";
				}
			}
			elseif(!empty($user_name)&&!empty($user_password)&&$identity=="user"){

				$query="SELECT UID,UPASSWORD FROM user WHERE UID = '$user_name' AND UPASSWORD = SHA('$user_password')";
				$data = mysqli_query($dbc,$query);
				if(mysqli_num_rows($data)==1){
					$row=mysqli_fetch_array($data);
					$_SESSION["name"] = $row['UID'];
					$_SESSION["password"] =$row['UPASSWORD'];
					$_SESSION["identity"] = $identity;
					$_SESSION["ip"] = $ip;
					$_SESSION["time"] = $time;
					setcookie('name',$row['UID'],time()+(60*60*24),'/');
					setcookie('password',$row['UPASSWORD'],time()+(60*60*24),'/');
					//$home_url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/main.html';
					//echo "<script>console.log(document.cookie);</script>";
					header('location:../html/user_main.html');
				}
				else{
					$_SESSION=array();
					if(isset($_COOKIE[session_name()])){
						setcookie(session_name(),'',time()-3600);
						setcookie('name','',time()-3600);
					}
					session_destroy();

					echo "<script>alert('用户名或密码错误！');location.href='../html/index.html';</script>";
				}
			}
			else{
					$_SESSION=array();
					if(isset($_COOKIE[session_name()])){
						setcookie(session_name(),'',time()-3600);
					}
					session_destroy();
					echo "<script>alert('用户名和密码不能为空！');location.href='../html/index.html';</script>";
				}
		
		}
		else{
			echo "<script>alert('验证码错误！');location.href='../html/index.html';</script>";
		}
	}
?>
