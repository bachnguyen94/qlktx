<?php
	require_once('../config/config.php');
	if(isset($_GET['id']))
	{
		$id_phong = $_GET['id'];
		$query_list = "SELECT * FROM phong WHERE MA_PHONG='{$id_phong}'";
		$query_listkhu = "SELECT MA_KHU,TEN_KHU FROM khu";
	    $list = mysqli_query($quanlyktx,$query_list);
	    $ListKhu = mysqli_query($quanlyktx,$query_listkhu);
	    if(!$list)
		{
			echo "không thể kết nối tới CSDL";
			exit();	
		}	
		$row_list = mysqli_fetch_assoc($list);
?>
<div class="sua">
	<h2>Chỉnh Sửa</h2>
	<form class="form-horizontal" action="modules/phong/xuly.php?id=<?php echo $row_list['MA_PHONG']?>" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_khoa" class="col-sm-2 control-label">Mã Phòng</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="maphong" placeholder="Mã Phòng" value="<?php echo $row_list['MA_PHONG'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">Tên Phòng</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="tenphong" placeholder="Tên Phòng" value="<?php echo $row_list['TEN_PHONG'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">Số Lượng</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="soluong" placeholder="Số Lượng" value="<?php echo $row_list['SO_LUONG'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_tenkhoa" class="col-sm-2 control-label">Trưởng Phòng</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="truongphong" placeholder="Trưởng Phòng" value="<?php echo $row_list['PHONG_TRUONG'] ?>"> 
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">MÃ KHU</label>
	    <div class="col-sm-6">
			<select class="form-control" name="makhu">
			<?php 
				while ($row_ListKhu = mysqli_fetch_assoc($ListKhu)) {
					if($row_ListKhu['MA_KHU']==$row_List['MA_KHU']){
						echo "<option value='".$row_ListKhu['MA_KHU']."'". "selected='selected'>".$row_ListKhu['TEN_KHU']."</option>";
					}
					else
					{
						echo "<option value='".$row_ListKhu['MA_KHU']."'>".$row_ListKhu['TEN_KHU']."</option>";
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