<?php
	require_once('../config/config.php');
	$query_ListLop = "SELECT MA_LOP, TEN_LOP FROM lop";
	$query_ListPhong = "SELECT MA_PHONG,SO_LUONG FROM phong WHERE SO_LUONG<6"; 
	$ListLop = mysqli_query($quanlyktx,$query_ListLop);
	$ListPhong = mysqli_query($quanlyktx,$query_ListPhong);
?>
<div class="them">
	<h2>Thêm Mới </h2><br />
	<form class="form-horizontal" action="modules/sinhvien/xuly.php" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Mã Sinh Viên</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="masv" placeholder="Mã Sinh Viên">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Tên Sinh Viên</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="tensv" placeholder="Tên Sinh Viên">
	    </div>
	  </div>
	  <div class="form-group">
		<label for="datetimepicker" class="col-sm-2 control-label">Ngày Sinh</label>
		<div class="col-xs-4">
    		<div class='input-group date' id='datetimepicker'>
        		<input type='text' class="form-control" name="ngaysinh" />
        			<span class="input-group-addon">
            			<span class="glyphicon glyphicon-calendar"></span>
       				 </span>
   			</div>
		</div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Quê Quán</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="quequan" placeholder="Quê Quán"> 
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Giới Tính</label>
	    <div class="col-xs-2">
			<select class="form-control" name="gioitinh" placeholder="Sex">
				<option value="Nam">Nam</option>
				<option value="Nữ" selected="selected">Nữ</option>
			</select>
		</div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Niên Khóa</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="nienkhoa" placeholder="Niên Khóa"> 
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Chức Vụ</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="chucvu" placeholder="Chức Vụ"> 
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Tên Lớp</label>
	    <div class="col-sm-6">
			<select class="form-control" name="malop">
			<?php 
				while ($row_ListLop = mysqli_fetch_assoc($ListLop)) {
			?>
				<option value="<?php echo $row_ListLop['MA_LOP']?>"><?php echo $row_ListLop['TEN_LOP']?></option>
			<?php 
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
			?>
				<option value="<?php echo $row_ListPhong['MA_PHONG']?>"><?php echo $row_ListPhong['MA_PHONG'].' -- số người: '.$row_ListPhong['SO_LUONG']?></option>
			<?php 
				}
			?>
			</select>
		</div>
       </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">TẠM TRÚ</label>
            <div class="col-sm-6">
                <select class="form-control" name="TT">
                    <option value="1">Đã ra ngoài</option>
                    <option value="0" selected="selected">Ở Ký Túc</option>
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


<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            locale:'en',
            format: 'YYYY-MM-DD'
        });
    });
</script>