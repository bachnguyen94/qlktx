<?php
	require_once('../config/config.php');
	//include("modules/editor/editor1.php");
	if(isset($_GET['id']))
	{
		$id_tin = $_GET['id'];
		$query_list = "SELECT * FROM tintuc WHERE id='{$id_tin}'";
		$query_ListTheLoai = "SELECT id,ten FROM theloai";
	    $list = mysqli_query($quanlyktx,$query_list);
	    $ListTheLoai = mysqli_query($quanlyktx,$query_ListTheLoai);
	    if(!$list)
		{
			echo "không thể kết nối tới CSDL";
			exit();	
		}	
		$row_list = mysqli_fetch_assoc($list);
?>
<div class="sua">
	<h2>CHỈNH SỬA</h2><br />
	<form class="form-horizontal" action="modules/tintuc/xuly.php?id=<?php echo $row_list['id']?>" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_masv" class="col-sm-2 control-label">TÊN BÀI VIẾT</label>
	    <div class="col-sm-6">
	      <input class="form-control" name="TenBaiViet" placeholder="TÊN BÀI VIẾT" value="<?php echo $row_list['tentin'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">ẢNH MINH HỌA</label>
	    <div class="col-sm-6">
	      <input type="file" class="form-control" name="AnhMinhHoa" placeholder="ẢNH MINH HỌA">
	      <img src="<?php echo '../'.$row_list['anhminhhoa']?>" width="160px">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_motakhoa" class="col-sm-2 control-label">TÓM TẮT</label>
	    <div class="col-sm-8">
	      <textarea class="form-control ckeditor" rows="5" cols="250" name="TomTat" placeholder="TÓM TẮT"><?php echo $row_list['tomtat']?></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_motakhoa" class="col-sm-2 control-label">NỘI DUNG</label>
	    <div class="col-sm-8">
	      <textarea class="form-control ckeditor" rows="30" cols="250" name="NoiDung" placeholder="NỘI DUNG"><?php echo $row_list['noidung']?></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">THỂ LOẠI</label>
	    <div class="col-sm-6">
			<select class="form-control" name="TheLoai">
			<?php 
				while ($row_ListTheLoai = mysqli_fetch_assoc($ListTheLoai)) {
					if($row_ListTheLoai['id'] == $row_list['idtheloai']){
						echo "<option value={$row_ListTheLoai['id']} selected='selected'>{$row_ListTheLoai['ten']}</option>";
					}
					else
					{
						echo "<option value={$row_ListTheLoai['id']}>{$row_ListTheLoai['ten']}</option>";
					}
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>     
<script src="../css/bootstrap/js/en.js" type="text/javascript"></script>
<script src="../css/bootstrap/js/moment.js" type="text/javascript"></script>

<script src="../css/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../css/bootstrap/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>


<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            locale:'en',
            format: 'YYYY-MM-DD'
        });
    });
</script>