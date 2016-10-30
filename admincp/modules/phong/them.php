<?php
	require_once('../config/config.php');
	$query_khu = "SELECT MA_KHU,TEN_KHU FROM khu";
	$ListKhu = mysqli_query($quanlyktx,$query_khu);
?>
<div class="them">
	<h2>THÊM MỚI</h2>
	<form class="form-horizontal" action="modules/phong/xuly.php" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_khoa" class="col-sm-2 control-label">Mã Phòng</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="maphong" placeholder="Mã Phòng">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">Tên Phòng</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="tenphong" placeholder="Tên Phòng">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">Số Lượng</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="soluong" placeholder="Số Lượng">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_tenkhoa" class="col-sm-2 control-label">Trưởng Phòng</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="truongphong" placeholder="Trưởng Phòng"> 
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Tên Khu</label>
	    <div class="col-sm-6">
			<select class="form-control" name="makhu">
			<?php 
				while ($row_ListKhu = mysqli_fetch_assoc($ListKhu)) {
			?>
				<option value="<?php echo $row_ListKhu['MA_KHU']?>" ><?php echo $row_ListKhu['TEN_KHU']?></option>
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