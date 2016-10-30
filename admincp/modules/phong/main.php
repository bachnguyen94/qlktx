<?php
	$ac = $_GET['ac'];
	switch ($ac) {
		case 'noaction':
			include 'modules/phong/showdata.php';
			break;
		case 'them':
			include 'modules/phong/them.php';
			break;
		case 'sua':
			include 'modules/phong/sua.php';
			break;
		
		default:
			# code...
			break;
	}
?>