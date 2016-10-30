<?php
	class show
	{
		$Arr_Khoa = array('Mã Khoa', 'Mã Ngành', 'Mô Tả Khoa', 'Tên Khoa');
		$Arr_Lop = array('Mã Lớp', 'Tên Lớp', 'Giáo Viên Chủ Nhiệm', 'Mã Khoa');
		$Arr_Khu = array('Mã Khu', 'Tên Khu', 'Số Phòng');
		$Arr_Phong = array('Mã Phòng','Tên Phòng', 'Số Lượng', 'Trưởng Phòng', 'Mã Khu');
		
		function ShowTable($Table_Name,$Arr_th)
		{
			$i = 0;
			$j = 1;
			require_once '../config/config.php';
			$query_listkhoa = "SELECT * FROM khoa ";
		    $listkhoa = mysql_query($query_listkhoa,$quanlyktx);
		    if(!$listkhoa)
			{
				echo "không thể kết nối tới CSDL";
				exit();	
			}
			echo 
			'<div class="showdata">
				<h3 class="dskhoa" style="text-align:center;color:#73AD21">DANH SÁCH</h3>
				<div class="table">
					<table class="table table-hover table-bordered">
				<thead>';
			echo 
			'<tr style="background:#73AD21 ">
			      	<th>STT</th>';
			for($i=0;$i<$Arr_th.length();$i++)
			{
				echo '<th>{$Arr_th[$i]}</th>';
			}
			echo 
			'<th colspan="2">THAO TÁC</th>
			      </tr>
			    </thead>
			    <tbody>';
			while($row_list = mysql_fetch_assoc($list))
			{
				$k == 0;
				echo 
				'<tr class="active">
					<td>{$j}</td>';
				foreach ($row_list as $key => $value) {
					echo '<td>{$value}</td>';     					
				}
				foreach ($row_list as $key => $value) 
				{
					if($k=0){
						echo 
						'<td><a href="index.php?quanly={$Table_Name}&ac=sua&id={$value}">EDIT</a></td>
						        <td><a href="modules/{$Table_Name}/xuly.php?xoa=true&id={$value}" onclick="mconfirm()" class="delete-link">DEL</a></td>
						    </tr>';
					}
				}
				$j++;
				$k++;
			}
			echo 
			'/tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-md-4">
					<a href="index.php?quanly={$Table_Name}&ac=them" class="btn btn-default btn-sm" style="width:150px">
			          <span class="glyphicon glyphicon-plus"></span> ADD
			        </a>
			    </div>
			</div>';
		}
	}
?>
