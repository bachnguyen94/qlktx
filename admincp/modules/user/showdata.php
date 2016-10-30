<?php
	require_once '../config/config.php';
	$query = "SELECT * FROM users ";
    $list = mysqli_query($quanlyktx,$query);
    if(!$list)
	{
		echo "không thể kết nối tới CSDL";
		exit();	
	}
	$will_page = !empty($_GET) ? $_GET : array();
	$will_page1 = http_build_query($will_page);
?>
<div class="row clearfix">
	<div class="col-md-4">
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
	if (isset($_POST['TK'])) {
		$tk = $_POST['TK'];
		$sql= "SELECT * FROM users WHERE username LIKE '%{$tk}%' OR name LIKE '%{$tk}%' OR email LIKE '%{$tk}%'";
		$list = mysqli_query($quanlyktx,$sql);
	}
?>
<div class="showdata">
		<h3 class="dskhoa" style="text-align:center;color:#73AD21">DANH SÁCH USERS</h3>
		<div class="table">
			<table class="table table-hover table-bordered">
				<thead>
			      <tr style="background:#73AD21 ">
			      	<th style="text-align: justify;">ID</th>
			        <th>USERNAME</th>
			        <th>PASSWORD</th>
			        <th>NAME</th>
			        <th>EMAIL</th>
			        <th>LEVEL</th>
			        <th colspan="2">THAO TÁC</th>
			      </tr>
			    </thead>
			    <tbody>
<?php
	$i = 1;
	while($row = mysqli_fetch_assoc($list))
	{
?>
					<tr class="active" id="<?php echo $row['id']?>">
						<td><?php echo $row['id']?></td>
				        <td><?php echo $row['username']?></td>
				        <td><?php echo $row['password']?></td>
				        <td><?php echo $row['name']?></td>
				        <td><?php echo $row['email']?></td>
				        <td><?php echo $row['quyen']?></td>
				        <td><a href="index.php?quanly=user&ac=sua&id=<?php echo $row['id']?>">EDIT</a></td>
				        <td><a href="#" class="xoa">DEL</a></td>
				    </tr>
<?php
	$i++;
	}
	
?>
		    </tbody>
		</table>
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
	                    url : "modules/user/xuly.php",
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
