<div class="them">
	<h2>Thêm Mới </h2><br />
	<form class="form-horizontal" action="modules/khoa/xuly.php" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_khoa" class="col-sm-2 control-label">Mã Khoa</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="makhoa" placeholder="Mã Khoa">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">Mã Ngành</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="manganh" placeholder="Mã Ngành">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_motakhoa" class="col-sm-2 control-label">Mô Tả Khoa</label>
	    <div class="col-sm-6">
	      <textarea class="form-control ckeditor" rows="5" name="motakhoa" ></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_tenkhoa" class="col-sm-2 control-label">Tên Khoa</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="tenkhoa" placeholder="Tên Khoa"> 
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