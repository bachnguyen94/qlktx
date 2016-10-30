<?php
	$ac = $_GET['ac'];
	switch ($ac) {
		case 'noaction':
			include 'modules/theloai/showdata.php';
			break;
		case 'them':
			include 'modules/theloai/them.php';
			break;
		case 'sua':
			include 'modules/theloai/sua.php';
			break;
		
		default:
			# code...
			break;
	}
?>