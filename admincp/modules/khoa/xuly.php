<?php
	include '../../../config/config.php';
	if(!empty($_POST['makhoa'])&&!empty($_POST['manganh'])&&!empty($_POST['motakhoa'])&&!empty($_POST['tenkhoa']))
	{
		foreach ($_POST as $key => $value) {
			$$key = $value;
		}
		//kiem tra xem ma khoa da co trong CSDL chua
		$sql = "SELECT MA_KHOA,COUNT(*) FROM khoa WHERE MA_KHOA='{$makhoa}'";
		$result = mysqli_query($quanlyktx,$sql);
		$row = mysqli_fetch_assoc($result);
		if(isset($_POST['sua']))
		{
			if($makhoa == $_GET['id']) $kt = 2;
			if($makhoa == $row['MA_KHOA'] && $makhoa != $_GET['id']) $kt = 1;
		}
		else {
			$kt = 0;
		}
		if ($row['COUNT(*)'] == 1 && $kt == 0 || $kt == 1)
		{
			echo "Ma khoa da ton tai xin nhap lai";
			echo "<button onclick='goBack()'>Go Back</button>";
		}
		else
		{
			if(isset($_POST['them']))
			{
				$sql = "INSERT INTO khoa(MA_KHOA,MA_NGANH,MO_TA_KHOA,TEN_KHOA) VALUES('{$makhoa}','{$manganh}','{$motakhoa}','{$tenkhoa}')";
				mysqli_query($quanlyktx,$sql);
				header('Location:../../index.php?quanly=khoa&ac=noaction');
			}
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				if(isset($_POST['sua']))
				{	
					$sql = "UPDATE khoa SET MA_KHOA='{$makhoa}',MA_NGANH='{$manganh}',MO_TA_KHOA='{$motakhoa}',TEN_KHOA='{$tenkhoa}' WHERE MA_KHOA='{$id}'";
					mysqli_query($quanlyktx,$sql);
					header('Location:../../index.php?quanly=khoa&ac=noaction');
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
		$id_xoa = $_GET['id_xoa'];
		$sql = "DELETE FROM khoa WHERE MA_KHOA='$id_xoa'";
		mysqli_query($quanlyktx,$sql);
		//header('Location:../../index.php?quanly=khoa&ac=noaction');
	}

?>
<script>
	function goBack() {
	    window.history.back();
	}
</script>