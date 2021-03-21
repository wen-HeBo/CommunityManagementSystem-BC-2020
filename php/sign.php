<?php 
	define('DB_HOST', '127.0.0.1');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','database');
	session_start();//启用session
	header("Content-type:text/html;charset=utf-8");//设置编码格式为utf-8
	date_default_timezone_set('PRC'); //调整时区
	if (isset($_POST["submit"])&&$_POST['submit']=='注册'){
		//判断是否点击了登录按钮
		if(isset($_POST["checkNum"])&&$_POST["checkNum"]!='')
			$checkNum = $_POST["checkNum"];
		else
			echo "<script>alert('验证码不能为空！');location.href='../html/sign.html';</script>";
		if(isset($_POST["checkNum"])&&$checkNum==$_SESSION["validcode"]){
			$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
			$user_name=mysqli_real_escape_string($dbc,trim($_POST['username']));//用户名
			$user_password1=mysqli_real_escape_string($dbc,trim($_POST['password1']));//密码
			$user_password2=mysqli_real_escape_string($dbc,trim($_POST['password2']));//密码
			$time = date("Y:m:d H:i:s",time());//获取登录时的时间
			$ip = $_SERVER["SERVER_ADDR"];//接收ip位置
			// echo "<script>alert('$user_name')</script>";
			//判断是否为空
			if(!empty($user_name)&&!empty($user_password1)&&!empty($user_password2)){
				if($user_password1==$user_password2){
					if (preg_match('/^\w{6,20}$/',$user_password1)) {
						$query="SELECT * FROM user WHERE UID = '$user_name'";
						$data=mysqli_query($dbc,$query);
						if(mysqli_num_rows($data)==0){
							$query="INSERT INTO user(UID,UPASSWORD) VALUES('$user_name',SHA('$user_password1'))";
							mysqli_query($dbc,$query);
							mysqli_close($dbc);
								echo "<script>alert('注册成功！');location.href='../html/index.html';</script>";
						}
						else{
							echo "<script>alert('用户名已存在！');location.href='../html/sign.html';</script>";
						}
					}
					else{
						echo "<script>alert('请输入6-20位由字母、下划线、数字组成的密码！');location.href='../html/sign.html';</script>";
					}
					
				}
				else{
					echo "<script>alert('输入的两次密码不一样！');location.href='../html/sign.html';</script>";
				}
			}	
			else{
				echo "<script>alert('用户名和密码不能为空！');location.href='../html/sign.html';</script>";
			}	
		}	
		else{
			echo "<script>alert('验证码错误！');location.href='../html/sign.html';</script>";
		}
	}
?>
