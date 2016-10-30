<?php
	require_once '../config/config.php';
	$query_list = "SELECT tl.id,tl.ten,tl.trangthai,lt.tenloaitin FROM theloai tl JOIN loaitin lt ON tl.idloaitin=lt.idloaitin";
    $list = mysqli_query($quanlyktx,$query_list);
?>
<div class="showdata">
		<h3 class="dskhoa" style="text-align:center;color:#73AD21">DANH SÁCH THỂ LOẠI</h3>
		<div class="table">
			<table class="table table-hover table-bordered">
				<thead>
			      <tr style="background:#73AD21 ">
			      	<th style="text-align: justify;">ID</th>
			        <th>TÊN THỂ LOẠI</th>
			        <th>ID LOẠI TIN</th>
			        <th>TRẠNG THÁI</th>
			        <th colspan="2">THAO TÁC</th>
			      </tr>
			    </thead>
			    <tbody>
<?php
	while($row_list = mysqli_fetch_assoc($list))
	{
?>
					<tr class="active" id="<?php echo $row_list['id']?>" >
						<td><?php echo $row_list['id']?></td>
				        <td><?php echo $row_list['ten']?></td>
				        <td><?php echo $row_list['tenloaitin']?></td>
				        <td><?php echo $row_list['trangthai'] ?></td>
				        <td><a href="index.php?quanly=theloai&ac=sua&id=<?php echo $row_list['id']?>">EDIT</a></td>
				        <td><a href="#" class="xoa">DEL</a></td>
				    </tr>
<?php
	}
?>
		    </tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-4">
			<a href="index.php?quanly=theloai&ac=them" class="btn btn-default btn-sm" style="width:150px">
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
	                    url : "modules/theloai/xuly.php",
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
