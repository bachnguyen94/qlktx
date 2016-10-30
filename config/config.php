<?php
	$hostname_quanlyktx = "127.0.0.1";
	$username_quanlyktx = "root";
	$password_quanlyktx = "";
	$database_quanlyktx = "quanlyktx";
	
	$quanlyktx = mysqli_connect($hostname_quanlyktx,$username_quanlyktx,$password_quanlyktx,$database_quanlyktx);

// Check connection
	if (!$quanlyktx) {
    	die("Connection failed: " . mysqli_connect_error());
}
	mysqli_set_charset($quanlyktx, "utf8");
?>