<?php
	include '../../../config/config.php';
	// if(!empty($_POST['TenBaiViet'])&&!empty($_POST['TomTat'])&&!empty($_POST['NoiDung'])&&!empty($_POST['TheLoai'])&&!empty($_POST['TrangThai']))
	// {
		$TenBaiViet = $_POST['TenBaiViet'];
		$TomTat = $_POST['TomTat'];
		$NoiDung = $_POST['NoiDung'];
		$TheLoai = $_POST['TheLoai'];
		$TrangThai = $_POST['TrangThai'];
		if(isset($_GET['id'])) $id = $_GET['id'];
		if(isset($_POST['them']))
		{
			$tenanh = $_FILES['AnhMinhHoa']['name'];
			if($tenanh!="")
			{
				$time = date('ymdhis');
				$tenanh = $time.$tenanh;
				$dich = "../../../uploads/" . $tenanh;
				copy($_FILES['AnhMinhHoa']['tmp_name'],$dich);
				$dich = substr($dich,9);
			}
			$sql = "INSERT INTO tintuc(tentin,anhminhhoa,tomtat,noidung,trangthai,idtheloai) VALUES('$TenBaiViet','$dich','$TomTat','$NoiDung','$TrangThai','$TheLoai')";
			mysqli_query($quanlyktx,$sql);
			header('Location: ../../index.php?quanly=tintuc&ac=noaction');
		}
		elseif(isset($_POST['sua'])){
			$tenanh = $_FILES['AnhMinhHoa']['name'];
			if($tenanh!="")
			{
				//dat ten anh noi voi thoi gian
				$time = date('ymdhis');
				$tenanh = $time.$tenanh;
				$dich = '../../../uploads/'.$tenanh;
				copy($_FILES['AnhMinhHoa']['tmp_name'],$dich);
				$dich = substr($dich, 9);
				
				//lay link anh cu de xoa
				$sql = "SELECT AnhMinhHoa FROM tintuc WHERE id=$id";
				$link_anh = mysqli_query($quanlyktx,$sql);
				$dong = mysqli_fetch_assoc($link_anh);
				if($dong['AnhMinhHoa']!="")
				{
					unlink('../../../'.$dong['AnhMinhHoa']);
				}

				//update du lieu 
				$sql = "UPDATE tintuc SET tentin='$TenBaiViet',anhminhhoa='$dich',tomtat='$TomTat',noidung='$NoiDung',idtheloai='$TheLoai',trangthai='$TrangThai' WHERE id='$id'";
				mysqli_query($quanlyktx,$sql);
			}
			else
			{
				$sql = "UPDATE tintuc SET tentin='$TenBaiViet',tomtat='$TomTat',noidung='$NoiDung',idtheloai='$TheLoai',trangthai='$TrangThai' WHERE id='$id'";
				mysqli_query($quanlyktx,$sql);
			}
			header('Location: ../../index.php?quanly=tintuc&ac=noaction');
		}
	// }
	if(isset($_GET['id_xoa']))
	{
		$id = $_GET['id_xoa'];
		$sql = "DELETE FROM tintuc WHERE id='$id'";
		mysqli_query($quanlyktx,$sql);
		$sql = "SELECT AnhMinhHoa FROM tintuc WHERE id='$id'";
		$link_anh = mysqli_query($quanlyktx,$sql);
		$dong = mysqli_fetch_assoc($link_anh);
		if($dong['AnhMinhHoa']!="")
		{
			unlink('../../../'.$dong['AnhMinhHoa']);
		}
		//header('Location: ../../index.php?quanly=tintuc&ac=noaction');
	}
?>
<script>
	function goBack() {
	    window.history.back();
	}
</script>