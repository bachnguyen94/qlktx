<div class="table">
		<table class="table table-hover table-bordered">
			<thead>
		      <tr style="background:#73AD21 ">
		      	<th>STT</th>
		        <th>MÃ SINH VIÊN</th>
		        <th>TÊN SINH VIÊN</th>
		        <th>QUÊ QUÁN</th>
		        <th>GIỚI TÍNH</th>
		        <th>NIÊN KHÓA</th>
		        <th>LỚP</th>
		        <th>MÃ PHÒNG</th>
                <th>TÌNH TRẠNG</th>
		      </tr>
		    </thead>
		    <tbody>
	<?php
		$i=1;
		while($row_list = mysqli_fetch_assoc($list))
		{
	?>
			<tr class="active" id="<?php echo $row_list['MA_SV'] ?>">
				<td><?php echo $i?></td>
		        <td><?php echo $row_list['TEN_SV']?></td>
		        <td><?php echo $row_list['QUE_QUAN']?></td>
		        <td><?php echo $row_list['GIOI_TINH']?></td>
		        <td><?php echo $row_list['NIEN_KHOA']?></td>
		        <td><?php echo $row_list['CHUC_VU']?></td>
		        <td><?php echo $row_list['MA_LOP']?></td>
		        <td><?php echo $row_list['MA_PHONG']?></td>
	            <td><?php 
					if($row_list['TT'] == 0){
						echo "Ở trong KT";
					}
					else echo "Đã ra ngoài";
				?>
	            </td>
		    </tr>
<?php
		$i++;
		}
?>
		    </tbody>
		</table>
	</div>