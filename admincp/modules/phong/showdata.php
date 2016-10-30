<?php 
	require_once '../config/config.php';
	$query_khu = "SELECT MA_KHU,TEN_KHU From khu";
	$list_khu = mysqli_query($quanlyktx,$query_khu);
	$will_page = !empty($_GET) ? $_GET : array();
	$will_page1 = http_build_query($will_page);
?>	
<div class="row">
	<div class="col-md-5">
		<form method="POST" name="phong" onchange="phong.submit()">
			<div class="form-group">
				<select name="makhu" class="form-control">
					<option value="1">Tất cả</option>
					<?php while($row_list = mysqli_fetch_assoc($list_khu)){ ?> 
						<option value="<?php echo $row_list['MA_KHU'];?>" <?php if(isset($_POST['makhu'])&&$row_list['MA_KHU']==$_POST['makhu']) echo ' selected' ?>><?php echo $row_list['TEN_KHU']?></option>
					<?php } ?>
				</select>
			</div>
		</form>
	</div>
	<div class="col-md-offset-3 col-md-4">
		<form action="<?php echo 'index.php?'. $will_page1 ?>" method="POST">
			<div id="imaginary_container"> 
	            <div class="input-group stylish-input-group">
	                <input type="text" class="form-control"  placeholder="Search" name="TKP">
	                <span class="input-group-addon">
	                    <button type="submit" name="search-phong">
	                        <span class="glyphicon glyphicon-search"></span>
	                    </button>  
	                </span>
	            </div>
	        </div>
	    </form>
	</div>
</div>



<?php
	if(isset($_POST['makhu']))
	{
		$makhu = $_POST['makhu'];
		if($makhu == 1){$query_list = "SELECT * FROM phong ORDER BY MA_KHU";}
		else{$query_list = "SELECT * FROM phong WHERE MA_KHU='$makhu'";}
	    $list = mysqli_query($quanlyktx,$query_list);
	    if(!$list)
		{
			echo "không thể kết nối tới CSDL";
			exit();	
		}
	}
	if(isset($_POST['search-phong'])){
		if(isset($_POST['TKP'])){
			$tk = trim($_POST['TKP']);
			$sql = "SELECT MA_PHONG,TEN_PHONG,SO_LUONG,PHONG_TRUONG,MA_KHU FROM phong WHERE MA_PHONG LIKE '%{$tk}%' OR TEN_PHONG LIKE '%{$tk}%' OR SO_LUONG LIKE '%{$tk}%' OR PHONG_TRUONG LIKE '%{$tk}%' OR MA_KHU LIKE '%{$tk}%'";
			$list = mysqli_query($quanlyktx,$sql);
		}
		else{
			echo "Ban chua nhap thong tin";
		}
	}
	if(!isset($_POST['makhu'])&&!isset($_POST['search-phong'])){
		$sql = "SELECT * FROM phong ORDER BY MA_KHU";
		$list = mysqli_query($quanlyktx,$sql);
	}
?>



<div class="showdata">
		<h3 class="dskhoa" style="text-align:center;color:#73AD21">DANH SÁCH PHÒNG</h3>
		<div class="table">
			<table class="table table-hover table-bordered">
				<thead>
			      <tr style="background:#73AD21 ">
			      	<th>STT</th>
			        <th>MÃ PHÒNG</th>
			        <th>TÊN PHÒNG</th>
			        <th>SỐ LƯỢNG</th>
			        <th>TRƯỞNG PHÒNG</th>
			        <th>MÃ KHU</th>
			        <th colspan="2">THAO TÁC</th>
			      </tr>
			    </thead>
			    <tbody>
<?php
	$i = 1;
	while($row_list = mysqli_fetch_assoc($list))
	{
		$phong 	=  "index.php?quanly=sinhvien&ac=noaction&phong=".$row_list['MA_PHONG'];
		$tp 	=  "index.php?quanly=sinhvien&ac=noaction&tp=".$row_list['PHONG_TRUONG'];
?>
				<tr class="active" id="<?php echo $row_list['MA_PHONG']?>">
					<td><?php echo $i?></td>
			        <td><?php echo $row_list['MA_PHONG']?></td>
			        <td><a href="<?php echo $phong ?>"><?php echo $row_list['TEN_PHONG']?></a></td>
			        <td><?php echo $row_list['SO_LUONG']?></td>
			        <td><a href="<?php echo $tp ?>"><?php echo $row_list['PHONG_TRUONG']?></a></td>
			        <td><?php echo $row_list['MA_KHU']?></td>
			        <td><a href="index.php?quanly=phong&ac=sua&id=<?php echo $row_list['MA_PHONG']?>">EDIT</a></td>
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
			<a href="index.php?quanly=phong&ac=them" class="btn btn-default btn-sm" style="width:150px">
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
	                    url : "modules/phong/xuly.php",
	                    dataType: 'text',
	                    data : {
	                        id_xoa : id
	                    },
	                    cache: false,
	                    success: function()
	                    {
	                        parent.fadeOut('slow', function() {$(this).remove();});
	                        location.reload();
	                    }
                    }
                );
            };
        });
    });

	function goBack() {
	    window.history.back();
	}
</script>
