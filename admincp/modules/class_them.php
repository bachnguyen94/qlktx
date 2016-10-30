<?php
	class them
	{
		$Arr_Khoa = array('Mã Khoa', 'Mã Ngành', 'Mô Tả Khoa', 'Tên Khoa');
		$Arr_NameKhoa = array('makhoa', 'manganh', 'motakhoa', 'tenkhoa');

		$Arr_NameLop = array('malop', 'tenlop','soluongsv','giaoviencn','makhoa');
		$Arr_Lop = array('Mã Lớp', 'Tên Lớp', 'Giáo Viên Chủ Nhiệm', 'Mã Khoa');

		$Arr_NameKhu = array('makhu', 'tenkhu','sophong');
		$Arr_Khu = array('Mã Khu', 'Tên Khu', 'Số Phòng');

		$Arr_NamePhong = array('maphong', 'tenphong', 'soluong', 'truongphong', 'makhu');
		$Arr_Phong = array('Mã Phòng','Tên Phòng', 'Số Lượng', 'Trưởng Phòng', 'Mã Khu');


		function PrintFrormThem(($Arr, $Arr_NameField, $table_name)
		{
			$i = 0;
			$_Arr = $Arr;
			$_Arr_NameField = $_Arr_NameField;
			echo 
				'<div class="them">
					<h2>Thêm Mới </h2><br />
					<form class="form-horizontal" action="modules/{$table_name}/xuly.php" method="POST" enctype="multipart/form-data">';
			for($i=0;$i<$_Arr.length();$i++)
			{
				echo 'div class="form-group">
					    <label for="input_khoa" class="col-sm-2 control-label">{$_Arr[i]}</label>
					    <div class="col-sm-6">
					      <input type="text" class="form-control" name="{$_Arr_NameField[i]}" placeholder="Mã Khoa">
					    </div>
					  </div>';
			}
			echo
				'<div class="form-group">
			    	<div class="col-sm-offset-2 col-sm-10">
			      		<button type="submit" class="btn btn-default" name="them">Submit</button>
			      		<button type="submit" class="btn btn-default" onclick="goBack()">Hủy</button>
			    	</div>
			  	</div>
			</form>
		</div>';
		}
	}
?>