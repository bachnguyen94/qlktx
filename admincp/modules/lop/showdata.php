<?php
	require_once '../config/config.php';
	$query_list = "SELECT MA_KHOA,TEN_KHOA FROM khoa";
    $list = mysqli_query($quanlyktx,$query_list);
    if(!$list)
	{
		echo "không thể kết nối tới CSDL";
		exit();	
	}
	$will_page = !empty($_GET) ? $_GET : array();
	$will_page1 = http_build_query($will_page);
?>
<div class="row">
	<div class="col-md-5">
		<form method="POST" name="form" onchange="form.submit()">
			<div class="form-group">
				<select name="key" class="form-control">
					<option value="1">Tất cả</option>
					<?php while($row_list = mysqli_fetch_assoc($list)){ ?> 
						<option value="<?php echo $row_list['MA_KHOA'];?>" <?php if(isset($_POST['key'])&&$row_list['MA_KHOA']==$_POST['key']) echo ' selected' ?>><?php echo $row_list['TEN_KHOA']?></option>
					<?php } ?>
				</select>
			</div>
		</form>
	</div>
	<div class="col-md-offset-3 col-md-4">
		<form action="<?php echo 'index.php?'. $will_page1 ?>" method="POST">
			<div id="imaginary_container"> 
	            <div class="input-group stylish-input-group">
	                <input type="text" class="form-control"  placeholder="Search" name="TK">
	                <span class="input-group-addon">
	                    <button type="submit" name="search">
	                        <span class="glyphicon glyphicon-search"></span>
	                    </button>  
	                </span>
	            </div>
	        </div>
	    </form>
	</div>
</div>


<?php
	if(isset($_POST['key']))
	{
		$key = $_POST['key'];
		if($key == 1){$query_list = "SELECT * FROM lop ORDER BY MA_KHOA";}
		else{$query_list = "SELECT * FROM lop WHERE MA_KHOA='$key'";}
	    $list = mysqli_query($quanlyktx,$query_list);
	    if(!$list)
		{
			echo "không thể kết nối tới CSDL";
			exit();	
		}
	}
	else{
		if(isset($_POST['search'])){
			if(isset($_POST['TK'])){
				$tk = trim($_POST['TK']);
				$sql = "SELECT * FROM lop WHERE MA_LOP LIKE '%{$tk}%' OR TEN_LOP LIKE '%{$tk}%' OR SOLUONG_SV LIKE '%{$tk}%' OR GIAOVIEN_CN LIKE '%{$tk}%' OR MA_KHOA LIKE '%{$tk}%'";
				$list = mysqli_query($quanlyktx,$sql);
			}
			else{
				echo "Ban chua nhap thong tin";
			}
		}
		else{
			if(isset($_GET['makhoa'])){
				$makhoa = $_GET['makhoa'];
				$sql = "SELECT * FROM lop WHERE MA_KHOA='{$makhoa}'";
				$list = mysqli_query($quanlyktx,$sql);
			}else{
				$sql = "SELECT * FROM lop ORDER BY MA_KHOA";
				$list = mysqli_query($quanlyktx,$sql);
			}
		}
	}

?>




<div class="showdata">
		<h3 class="dskhoa" style="text-align:center;color:#73AD21">DANH SÁCH LỚP</h3>
		<div class="table">
			<table class="table table-hover table-bordered">
				<thead>
			      <tr style="background:#73AD21 ">
			      	<th>STT</th>
			        <th>MÃ LỚP</th>
			        <th>TÊN LỚP </th>
			        <th>SỐ LƯỢNG SINH VIÊN</th>
			        <th>GIÁO VIÊN CHỦ NHIỆM</th>
			        <th>MÃ KHOA</th>
			        <th colspan="2">THAO TÁC</th>
			      </tr>
			    </thead>
			    <tbody>
<?php
	$i = 1;
	while($row_list = mysqli_fetch_assoc($list))
	{
					$lop 	=  "index.php?quanly=sinhvien&ac=noaction&lop=".$row_list['MA_LOP'];
?>
					<tr class="active" id="<?php echo $row_list['MA_LOP']?>">
						<td><?php echo $i?></td>
				        <td><?php echo $row_list['MA_LOP']?></td>
				        <td><a href="<?php echo $lop ?>"><?php echo $row_list['TEN_LOP']?></a></td>
				        <td><?php echo $row_list['SOLUONG_SV']?></td>
				        <td><?php echo $row_list['GIAOVIEN_CN']?></td>
				        <td><?php echo $row_list['MA_KHOA']?></td>
				        <td><a href="index.php?quanly=lop&ac=sua&id=<?php echo $row_list['MA_LOP']?>">EDIT</a></td>
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
			<a href="index.php?quanly=lop&ac=them" class="btn btn-default btn-sm" style="width:150px">
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
	                    url : "modules/lop/xuly.php",
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
