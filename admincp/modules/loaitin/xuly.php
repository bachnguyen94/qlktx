<?php
	include '../../../config/config.php';
	if(!empty($_POST['tenloaitin'])&&!empty($_POST['trangthai']))
	{
		foreach ($_POST as $key => $value) {
			$$key = $value;
		}
		if(isset($_POST['them']))
		{
			$sql = "INSERT INTO loaitin(tenloaitin,trangthai) VALUES('{$tenloaitin}','{$trangthai}')";
			mysqli_query($quanlyktx,$sql);
			header('Location:../../index.php?quanly=loaitin&ac=noaction');
		}
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			if(isset($_POST['sua']))
			{	
				$sql = "UPDATE loaitin SET tenloaitin='{$tenloaitin}',trangthai='{$trangthai}' WHERE idloaitin='{$id}'";
				mysqli_query($quanlyktx,$sql);
				header('Location:../../index.php?quanly=loaitin&ac=noaction');
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
		$sql = "DELETE FROM loaitin WHERE idloaitin={$id}";
		mysqli_query($quanlyktx,$sql);
		//header('Location:../../index.php?quanly=loaitin&ac=noaction');
	}

?>
<script>
	function goBack() {
	    window.history.back();
	}
</script>