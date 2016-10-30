<?php
	require_once 'config/config.php';
	include 'admincp/modules/phantrang.php';
	$sql 	= "SELECT MA_LOP,TEN_LOP FROM lop";
	$list1 	= mysqli_query($quanlyktx,$sql);
	$sql 	= "SELECT QUE_QUAN FROM sinhvien";
	$list2 	= mysqli_query($quanlyktx,$sql);
	$sql   	= "SELECT MA_KHU FROM khu";
	$list3 	= mysqli_query($quanlyktx,$sql);
	$will_page = !empty($_GET) ? $_GET : array();
	$will_page1 = http_build_query($will_page);
?>
	<br />
<div class="tracuu">
	<div class="space"></div>
		<div class="row clearfix">
			<div class="col-md-6">
				<p style="color:#337ab7;font-size: 21px">Tìm kiếm theo Tên/ Lớp/ Quê quán</p><br/>
				<form action="<?php echo 'index.php?'. $will_page1 ?>" method="POST">
					<div class="form-group">
						<label class="form-search">Họ tên</label>
						<input type="text" class="form-control" name="ten">
					</div>
					<div class="form-group">
						<label class="form-search">Lớp</label>
						<select class="form-control" name="lop">
							<option value="" selected>Tất cả</option>
							<?php 
								while ($row = mysqli_fetch_assoc($list1)) {
									echo "<option value=".$row['MA_LOP'].">".$row['TEN_LOP']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label class="form-search">Quê quán</label>
						<select class="form-control" name="quequan">
							<option value="" selected>Tất cả</option>
						  	<?php 
								while ($row = mysqli_fetch_assoc($list2)) {
									echo "<option value=".$row['QUE_QUAN'].">".$row['QUE_QUAN']."</option>";
								}
							 ?>
						</select>
					</div>
					<div class="form-group">
					    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<p style="color:#337ab7;font-size: 21px">Tìm kiếm theo Khu/Phòng</p><br/>
				<form action="<?php echo 'index.php?'. $will_page1 ?>" method="POST">
					<div class="form-group">
						<label class="form-search">Khu</label>
						<select class="form-control" name="khu" onchange="this.form.submit()">
							<?php 
								while ($row = mysqli_fetch_assoc($list3)) {
									if(isset($_POST['khu']))
									{
										if($row['MA_KHU'] == $_POST['khu'])
											echo "<option value=".$row['MA_KHU']." selected>".$row['MA_KHU']."</option>";
										else
											echo "<option value=".$row['MA_KHU'].">".$row['MA_KHU']."</option>";
									}
									else
										echo "<option value=".$row['MA_KHU'].">".$row['MA_KHU']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label class="form-search">Phòng</label>
						<select class="form-control" name="phong">
							<?php 
								if(isset($_POST['khu']))
								{
									$khu 	= $_POST['khu'];
									$sql 	= "SELECT MA_PHONG,TEN_PHONG,MA_KHU FROM phong WHERE MA_KHU='{$khu}'";
									$list4 	= mysqli_query($quanlyktx,$sql);
								}
								while ($row = mysqli_fetch_assoc($list4)) {
									if(isset($_POST['phong']))
									{
										if($row['MA_PHONG'] == $_POST['phong'])
											echo "<option value=".$row['MA_PHONG']." selected>".$row['TEN_PHONG']."</option>";
										else
											echo "<option value=".$row['MA_PHONG'].">".$row['TEN_PHONG']."</option>";
									}
									else echo "<option value=".$row['MA_PHONG'].">".$row['TEN_PHONG']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group" style="margin-top: 96px">
					    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
					</div>
				</form>
			</div>
		</div>
	<br />
<?php
	if(isset($_POST['ten']) && $_POST['ten'] != "")
	{
		$lop     = $_POST['lop'];
		$quequan = $_POST['quequan'];
		$ten     = $_POST['ten'];
		if($lop != "") $str1 = " AND MA_LOP = '{$lop}'";
		else $str1   = ""; 
		if($quequan != "") $str2 = " AND QUE_QUAN = '{$quequan}'";
		else $str2   = ""; 

		$sql 	 = "SELECT * FROM sinhvien WHERE TEN_SV LIKE '%{$ten}%'".$str1.$str2;
		$list    = mysqli_query($quanlyktx,$sql);
		if(mysqli_num_rows($list)==0){ echo "<h2>khong tim thay!</h2>";}
		else{
			include 'table_tk.php';
		}
	}
	if(isset($_POST['phong'])){
		$khu = $_POST['khu'];
		$phong = $_POST['phong'];
		$sql = "SELECT * FROM sinhvien WHERE MA_PHONG = '{$phong}'";
		$list    = mysqli_query($quanlyktx,$sql);
		if(mysqli_num_rows($list)==0){ echo "<h2>khong tim thay!</h2>";}
		else{
			include 'table_tk.php';
		}
	}
?>
</div>