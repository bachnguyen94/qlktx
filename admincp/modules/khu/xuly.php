<?php
	include '../../../config/config.php';
	if(!empty($_POST['makhu'])&&!empty($_POST['tenkhu'])&&!empty($_POST['sophong']))
	{
		foreach ($_POST as $key => $value) {
			$$key = $value;
		}
		//kiem tra xem ma khu da co trong CSDL chua
		$sql = "SELECT MA_KHU,COUNT(*) FROM khu WHERE MA_KHU='{$makhu}'";
		$result = mysqli_query($quanlyktx,$sql);
		$row = mysqli_fetch_assoc($result);
		if(isset($_POST['sua']))
		{
			if($makhu == $_GET['id'])
			{
				$kt = 2;
			}
			if($makhu == $row['MA_KHU'] && $makhu != $_GET['id']) $kt = 1;
		}
		else
		{
			$kt = 0;
		}
		if ($row['COUNT(*)'] == 1 && $kt==0 || $kt == 1)
		{
			echo "Ma khu da ton tai xin nhap lai";
			echo "<button onclick='goBack()'>Go Back</button>";
		}
		else
		{
			if(isset($_POST['them']))
			{
				$sql = "INSERT INTO khu(MA_KHU,TEN_KHU,SO_PHONG) VALUES('{$makhu}','{$tenkhu}','{$sophong}')";
				mysqli_query($quanlyktx,$sql);
				header('Location:../../index.php?quanly=khu&ac=noaction');
			}
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				if(isset($_POST['sua']))
				{	
					$sql = "UPDATE khu SET MA_KHU='{$makhu}',TEN_KHU='{$tenkhu}',SO_PHONG='{$sophong}' WHERE MA_KHU='{$id}'";
					mysqli_query($quanlyktx,$sql);
					header('Location:../../index.php?quanly=khu&ac=noaction');
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
		$sql = "DELETE FROM khu WHERE MA_KHU='{$id}'";
		mysqli_query($quanlyktx,$sql);
		//header('Location:../../index.php?quanly=khu&ac=noaction');
	}

?>
<script>
	function goBack() {
	    window.history.back();
	}
</script>