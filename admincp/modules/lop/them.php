<?php
	require_once('../config/config.php');
	$QueryListKhoa = "SELECT MA_KHOA FROM khoa";
	$ListKhoa = mysqli_query($quanlyktx,$QueryListKhoa);
?>
<div class="them">
	<h2>THÊM MỚI</h2>
	<form class="form-horizontal" action="modules/lop/xuly.php" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_khoa" class="col-sm-2 control-label">MÃ LỚP</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="malop" placeholder="MÃ LỚP">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">TÊN LỚP</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="tenlop" placeholder="TÊN LỚP">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">SỐ LƯỢNG SINH VIÊN</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="soluongsv" placeholder="SỐ LƯỢNG SINH VIÊN">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_tenkhoa" class="col-sm-2 control-label">GIÁO VIÊN CHỦ NHIỆM</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="gvcn" placeholder="GIÁO VIÊN CHỦ NHIỆM"> 
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">MÃ KHOA</label>
	    <div class="col-sm-6">
			<select class="form-control" name="makhoa">
			<?php 
				while ($row_ListKhoa = mysqli_fetch_assoc($ListKhoa)) {
			?>
				<option value="<?php echo $row_ListKhoa['MA_KHOA']?>"><?php echo $row_ListKhoa['MA_KHOA']?></option>
			<?php 
				}
			?>
			</select>
		</div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" name="them"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>Submit</button>
	      <button type="submit" onclick="goBack()"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>Hủy</button>
	    </div>
	  </div>
	</form>
</div>

<script>
	function goBack() {
	    window.history.back();
	}
</script>