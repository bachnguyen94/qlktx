<?php
	require_once '../config/config.php';
	include 'modules/phantrang.php';
	$query_listkhoa = "SELECT * FROM sinhvien ORDER BY MA_LOP";
    $listkhoa = mysqli_query($quanlyktx,$query_listkhoa);
    /*if(!$listkhoa)
	{
		echo "không thể kết nối tới CSDL";
		exit();	
	}*/
?>
<div class="showdata">
	<br />
	<div class="space"></div>
	<div class="row">
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
			<div class="row">
		        <div class="col-sm-4 col-md-offset-7">
		            <div id="imaginary_container"> 
		                <div class="input-group stylish-input-group">
		                    <input type="text" class="form-control"  placeholder="Search" name="TKSV">
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
	<h3 class="dskhoa" style="text-align:center;color:#73AD21">DANH SÁCH SINH VIÊN</h3>
	<div class="table">
		<table class="table table-hover table-bordered">
			<thead>
		      <tr style="background:#73AD21 ">
		      	<th>STT</th>
		        <th>MÃ SINH VIÊN</th>
		        <th>TÊN SINH VIÊN</th>
		        <th>NGÀY SINH</th>
		        <th>QUÊ QUÁN</th>
		        <th>GIỚI TÍNH</th>
		        <th>NIÊN KHÓA</th>
		        <th>CHỨC VỤ</th>
		        <th>MÃ LỚP</th>
		        <th>MÃ PHÒNG</th>
                <th>TÌNH TRẠNG</th>
		        <th colspan="2">THAO TÁC</th>
		      </tr>
		    </thead>
		    <tbody>
<?php
	$PT = new phantrang;
	$limit = 9;
	if(isset($_GET['page'])){
		$i = (($_GET['page']-1) * $limit) +1;
	}
	else{
		$i =1;
	}
	if(isset($_GET['search']))
	{
		if(!empty($_GET['TKSV']))
		{
			$TKSV = trim($_GET['TKSV']);
			$sql = "SELECT sv.MA_SV,sv.TEN_SV,sv.NGAY_SINH,sv.QUE_QUAN,sv.GIOI_TINH,sv.NIEN_KHOA,sv.CHUC_VU,sv.MA_LOP,sv.MA_PHONG,sv.TT,l.TEN_LOP,k.TEN_KHOA FROM sinhvien sv JOIN lop l ON sv.MA_LOP=l.MA_LOP 
		JOIN khoa k ON l.MA_KHOA=k.MA_KHOA WHERE sv.MA_SV LIKE '%{$TKSV}%' OR sv.TEN_SV LIKE '%{$TKSV}%' OR sv.MA_LOP LIKE '%{$TKSV}%' OR sv.MA_PHONG LIKE '%{$TKSV}%'";
		}
	}
	else if(isset($_GET['phong'])){                 /*--------hien thi sinh vien theo phong---------*/
		$getphong = $_GET['phong'];
		$sql = "SELECT sv.MA_SV,sv.TEN_SV,sv.NGAY_SINH,sv.QUE_QUAN,sv.GIOI_TINH,sv.NIEN_KHOA,sv.CHUC_VU,sv.MA_LOP,sv.MA_PHONG,sv.TT,l.TEN_LOP,k.TEN_KHOA FROM sinhvien sv
		JOIN lop l ON sv.MA_LOP=l.MA_LOP 
		JOIN khoa k ON l.MA_KHOA=k.MA_KHOA
		WHERE sv.MA_PHONG='{$getphong}'";
		$list = mysqli_query($quanlyktx,$sql);
	}
	else if(isset($_GET['tp'])){
		$tp =  $_GET['tp'];
		$sql = "SELECT sv.MA_SV,sv.TEN_SV,sv.NGAY_SINH,sv.QUE_QUAN,sv.GIOI_TINH,sv.NIEN_KHOA,sv.CHUC_VU,sv.MA_LOP,sv.MA_PHONG,sv.TT,l.TEN_LOP,k.TEN_KHOA FROM sinhvien sv  JOIN lop l ON sv.MA_LOP=l.MA_LOP JOIN khoa k ON l.MA_KHOA=k.MA_KHOA WHERE TEN_SV='{$tp}'";
		$list = mysqli_query($quanlyktx,$sql);
	}
	else if(isset($_GET['lop'])){
		$lop = $_GET['lop'];
		$sql = "SELECT sv.MA_SV,sv.TEN_SV,sv.NGAY_SINH,sv.QUE_QUAN,sv.GIOI_TINH,sv.NIEN_KHOA,sv.CHUC_VU,sv.MA_LOP,sv.MA_PHONG,sv.TT,l.MA_LOP,l.TEN_LOP,k.TEN_KHOA FROM sinhvien sv  JOIN lop l ON sv.MA_LOP=l.MA_LOP JOIN khoa k ON l.MA_KHOA=k.MA_KHOA WHERE l.MA_LOP='{$lop}'";
		$list = mysqli_query($quanlyktx,$sql);
	}
	else
	{
		$sql = "SELECT sv.MA_SV,sv.TEN_SV,sv.NGAY_SINH,sv.QUE_QUAN,sv.GIOI_TINH,sv.NIEN_KHOA,sv.CHUC_VU,sv.MA_LOP,sv.MA_PHONG,sv.TT,l.TEN_LOP,k.TEN_KHOA FROM sinhvien sv JOIN lop l ON sv.MA_LOP=l.MA_LOP JOIN khoa k ON l.MA_KHOA=k.MA_KHOA";
	}
	$result = mysqli_query($quanlyktx,$sql);
	$total_record = mysqli_num_rows($result);

	
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
	$sql = $sql." ORDER BY TEN_SV LIMIT $start, $limit";

	$list = mysqli_query($quanlyktx,$sql);
	while($row_list = mysqli_fetch_assoc($list))
	{
?>
		<tr class="active" id="<?php echo $row_list['MA_SV'] ?>">
			<td><?php echo $i?></td>
	        <td><?php echo $row_list['MA_SV']?></td>
	        <td>
	        	<?php echo "<a href='' onmouseover=TagToTip($i) onmouseout='UnTip()'>".$row_list['TEN_SV']."</a>"?>
	        	<div id="<?php echo $i?>" class="tooltip">
					<p><?php echo $row_list['TEN_LOP']?></p>
					<p><?php echo $row_list['TEN_KHOA']?></p>
	        	</div>
	        </td>
	        <td><?php echo $row_list['NGAY_SINH']?></td>
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
	        <td><a href="index.php?quanly=sinhvien&ac=sua&id=<?php echo $row_list['MA_SV']?>">EDIT</a></td>
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
			<a href="index.php?quanly=sinhvien&ac=them" class="btn btn-default btn-sm" style="width:150px">
	          <span class="glyphicon glyphicon-plus"></span> ADD
	        </a>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-4 pull-right">
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
	                    url : "modules/sinhvien/xuly.php",
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
