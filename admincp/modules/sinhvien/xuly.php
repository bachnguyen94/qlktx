<?php
	include '../../../config/config.php';
	if(!empty($_POST['masv'])&&!empty($_POST['tensv'])&&!empty($_POST['ngaysinh'])&&!empty($_POST['quequan'])&&!empty($_POST['gioitinh'])&&!empty($_POST['nienkhoa'])&&!empty($_POST['chucvu'])&&!empty($_POST['malop'])&&!empty($_POST['maphong']))
	{
		foreach ($_POST as $key => $value) {
			$$key = trim($value," ");
		}
		//kiem tra xem ma sv da co trong CSDL chua
		$sql = "SELECT MA_SV,COUNT(*) FROM sinhvien WHERE MA_SV='{$masv}'";
		$result = mysqli_query($quanlyktx,$sql);
		$row = mysqli_fetch_assoc($result);
		if(isset($_POST['sua']))
		{
			//neu khong sua ma sinh vien thi $kt=2
			if($masv == $_GET['id'])$kt = 2;
			//neu $masv tim thay trong csdl ma khac voi masv can sua thi yeu cau nhap lai
			if($masv == $row['MA_SV'] && $masv != $_GET['id']) $kt = 1;
		}
		else
		{
			$kt = 0;
		}
		if (($row['COUNT(*)'] == 1 && $kt==0) || $kt == 1)
		{
			echo "Ma SV da ton tai xin nhap lai <br />";
			echo "<button onclick='goBack()'>Go Back</button>";
		}
		else
		{
			if(isset($_POST['them']))
			{
				$sql = "INSERT INTO sinhvien(MA_SV,TEN_SV,NGAY_SINH,QUE_QUAN,GIOI_TINH,NIEN_KHOA,CHUC_VU,MA_LOP,MA_PHONG,TT) VALUES('{$masv}','{$tensv}','{$ngaysinh}','{$quequan}','{$gioitinh}','{$nienkhoa}','{$chucvu}','{$malop}','{$maphong}','{$TT}')";
				mysqli_query($quanlyktx,$sql);
				mysqli_query($quanlyktx,"CALL update_phong()");
				mysqli_query($quanlyktx,"CALL update_lop()");
				header('Location:../../index.php?quanly=sinhvien&ac=noaction');
			}
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				if(isset($_POST['sua']))
				{	
					$sql = "UPDATE sinhvien SET MA_SV='{$masv}',TEN_SV='{$tensv}',NGAY_SINH='{$ngaysinh}',QUE_QUAN='{$quequan}',GIOI_TINH='{$gioitinh}',NIEN_KHOA='{$nienkhoa}',CHUC_VU='{$chucvu}',MA_LOP='{$malop}',MA_PHONG='{$maphong}',TT='{$TT}' WHERE MA_SV='{$id}'";
					mysqli_query($quanlyktx,$sql);
					mysqli_query($quanlyktx,"CALL update_phong()");
					mysqli_query($quanlyktx,"CALL update_lop()");
					header('Location:../../index.php?quanly=sinhvien&ac=noaction');
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
		$sql = "DELETE FROM sinhvien WHERE MA_SV='{$id}'";
		mysqli_query($quanlyktx,$sql);
		mysqli_query($quanlyktx,"CALL update_phong()");
		mysqli_query($quanlyktx,"CALL update_lop()");
		//header('Location:../../index.php?quanly=sinhvien&ac=noaction');
	}
?>
<script>
	function goBack() {
	    window.history.back();
	}
</script>