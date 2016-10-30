<?php
	if(isset($_GET['ac']))
	{
		$ac = $_GET['ac'];
		switch ($ac) {
			case 'noaction':
				include 'modules/tintuc/showdata.php';
				break;
			case 'them':
				include 'modules/tintuc/them.php';
				break;
			case 'sua':
				include 'modules/tintuc/sua.php';
				break;
			
			default:
				# code...
				break;
		}
	}
?>