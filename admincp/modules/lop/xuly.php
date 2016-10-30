<?php
	include '../../../config/config.php';
	if(!empty($_POST['malop'])&&!empty($_POST['tenlop'])&&!empty($_POST['soluongsv'])&&!empty($_POST['gvcn'])&&!empty($_POST['makhoa']))
	{
		foreach ($_POST as $key => $value) {
			$$key = $value;
		}
		//kiem tra xem ma lop da co trong CSDL chua
		$sql = "SELECT MA_LOP FROM lop WHERE MA_LOP='{$malop}'";
		$result = mysqli_query($quanlyktx,$sql);
		$row = mysqli_fetch_assoc($result);
		if(isset($_POST['sua']))
		{
			if($malop == $_GET['id']) $kt = 2;
			if($malop == $row['MA_LOP'] && $malop != $_GET['id']) $kt = 1;
		}
		else
		{
			$kt = 0;
		}
		if ((mysqli_num_rows($result) == 1 && $kt==0) || $kt == 1)
		{
			echo $kt;
			echo "Ma Lop da ton tai xin nhap lai <br />";
			echo "<button onclick='goBack()'>Go Back</button>";
		}
		else
		{
			if(isset($_POST['them']))
			{
				$sql = "INSERT INTO lop(MA_LOP,TEN_LOP,SOLUONG_SV,GIAOVIEN_CN,MA_KHOA) VALUES('{$malop}','{$tenlop}','{$soluongsv}','{$gvcn}','{$makhoa}')";
				mysqli_query($quanlyktx,$sql);
				header('Location:../../index.php?quanly=lop&ac=noaction');
			}
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				if(isset($_POST['sua']))
				{	
					$sql = "UPDATE lop SET MA_LOP='{$malop}',TEN_LOP='{$tenlop}',SOLUONG_SV='{$soluongsv}',GIAOVIEN_CN='{$gvcn}',MA_KHOA='{$makhoa}' WHERE MA_LOP='{$id}'";
					mysqli_query($quanlyktx,$sql);
					header('Location:../../index.php?quanly=lop&ac=noaction');
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
		$sql = "DELETE FROM lop WHERE MA_LOP='{$id}'";
		mysqli_query($quanlyktx,$sql);
		//header('Location:../../index.php?quanly=lop&ac=noaction');
	}

?>
<script>
	function goBack() {
	    window.history.back();
	}
</script>