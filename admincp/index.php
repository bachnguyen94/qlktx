<?php
	session_start();
	if(empty($_SESSION['username'])||$_SESSION['quyen'] != 1)
	{
		header('Location:../index.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	<link href="../style/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="../style/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
	<script language="javascript" src="../js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/style.css">


	<script src="..js/jquery.min.js"></script>     
	<script src="../style/bootstrap/js/en.js" type="text/javascript"></script>
	<script src="../style/bootstrap/js/moment.js" type="text/javascript"></script>
	<script type="text/javascript" src="modules/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="modules/ckeditor/styles.js"></script>
	<script src="../style/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../style/bootstrap/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
</head>
<body>
	<script type="text/javascript" src="../js/wz_tooltip.js"></script>
	<div class="wrapper">
		<?php 
			include 'modules/banner.php';
			echo "<div class='ct'>";
				include 'modules/menu.php';
				include 'modules/content.php';
				echo "<div class='clear'></div>";
			echo "</div>";
			include 'modules/footer.php';
		?>
		<div class="clear"></div>
	</div>
</body>

