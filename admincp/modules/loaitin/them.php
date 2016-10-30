<div class="them">
	<h2>Thêm Mới</h2>
	<form class="form-horizontal" action="modules/loaitin/xuly.php" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_motaloaitin" class="col-sm-2 control-label">TÊN LOẠI TIN</label>
	    <div class="col-sm-6">
	      <textarea class="form-control" rows="5" name="tenloaitin"></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">TRẠNG THÁI</label>
	    <div class="col-xs-3">
			<select class="form-control" name="trangthai">
				<option value="0">Không hiển thị</option>
				<option value="1" selected="selected">Hiển thị</option>
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