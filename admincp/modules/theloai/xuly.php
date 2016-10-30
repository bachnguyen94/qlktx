<?php
	include '../../../config/config.php';
	if(!empty($_POST['tentheloai'])&&!empty($_POST['idloaitin'])&&!empty($_POST['trangthai']))
	{
		foreach ($_POST as $key => $value) {
			$$key = $value;
		}
		if(isset($_POST['them']))
		{
			$sql = "INSERT INTO theloai(ten,idloaitin,trangthai) VALUES('{$tentheloai}','{$idloaitin}','{$trangthai}')";
			mysqli_query($quanlyktx,$sql);
			header('Location:../../index.php?quanly=theloai&ac=noaction');
		}
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			if(isset($_POST['sua']))
			{	
				$sql = "UPDATE theloai SET ten='{$tentheloai}',idloaitin='{$idloaitin}',trangthai='{$trangthai}' WHERE id='{$id}'";
				mysqli_query($quanlyktx,$sql);
				header('Location:../../index.php?quanly=theloai&ac=noaction');
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
		$sql = "DELETE FROM theloai WHERE id={$id}";
		mysqli_query($quanlyktx,$sql);
		//header('Location:../../index.php?quanly=theloai&ac=noaction');
	}

?>
<script>
	function goBack() {
	    window.history.back();
	}
</script>