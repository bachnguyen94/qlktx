<?php
	session_start();
	require_once '../config/config.php';
	$Arr_Err  = array('', '', '', '', '');
	$Arr_save = array('', '', '', '', '');
	if(isset($_POST['ok']))
	{
		$i=0; $j=0; $k=0;
		foreach ($_POST as $key => $value) {
			if($i<=4)
			{
				if(empty($value)){
					$Arr_Err[$i] = "Không được để trống";
					$j++;
				}
				else{
					$$key=trim($value);
					$Arr_save[$i] = $$key;
				}
				$i++;
			}
		}
		if($j == 0 )
		{
			$sql1 = "SELECT username FROM users WHERE username='{$username}'";
			$sql2 = "SELECT name FROM users WHERE name='{$name}'";
			$result1 = mysqli_query($quanlyktx,$sql1);
			$result2 = mysqli_query($quanlyktx,$sql2);
			if(mysqli_num_rows($result1) == 1)
			{
				$Arr_Err[0] = "Tên đăng nhập đã tồn tại";
				$k++;
			}
			if(mysqli_num_rows($result2) == 1)
			{
				$Arr_Err[1] = "Tên đăng nhập đã tồn tại";
				$k++;
			}
			if($password != $verify_password)
			{
				$Arr_Err[4] = "Password không khớp";
				$k++;
			}
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$Arr_Err[2] = "Email không phù hợp";
				$k++;
			}
			if($k == 0)
			{
				$password = md5( addslashes($password));
				$sql = "INSERT INTO users(username,password,name,email,quyen) VALUES('$username','$password','$name','$email','2')";
				mysqli_query($quanlyktx,$sql);
				$_SESSION['username'] = $username;
				$_SESSION['name'] = $name;
				$_SESSION['quyen'] = 2;
				header('Location:../index.php');
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
					<h1 style="color:#4CAF50; font-family: Decorative;">REGISTER</h1>
				</div>
			</div>
			<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype='multipart/form-data'>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Username: </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="username" value="<?php echo $Arr_save[0] ?>" placeholder="Username">
			    </div>
				<span><?php echo $Arr_Err[0]?></span>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Name: </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="name" value="<?php echo $Arr_save[1] ?>" placeholder="Name">
			    </div>
				<span><?php echo $Arr_Err[1] ?></span>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Email: </label>
			    <div class="col-sm-4">
			      <input type="text" class="form-control" name="email" value="<?php echo $Arr_save[2] ?>" placeholder="Email">
			    </div>
				<span><?php echo $Arr_Err[2]?></span>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Password: </label>
			    <div class="col-sm-4">
			      <input type="password" class="form-control" name="password" value="<?php echo $Arr_save[3] ?>" placeholder="Password">
			    </div>
			    <span><?php echo $Arr_Err[3] ?></span>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-2 control-label">Verify Password: </label>
			    <div class="col-sm-4">
			      <input type="password" class="form-control" name="verify_password" value="<?php echo $Arr_save[4] ?>" placeholder="Password">
			    </div>
			    <span><?php echo $Arr_Err[4] ?></span>
			  </div>

			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-6">
			      <button type="submit" class="btn btn-primary" name="ok"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Register</button>
			      <a class="btn btn-danger" href="../index.php"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>Cancel</a>
			    </div>
			  </div>
			</form>
		</div>
	</body>
</html>
