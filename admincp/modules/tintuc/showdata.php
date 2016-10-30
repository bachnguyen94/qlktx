<?php
	require_once '../config/config.php';
	include 'modules/phantrang.php';
	$query_list = "SELECT * FROM tintuc ";
    $list = mysqli_query($quanlyktx,$query_list);
    /*if(!$listkhoa)
	{
		echo "không thể kết nối tới CSDL";
		exit();	
	}*/
	$will_page = !empty($_GET) ? $_GET : array();
	$will_page1 = http_build_query($will_page);
?>
<div class="showdata">
	<br />
	<div class="containe">
		<form action="<?php echo 'index.php?'. $will_page1 ?>" method="POST">
			<div class="row">
		        <div class="col-md-4 col-md-offset-7">
		            <div id="imaginary_container"> 
		                <div class="input-group stylish-input-group">
		                    <input type="text" class="form-control"  placeholder="Search" name="TimKiem">
		                    <span class="input-group-addon">
		                        <button type="submit" name="search">
		                            <span class="glyphicon glyphicon-search"></span>
		                        </button>  
		                    </span>
		                </div>
		            </div>
		        </div>
			</div>
		</form>
	</div>
	<br />
	<h3 class="dskhoa" style="text-align:center;color:#73AD21">DANH SÁCH BÀI VIẾT</h3>
	<div class="table">
		<table class="table table-hover table-bordered">
			<thead>
		      <tr style="background:#73AD21 ">
		      	<th>STT</th>
		        <th>TÊN BÀI VIẾT</th>
		        <th>ẢNH MINH HỌA</th>
		        <th>TÓM TẮT</th>
		        <th>THỂ LOẠI</th>
		        <th>TRẠNG THÁI</th>
		        <th colspan="2">THAO TÁC</th>
		      </tr>
		    </thead>
		    <tbody>
<?php
	$i = 1;
	$PT = new phantrang;
	if(isset($_POST['search']))
	{
		if(!empty($_POST['TimKiem']))
		{
			$TimKiem = $_POST['TimKiem'];
			$sql = "SELECT tt.id,tt.tentin,tt.anhminhhoa,tt.tomtat,tl.ten,tt.trangthai FROM tintuc tt JOIN theloai tl ON tt.idtheloai=tl.id WHERE tt.tentin LIKE '%{$TimKiem}%' OR tl.ten LIKE '%{$TimKiem}%'";
		}
	}
	else
	{
		$sql = "SELECT tt.id,tt.tentin,tt.anhminhhoa,tt.tomtat,tl.ten,tt.trangthai FROM tintuc tt JOIN theloai tl WHERE tt.idtheloai=tl.id";
	}
	$result = mysqli_query($quanlyktx,$sql);

	$total_record = mysqli_num_rows($result);
	$limit = 4;


	$will_page = !empty($_GET) ? $_GET : array();

	$will_page1 = http_build_query($will_page);
	//if(!preg_match("/id/",$will_page1))
	if(!isset($_GET['page']))
	{
		$will_page1 = $will_page1.'&page=';
	}
	else
	{
		$will_page1 = substr($will_page1, 0,(strlen($will_page1)-1));
	}

	$config = array('TotalRecord'=> $total_record,
					'PerPage'=>$limit,
					'CurrentPage'=>isset($_GET['page'])?$_GET['page']:1,
					'LinkFirst' => "index.php?$will_page1"."1",
					'LinkFull' => "index.php?$will_page1"
				);
	$PT->init($config);
	$start = $PT->Start;
	$sql = $sql." ORDER BY id LIMIT $start, $limit";
	$list = mysqli_query($quanlyktx,$sql);
	while($row_list = mysqli_fetch_assoc($list))
	{
?>
		<tr class="active" id="<?php echo $row_list['id']?>">
			<td><?php echo $i?></td>
	        <td><?php echo $row_list['tentin']?></td>
	        <td><img src="<?php echo '../'.$row_list['anhminhhoa']?>" width="160"/></td>
	        <td><?php echo $row_list['tomtat']?></td>
	        <td><?php echo $row_list['ten']?></td>
	        <td><?php echo $row_list['trangthai']?></td>
	        <td><a href="index.php?quanly=tintuc&ac=sua&id=<?php echo $row_list['id']?>">EDIT</a></td>
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
			<a href="index.php?quanly=tintuc&ac=them" class="btn btn-default btn-sm" style="width:150px">
	          <span class="glyphicon glyphicon-plus"></span> ADD
	        </a>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-8">
			<?php $PT->PrintDS(3) ?>
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
	                    url : "modules/tintuc/xuly.php",
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
