<?php
	class sua
	{
		$Arr_Khoa = array('Mã Khoa', 'Mã Ngành', 'Mô Tả Khoa', 'Tên Khoa');
		$Arr_NameKhoa = array('makhoa', 'manganh', 'motakhoa', 'tenkhoa');

		$Arr_NameLop = array('malop', 'tenlop','soluongsv','giaoviencn','makhoa');
		$Arr_Lop = array('Mã Lớp', 'Tên Lớp', 'Giáo Viên Chủ Nhiệm', 'Mã Khoa');

		$Arr_NameKhu = array('makhu', 'tenkhu','sophong');
		$Arr_Khu = array('Mã Khu', 'Tên Khu', 'Số Phòng');

		$Arr_NamePhong = array('maphong', 'tenphong', 'soluong', 'truongphong', 'makhu');
		$Arr_Phong = array('Mã Phòng','Tên Phòng', 'Số Lượng', 'Trưởng Phòng', 'Mã Khu');

		$Arr_NameSinhVien = array('masv', 'tensv', 'ngaysinh', 'quequan', 'gioitinh', 'nienkhoa', 'chucvu', 'malop', 'maphong');
		$Arr_SinhVien = array('Mã Sinh Viên', 'Tên Sinh Viên', 'Ngày Sinh', 'Quê Quán', 'Giới Tính', 'Niên Khóa', 'Chức Vụ', 'Mã Lớp', 'Mã Phòng');
		
	}
	function PrintFormSua($Arr, $Arr_NameField, $table_name)
	{
		$i = 0;
		$_Arr = $Arr;
		$_Arr_NameField = $Arr_namefield;
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			require_once('../config/config.php');
			$query_list = "SELECT * FROM {$table_name} WHERE $key='{$id}'";
		    $list = mysql_query($query_list,$quanlyktx);
		    if(!$list)
			{
				echo "không thể kết nối tới CSDL";
				exit();	
			}	
			$Row_List = mysql_fetch_assoc($listkhoa);
		}
		echo 
		"<div class='sua'>
			<h2>Chỉnh Sửa</h2>
			<form class='form-horizontal' action='modules/{$table_name}/xuly.php?id={$id}' method='POST' enctype='multipart/form-data'>";
			foreach ($Row_List as $key => $value) 
			{
				echo 
				'<div class="form-group">
				    <label for="input_khoa" class="col-sm-2 control-label">{$_Arr}</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control" name="{$_Arr_NameField[i]}" placeholder="{$_Arr}" value="{$value}">
				    </div>
				 </div>';
				 $i++;
			}
			echo
				'<div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default" name="sua">Submit</button>
			      <button type="submit" class="btn btn-default" onclick="goBack()">Hủy</button>
			    </div>
			  </div>
			</form>
		</div>';
	}
?>