<?php
	require_once('../config/config.php');
	if(isset($_GET['id']))
	{
		$id_khu = $_GET['id'];
		$query_list = "SELECT * FROM khu WHERE MA_KHU='{$id_khu}'";
	    $list = mysqli_query($quanlyktx,$query_list);
	    if(!$list)
		{
			echo "không thể kết nối tới CSDL";
			exit();	
		}	
		$row_list = mysqli_fetch_assoc($list);
?>
<div class="sua">
	<h2>Chỉnh Sửa</h2>
	<form class="form-horizontal" action="modules/khu/xuly.php?id=<?php echo $row_list['MA_KHU']?>" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_khoa" class="col-sm-2 control-label">Mã Khu</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="makhu" placeholder="Mã khu" value="<?php echo $row_list['MA_KHU'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">Tên Khu</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="tenkhu" placeholder="Tên Khu" value="<?php echo $row_list['TEN_KHU'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">Số Phòng</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="sophong" placeholder="Số Phòng" value="<?php echo $row_list['SO_PHONG'] ?>">
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