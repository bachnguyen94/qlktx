<?php
	require_once('../config/config.php');
	//include("modules/editor/editor1.php");

	$query_ListTheLoai = "SELECT id,ten FROM theloai";
    $ListTheLoai = mysqli_query($quanlyktx,$query_ListTheLoai);
    if(!$ListTheLoai)
	{
		echo "không thể kết nối tới CSDL";
		exit();	
	}	
?>
<div class="them">
	<h2>Thêm Mới </h2><br />
	<form class="form-horizontal" action="modules/tintuc/xuly.php" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">TÊN BÀI VIẾT</label>
	    <div class="col-sm-6">
	      <input class="form-control" name="TenBaiViet" placeholder="TÊN BÀI VIẾT">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">ẢNH MINH HỌA</label>
	    <div class="col-sm-6">
	      <input type="file" class="form-control" name="AnhMinhHoa" placeholder="ẢNH MINH HỌA">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">TÓM TẮT</label>
	    <div class="col-sm-8">
	      <textarea class="form-control ckeditor" rows="5" cols="250" name="TomTat" placeholder="TÓM TẮT"></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-md-2 control-label">NỘI DUNG</label>
	    <div class="col-sm-8">
	      <textarea class="form-control ckeditor" rows="30" cols="250" name="NoiDung" placeholder="NỘI DUNG"></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">THỂ LOẠI</label>
	    <div class="col-sm-6">
			<select class="form-control" name="TheLoai">
			<?php 
				while ($row_ListTheLoai = mysqli_fetch_assoc($ListTheLoai)) {
					echo "<option value='".$row_ListTheLoai['id']."'>".$row_ListTheLoai['ten']."</option>";
				}
			?>
			</select>
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
