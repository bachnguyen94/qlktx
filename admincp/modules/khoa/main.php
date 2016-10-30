<?php
	$ac = $_GET['ac'];
	switch ($ac) {
		case 'noaction':
			include 'modules/khoa/showdata.php';
			break;
		case 'them':
			include 'modules/khoa/them.php';
			break;
		case 'sua':
			include 'modules/khoa/sua.php';
			break;
		
		default:
			# code...
			break;
	}
?>