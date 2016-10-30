<?php
	require_once('../config/config.php');
	if(isset($_GET['id']))
	{
		$id_khoa = $_GET['id'];
		$query_listkhoa = "SELECT * FROM khoa WHERE MA_KHOA='{$id_khoa}'";
	    $listkhoa = mysqli_query($quanlyktx,$query_listkhoa);
	    if(!$listkhoa)
		{
			echo "không thể kết nối tới CSDL";
			exit();	
		}	
		$row_listkhoa = mysqli_fetch_assoc($listkhoa);
?>
<div class="sua">
	<h2>Chỉnh Sửa</h2>
	<form class="form-horizontal" action="modules/khoa/xuly.php?id=<?php echo $row_listkhoa['MA_KHOA']?>" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_khoa" class="col-sm-2 control-label">Mã Khoa</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="makhoa" placeholder="Mã Khoa" value="<?php echo $row_listkhoa['MA_KHOA'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">Mã Ngành</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="manganh" placeholder="Mã Ngành" value="<?php echo $row_listkhoa['MA_NGANH'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_motakhoa" class="col-sm-2 control-label">Mô Tả Khoa</label>
	    <div class="col-sm-6">
	      <textarea class="form-control ckeditor" rows="5" name="motakhoa" ><?php echo $row_listkhoa['MO_TA_KHOA']?></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_tenkhoa" class="col-sm-2 control-label">Tên Khoa</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="tenkhoa" placeholder="Tên Khoa" value="<?php echo $row_listkhoa['TEN_KHOA'] ?>"> 
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" name="sua"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>Submit</button>
	      <button type="submit" onclick="goBack()"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>Hủy</button>
	    </div>
	  </div>
	</form>
</div>
<?php
}
?>
<script>
	function goBack() {
	    window.history.back();
	}
</script>