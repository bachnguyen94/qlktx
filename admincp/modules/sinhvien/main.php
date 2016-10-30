<?php
	if(isset($_GET['ac']))
	{
		$ac = $_GET['ac'];
		switch ($ac) {
			case 'noaction':
				include 'modules/sinhvien/showdata.php';
				break;
			case 'them':
				include 'modules/sinhvien/them.php';
				break;
			case 'sua':
				include 'modules/sinhvien/sua.php';
				break;
			
			default:
				# code...
				break;
		}
	}
?>