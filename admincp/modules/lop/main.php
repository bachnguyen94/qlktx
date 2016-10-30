<?php
	$ac = $_GET['ac'];
	switch ($ac) {
		case 'noaction':
			include 'modules/lop/showdata.php';
			break;
		case 'them':
			include 'modules/lop/them.php';
			break;
		case 'sua':
			include 'modules/lop/sua.php';
			break;
		
		default:
			# code...
			break;
	}
?>