<div class="them">
	<h2>Thêm Mới</h2>
	<form class="form-horizontal" action="modules/khu/xuly.php" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_khoa" class="col-sm-2 control-label">Mã Khu</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="makhu" placeholder="Mã khu">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">Tên Khu</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="tenkhu" placeholder="Tên Khu">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">Số Phòng</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="sophong" placeholder="Số Phòng">
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