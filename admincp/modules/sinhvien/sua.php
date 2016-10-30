<?php
	require_once('../config/config.php');
	if(isset($_GET['id']))
	{
		$id_sv = $_GET['id'];
		$query_list = "SELECT * FROM sinhvien WHERE MA_SV='{$id_sv}'";
		$query_ListLop = "SELECT MA_LOP, TEN_LOP FROM lop";
		$query_ListPhong = "SELECT MA_PHONG,SO_LUONG FROM phong WHERE SO_LUONG<=6";
	    $list = mysqli_query($quanlyktx,$query_list);
	    $ListLop = mysqli_query($quanlyktx,$query_ListLop);
	    $ListPhong = mysqli_query($quanlyktx,$query_ListPhong);
	    if(!$list)
		{
			echo "không thể kết nối tới CSDL";
			exit();	
		}	
		$row_list = mysqli_fetch_assoc($list);
?>
<div class="sua">
	<h2>SỬA</h2><br />
	<form class="form-horizontal" action="modules/sinhvien/xuly.php?id=<?php echo $row_list['MA_SV']?>" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_masv" class="col-sm-2 control-label">Mã Sinh Viên</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="masv" placeholder="Mã Khoa" value="<?php echo $row_list['MA_SV'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">Tên Sinh Viên</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="tensv" placeholder="Tên Sinh Viên" value="<?php echo $row_list['TEN_SV'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
		<label for="datetimepicker" class="col-sm-2 control-label">Ngày Sinh</label>
		<div class="col-xs-4">
    		<div class='input-group date' id='datetimepicker'>
        		<input type='text' class="form-control" name="ngaysinh" value="<?php echo $row_list['NGAY_SINH'] ?>"/>
        			<span class="input-group-addon">
            			<span class="glyphicon glyphicon-calendar"></span>
       				 </span>
   			</div>
		</div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Quê Quán</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="quequan" placeholder="Quê Quán" value="<?php echo $row_list['QUE_QUAN'] ?>"> 
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Giới Tính</label>
	    <div class="col-xs-3">
			<select class="form-control" name="gioitinh" placeholder="Sex">
				<?php if($row_list['GIOI_TINH'] =="Nữ"){
					echo "<option value='Nam'>Nam</option>";
					echo "<option value='Nữ' selected='selected'>Nữ</option>";
				}else{
					echo "<option value='Nữ'>Nữ</option>";
					echo "<option value='Nam' selected='selected'>Nam</option>";
				}
				?>
			</select>
		</div>
	  </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">TẠM TRÚ</label>
            <div class="col-sm-6">
                <select class="form-control" name="TT">
                <?php
					if($row_list['TT'] == 0){
						echo "<option value='1'>Đã ra ngoài</option>
                    			<option value='0' selected='selected'>Ở Ký Túc</option>";
					}
                    else{
						echo "<option value='1' selected='selected'>Đã ra ngoài</option>
                    			<option value='0'>Ở Ký Túc</option>";
					}
				?>
                </select>
            </div>
	  	</div>
	  <div class="form-group">
	    <label for="input_tenkhoa" class="col-sm-2 control-label">Niên Khóa</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="nienkhoa" placeholder="Niên Khóa" value="<?php echo $row_list['NIEN_KHOA'] ?>"> 
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_tenkhoa" class="col-sm-2 control-label">Chức Vụ</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="chucvu" placeholder="Chức Vụ" value="<?php echo $row_list['CHUC_VU'] ?>"> 
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Mã Lớp</label>
	    <div class="col-sm-6">
			<select class="form-control" name="malop">
			<?php 
				while ($row_ListLop = mysqli_fetch_assoc($ListLop)) {
					if($row_ListLop['MA_LOP']==$row_list['MA_LOP']){
						echo "<option value={$row_ListLop['MA_LOP']} selected='selected'>{$row_ListLop['TEN_LOP']}</option>";
					}
					else
					{
						echo "<option value={$row_ListLop['MA_LOP']}>{$row_ListLop['TEN_LOP']}</option>";
					}
				}
			?>
			</select>
		</div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Mã Phòng</label>
	    <div class="col-sm-6">
			<select class="form-control" name="maphong">
			<?php 
				while ($row_ListPhong = mysqli_fetch_assoc($ListPhong)) {
					if($row_list['MA_PHONG']==$row_ListPhong['MA_PHONG']){
						echo "<option value={$row_ListPhong['MA_PHONG']} selected='selected'>{$row_ListPhong['MA_PHONG']} -- số người:{$row_ListPhong['SO_LUONG']}</option>";
					}
					else
					{
						echo "<option value={$row_ListPhong['MA_PHONG']}>{$row_ListPhong['MA_PHONG']} -- số người:{$row_ListPhong['SO_LUONG']}</option>";
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


<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            locale:'en',
            format: 'YYYY-MM-DD'
        });
    });
</script>