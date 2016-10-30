<?php
	$ac = $_GET['ac'];
	switch ($ac) {
		case 'noaction':
			include 'modules/user/showdata.php';
			break;
		case 'sua':
			include 'modules/user/sua.php';
			break;
		
		default:
			# code...
			break;
	}
?>