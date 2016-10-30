<?php
	$ac = $_GET['ac'];
	switch ($ac) {
		case 'noaction':
			include 'modules/khu/showdata.php';
			break;
		case 'them':
			include 'modules/khu/them.php';
			break;
		case 'sua':
			include 'modules/khu/sua.php';
			break;
		
		default:
			# code...
			break;
	}
?>