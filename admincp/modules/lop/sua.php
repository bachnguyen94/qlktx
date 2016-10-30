<?php
	require_once('../config/config.php');
	if(isset($_GET['id']))
	{
		$id_lop = $_GET['id'];
		$query_list = "SELECT * FROM lop WHERE MA_LOP='{$id_lop}'";
		$QueryListKhoa = "SELECT MA_KHOA FROM khoa";
	    $list = mysqli_query($quanlyktx,$query_list);
	    $ListKhoa = mysqli_query($quanlyktx,$QueryListKhoa);
	    if(!$list)
		{
			echo "không thể kết nối tới CSDL";
			exit();	
		}	
		$row_list = mysqli_fetch_assoc($list);
?>
<div class="sua">
	<h2>Chỉnh Sửa</h2>
	<form class="form-horizontal" action="modules/lop/xuly.php?id=<?php echo $row_list['MA_LOP']?>" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_khoa" class="col-sm-2 control-label">MÃ LỚP</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="malop" placeholder="MÃ LỚP" value="<?php echo $row_list['MA_LOP'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">TÊN LỚP</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="tenlop" placeholder="TÊN LỚP" value="<?php echo $row_list['TEN_LOP'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">SỐ LƯỢNG SINH VIÊN</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="soluongsv" placeholder="SỐ LƯỢNG SINH VIÊN" value="<?php echo $row_list['SOLUONG_SV'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_tenkhoa" class="col-sm-2 control-label">GIÁO VIÊN CHỦ NHIỆM</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="gvcn" placeholder="GIÁO VIÊN CHỦ NHIỆM" value="<?php echo $row_list['GIAOVIEN_CN'] ?>"> 
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">MÃ KHOA</label>
	    <div class="col-sm-6">
			<select class="form-control" name="makhoa">
			<?php 
				while ($row_ListKhoa = mysqli_fetch_assoc($ListKhoa)) {
					if($row_list['MA_KHOA']==$row_ListKhoa['MA_KHOA']){
						echo "<option value='".$row_ListKhoa['MA_KHOA']."'". " selected='selected'>".$row_ListKhoa['MA_KHOA']."</option>";
					}
					else
					{
						echo "<option value='".$row_ListKhoa['MA_KHOA']."'>".$row_ListKhoa['MA_KHOA']."</option>";
					}
				}
			?>
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