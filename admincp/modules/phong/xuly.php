<?php
	include '../../../config/config.php';
	if(!empty($_POST['maphong'])&&!empty($_POST['tenphong'])&&!empty($_POST['soluong'])&&!empty($_POST['truongphong'])&&!empty($_POST['makhu']))
	{
		foreach ($_POST as $key => $value) {
			$$key = $value;
		}
		//kiem tra xem ma phong da co trong CSDL chua
		$sql = "SELECT MA_PHONG,COUNT(*) FROM phong WHERE MA_PHONG='{$maphong}'";
		$result = mysqli_query($quanlyktx,$sql);
		$row = mysqli_fetch_assoc($result);
		if(isset($_POST['sua']))
		{
			if($maphong == $_GET['id'])
			{
				$kt = 2;
			}
			if($maphong == $row['MA_PHONG'] && $maphong != $_GET['id']) $kt = 1;
		}
		else
		{
			$kt = 0;
		}
		if ($row['COUNT(*)'] == 1 && $kt==0 || $kt == 1)
		{
			echo "Ma phong da ton tai xin nhap lai";
			echo "<button onclick='goBack()'>Go Back</button>";
		}
		else
		{
			if(isset($_POST['them']))
			{
				$sql = "INSERT INTO phong(MA_PHONG,TEN_PHONG,SO_LUONG,PHONG_TRUONG,MA_KHU) VALUES('{$maphong}','{$tenphong}','{$soluong}','{$truongphong}','{$makhu}')";
				mysqli_query($quanlyktx,$sql);
				header('Location:../../index.php?quanly=phong&ac=noaction');
			}
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				if(isset($_POST['sua']))
				{	
					$sql = "UPDATE phong SET MA_PHONG='{$maphong}',TEN_PHONG='{$tenphong}',SO_LUONG='{$soluong}',PHONG_TRUONG='{$truongphong}',MA_KHU='{$makhu}' WHERE MA_PHONG='{$id}'";
					mysqli_query($quanlyktx,$sql);
					header('Location:../../index.php?quanly=phong&ac=noaction');
				}
		    }
		}
	}
	else
	{
		if(empty($_GET['id_xoa']))
		{
			echo "Xin nhap du cac truong";
			echo "<button onclick='goBack()'>Go Back</button>";
		}
	}
	if(isset($_GET['id_xoa']))
	{
		$id = $_GET['id_xoa'];
		$sql = "DELETE FROM phong WHERE MA_PHONG='{$id}'";
		mysqli_query($quanlyktx,$sql);
		//header('Location:../../index.php?quanly=phong&ac=noaction');
	}

?>
<script>
	function goBack() {
	    window.history.back();
	}
</script>