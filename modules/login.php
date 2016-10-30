<?php
	require_once '../config/config.php';
	session_start();
	$user_err = $pass_err = $empty_err = "";
	if(isset($_POST['ok']))
	{
		if(empty($_POST['username'])) $user_err = "Nhập Username";
		if(empty($_POST['password'])) $pass_err = "Nhập Password";
		if(!empty($_POST['username'])&&!empty($_POST['password']))
		{
			$username = $_POST["username"];
			$username = trim($username);
			$username = strip_tags($username);
			$username = addslashes($username);

			$password = $_POST["password"];
			$password = md5(addslashes($password));
			$sql = "SELECT id,username,password,name,quyen FROM users WHERE username='{$username}' AND password='$password'";
			$result = mysqli_query($quanlyktx,$sql);
			if(mysqli_num_rows($result) == 0)
			{
				$empty_err = "Tên đăng nhập hoặc mật khẩu chưa chính xác";
			}
			else
			{
				$row = mysqli_fetch_assoc($result);
				$_SESSION['username'] = $row['username'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['quyen'] = $row['quyen'];
				if($_SESSION['quyen'] == 1){
					header('Location:../admincp/index.php');
				}
				else{					
					header('Location:../index.php');
				}
			}
		}
	}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-vn" lang="vi-vn">
    <head>
   		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   		<title>Chương Trình Quản Lý Và Điều Hành Ký Túc Xá</title>
   		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.2.74.js"></script>
	    <link href="../style/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="../style/css/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

	    <script type="text/javascript" src="http://malsup.github.com/chili-1.7.pack.js"></script>
		<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="http://malsup.github.com/jquery.easing.1.3.js"></script>
	    <script type="text/javascript" src="http://quehuongonline.vn/js/jquery.slimscroll.min.js"></script>
	    <link rel="stylesheet" href="style/style.css" type="text/css">
	</head>
	<body>
		<div class="login">
			<div class="row">
				<div class="col-sm-offset-3 col-sm-6">
					<h1 style="color:#4CAF50; font-family: Decorative;">LOGIN</h1>
				</div>
			</div>
			<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype='multipart/form-data'>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Username: </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="username" placeholder="Username">
			    </div>
				<span><?php echo $user_err?></span>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Password: </label>
			    <div class="col-sm-4">
			      <input type="password" class="form-control" name="password" placeholder="Password">
			    </div>
			    <span><?php echo $pass_err ?></span>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-6">
			      <button type="submit" class="btn btn-primary" name="ok"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Login</button>
			      <a class="btn btn-danger" href="../index.php"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>Cancel</a>
			    </div>
			  </div>
			  <div class="form-group">
			  	<?php echo "<h3 style='margin-left:137px'>$empty_err</h3>"?>
			  </div>
			</form>
		</div>
	</body>
</html>