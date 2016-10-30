<?php
	require_once('../config/config.php');
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$query_list = "SELECT * FROM users WHERE id='{$id}'";
	    $list = mysqli_query($quanlyktx,$query_list);
	    if(!$list)
		{
			echo "không thể kết nối tới CSDL";
			exit();	
		}	
		$row = mysqli_fetch_assoc($list);
?>
<div class="sua">
	<h2>Chỉnh Sửa</h2>
	<form class="form-horizontal" action="modules/user/xuly.php?id=<?php echo $row['id']?>" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">USERNAME</label>
	    <div class="col-sm-6">
	      <?php echo $row['username'] ?>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="input_nganh" class="col-sm-2 control-label">NAME</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="name" placeholder="NAME" value="<?php echo $row['name'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">EMAIL</label>
	    <div class="col-sm-6">
	      <input type="text" class="form-control" name="email" placeholder="EMAIL" value="<?php echo $row['email'] ?>">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Quyền</label>
	    <div class="col-xs-3">
			<select class="form-control" name="quyen">
			<?php
				if($row['quyen'] == 1){
					echo "<option value='1' selected='selected'>Quản trị viên</option>";
					echo "<option value='2'>Member</option>";
				}
				else {
					echo "<option value='2' selected='selected'>Member</option>";
					echo "<option value='1'>Quản trị viên</option>";
				}
					
			?>		
			</select>
		</div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" name="sua"><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>Submit</button>
	      <button type="submit" onclick="goBack()"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span>Hủy</button>
	    </div>
	  </div>
	</form>
</div>
<?php
}
?>
<script>
	function goBack() {
	    window.history.back();
	}
</script>