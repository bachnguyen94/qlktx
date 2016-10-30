<?php
	$ac = $_GET['ac'];
	switch ($ac) {
		case 'noaction':
			include 'modules/loaitin/showdata.php';
			break;
		case 'them':
			include 'modules/loaitin/them.php';
			break;
		case 'sua':
			include 'modules/loaitin/sua.php';
			break;
		
		default:
			# code...
			break;
	}
?>