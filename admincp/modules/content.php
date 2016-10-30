<div class="content">
<?php
	/*include 'class_them.php';
	include 'class_sua.php';
	include 'class_show.php';
	if(isset($_GET['quanly']))
	{
		$quanly = $_GET['quanly'];
		
	}*/
	if(isset($_GET['quanly']))
	{
		$quanly = $_GET['quanly'];
		switch ($quanly) {
			case 'khu':
				include 'khu/main.php';
				break;
			case 'khoa':
				include 'khoa/main.php';
				break;
			case 'phong':
				include 'phong/main.php';
				break;
			case 'lop':
				include 'lop/main.php';
				break;
			case 'sinhvien':
				include 'sinhvien/main.php';
				break;
			case 'user':
				include 'user/main.php';
				break;
			case 'tintuc':
				include 'tintuc/main.php';
				break;
			case 'loaitin':
				include 'loaitin/main.php';
				break;
			case 'theloai':
				include 'theloai/main.php';
				break;
			default:
				# code...
				break;
		}
	}
	else 
	{
		if(isset($_GET['search']))
		{
			include "/sinhvien/showdata.php";
		}
		else
		{
			echo "<h2 style='text-align:center;vertical-align:middle; color:green'>Chào mừng đến trang quản lý Ký Túc Xá trường Đại Học Hùng Vương!!!</h2>";
		}
	}
?>
</div>

