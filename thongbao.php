<div style="border-radius: 10px; border: 3px solid green; padding: 20px 20px ">
<?php
	include 'config/config.php';
	
	if(empty($_GET['id']))
	{
		$sql = "SELECT tt.id,tt.tentin FROM tintuc tt 
			JOIN theloai tl ON tt.idtheloai=tl.id
			JOIN loaitin lt ON tl.idloaitin=lt.idloaitin
			WHERE lt.idloaitin=1 ORDER BY tt.id DESC";
		$result = mysqli_query($quanlyktx,$sql);
		echo "<h2 style='background:#80ffaa;border-radius:5px;color:#fff;padding:5px 0px'>THÔNG BÁO</h2>";
		echo "<ul id='thong-bao'>";
		while($row = mysqli_fetch_assoc($result)){
			echo "<li class='clearfix'><i class='fa fa-hand-o-right' aria-hidden='true'></i><a href=index.php?menu=thongbao&id={$row['id']}>{$row['tentin']}</a></li>";
		}
		echo "</ul>";
	}
	else{
		$id = $_GET['id'];
		$sql = "SELECT id,noidung FROM tintuc WHERE id={$id}";
		$result = mysqli_query($quanlyktx,$sql);
		$row = mysqli_fetch_assoc($result);
		echo $row['noidung'];
	}
?>
</div>