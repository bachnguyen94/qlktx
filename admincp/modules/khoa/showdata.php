<?php
	require_once '../config/config.php';
	$query_listkhoa = "SELECT * FROM khoa ";
    $listkhoa = mysqli_query($quanlyktx,$query_listkhoa);
    if(!$listkhoa)
	{
		echo "không thể kết nối tới CSDL";
		exit();	
	}
?>
<div class="showdata">
		<h3 class="dskhoa" style="text-align:center;color:#73AD21">DANH SÁCH KHOA</h3>
		<div class="table">
			<table class="table table-hover table-bordered">
				<thead>
			      <tr style="background:#73AD21 ">
			      	<th style="text-align: justify;">STT</th>
			        <th>MÃ KHOA</th>
			        <th>MÃ NGÀNH</th>
			        <th>MÔ TẢ KHOA</th>
			        <th>TÊN KHOA</th>
			        <th colspan="2">THAO TÁC</th>
			      </tr>
			    </thead>
			    <tbody>
<?php
	$i = 1;
	while($row_listkhoa = mysqli_fetch_assoc($listkhoa))
	{
?>
					<tr class="active" id="<?php echo $row_listkhoa['MA_KHOA']?>">
						<td><?php echo $i?></td>
				        <td><?php echo $row_listkhoa['MA_KHOA']?></td>
				        <td><?php echo $row_listkhoa['MA_NGANH']?></td>
<?php
	$motakhoa = substr( $row_listkhoa['MO_TA_KHOA'],  0, 94 );
	$khoa = "index.php?quanly=lop&ac=noaction&makhoa=".$row_listkhoa['MA_KHOA'];
?>
				        <td><?php echo $motakhoa ?></td>
				        <td><a href="<?php echo $khoa ?>"><?php echo $row_listkhoa['TEN_KHOA']?></a></td>
				        <td><a href="index.php?quanly=khoa&ac=sua&id=<?php echo $row_listkhoa['MA_KHOA']?>">EDIT</a></td>
				        <td><a href="#" class="xoa">DEL</a></td>
				    </tr>
<?php
	$i++;
	}
	
?>
		    </tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-4">
			<a href="index.php?quanly=khoa&ac=them" class="btn btn-default btn-sm" style="width:150px">
	          <span class="glyphicon glyphicon-plus"></span> ADD
	        </a>
	    </div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
        $("a.xoa").click(function(){
            if(confirm("Bạn có chắc chắn muốn xóa")){
                var id = $(this).parent().parent().attr('id');
                var data = id;
                var parent = $(this).parent().parent();
                
                $.ajax(
                    {
	                    type: "GET",
	                    url : "modules/khoa/xuly.php",
	                    dataType: 'text',
	                    data : {
	                        id_xoa : id
	                    },
	                    cache: false,
	                    success: function()
	                    {
	                        parent.fadeOut('slow', function() {$(this).remove();});
	                        //location.reload();
	                    }
                    }
                );
            };
        });
    });
</script>
