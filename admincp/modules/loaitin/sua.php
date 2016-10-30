<?php
	require_once('../config/config.php');
	if(isset($_GET['id']))
	{
		$id_loaitin = $_GET['id'];
		$query_listloaitin = "SELECT tenloaitin,trangthai FROM loaitin WHERE idloaitin='{$id_loaitin}'";
	    $listloaitin = mysqli_query($quanlyktx,$query_listloaitin);
	    if(!$listloaitin)
		{
			echo "không thể kết nối tới CSDL";
			exit();	
		}	
		$row_listloaitin = mysqli_fetch_assoc($listloaitin);
?>
<div class="sua">
	<h2>Chỉnh Sửa</h2>
	<form class="form-horizontal" action="modules/loaitin/xuly.php?id=<?php echo $row_listloaitin['idloaitin']?>" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_motaloaitin" class="col-sm-2 control-label">TÊN LOẠI TIN</label>
	    <div class="col-sm-6">
	      <textarea class="form-control" rows="5" name="tenloaitin" ><?php echo $row_listloaitin['tenloaitin']?></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">TRẠNG THÁI</label>
	    <div class="col-xs-3">
			<select class="form-control" name="TrangThai">
				<option value="0">Không hiển thị</option>
				<option value="1" selected="selected">Hiển thị</option>
			</select>
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