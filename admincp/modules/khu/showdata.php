<?php
	require_once '../config/config.php';
	$query_list = "SELECT * FROM khu";
    $list = mysqli_query($quanlyktx,$query_list);
    if(!$list)
	{
		echo "không thể kết nối tới CSDL";
		exit();	
	}
?>
<div class="showdata">
		<h3 class="dskhoa" style="text-align:center;color:#73AD21">DANH SÁCH KHU</h3>
		<div class="table">
			<table class="table table-hover table-bordered">
				<thead>
			      <tr style="background:#73AD21 ">
			      	<th>STT</th>
			        <th>MÃ KHU</th>
			        <th>TÊN KHU</th>
			        <th>SỐ PHÒNG</th>
			        <th colspan="2">THAO TÁC</th>
			      </tr>
			    </thead>
			    <tbody>
<?php
	$i = 1;
	while($row_list = mysqli_fetch_assoc($list))
	{
?>
					<tr class="active" id="<?php echo $row_list['MA_KHU']?>">
						<td><?php echo $i?></td>
				        <td><?php echo $row_list['MA_KHU']?></td>
				        <td><?php echo $row_list['TEN_KHU']?></td>
				        <td><?php echo $row_list['SO_PHONG']?></td>
				        <td><a href="index.php?quanly=khu&ac=sua&id=<?php echo $row_list['MA_KHU']?>">EDIT</a></td>
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
			<a href="index.php?quanly=khu&ac=them" class="btn btn-default btn-sm" style="width:150px">
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
	                    url : "modules/khu/xuly.php",
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
