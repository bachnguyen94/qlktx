<?php
	include '../../../config/config.php';
	$i=0;
	foreach ($_POST as $key => $value) {
		if(!empty($value)){
			$$key = $value;
		}
		else{
			$i++;
		}	
	}
	if($i==1){
		//kiem tra xem name da co trong CSDL chua
		$id = $_GET['id'];
		$sql = "SELECT name FROM users WHERE name='{$name}'";
		$result = mysqli_query($quanlyktx,$sql);
		$sql = "SELECT name FROM users WHERE id={$id}";
		$result2 = mysqli_query($quanlyktx,$sql);
		$row = mysqli_fetch_assoc($result);
		$row2 = mysqli_fetch_assoc($result2);
		if(isset($_POST['sua']))
		{
			if($name == $row2['name']) $kt = 0;
			if(mysqli_num_rows($result) == 1){
				if($name == $row['name'] && $name != $row2['name']) $kt = 1;
			}
		}
		if ($kt == 1)
		{
			echo "Ten da ton tai xin nhap lai";
			echo "<button onclick='goBack()'>Go Back</button>";
		}
		else
		{
			if(isset($_GET['id']))
			{
				$id = $_GET['id'];
				if(isset($_POST['sua']))
				{	
					if(!filter_var($email, FILTER_VALIDATE_EMAIL))
					{
						echo "Email khong hop le";
						echo "<button onclick='goBack()'>Go Back</button>";
					}
					else{
						$sql = "UPDATE users SET name='{$name}',email='{$email}',quyen='{$quyen}' WHERE id='{$id}'";
						mysqli_query($quanlyktx,$sql);
						header('Location:../../index.php?quanly=user&ac=noaction');
					}
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
		$sql = "DELETE FROM users WHERE id='$id_xoa'";
		mysqli_query($quanlyktx,$sql);
		//header('Location:../../index.php?quanly=khoa&ac=noaction');
	}

?>
<script>
	function goBack() {
	    window.history.back();
	}
</script>