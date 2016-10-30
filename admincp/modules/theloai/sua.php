<?php
	require_once('../config/config.php');
	if(isset($_GET['id']))
	{
		$id_theloai = $_GET['id'];
		$query_listtheloai = "SELECT id,ten,idloaitin,trangthai FROM theloai WHERE id='{$id_theloai}'";
	    $listtheloai = mysqli_query($quanlyktx,$query_listtheloai);
	    if(!$listtheloai)
		{
			echo "không thể kết nối tới CSDL";
			exit();	
		}	
		$row_listtheloai = mysqli_fetch_assoc($listtheloai);
		$sql = "SELECT idloaitin,tenloaitin FROM loaitin";
		$List = mysqli_query($quanlyktx,$sql)
?>
<div class="sua">
	<h2>Chỉnh Sửa</h2>
	<form class="form-horizontal" action="modules/theloai/xuly.php?id=<?php echo $row_listtheloai['id']?>" method="POST" enctype='multipart/form-data'>
	  <div class="form-group">
	    <label for="input_motaloaitin" class="col-sm-2 control-label">TÊN THỂ LOẠI</label>
	    <div class="col-sm-6">
	      <textarea class="form-control" rows="5" name="tentheloai" ><?php echo $row_listtheloai['ten']?></textarea>
	    </div>
	  </div>
	   <div class="form-group">
	    <label class="col-sm-2 control-label">Tên Loại Tin</label>
	    <div class="col-sm-6">
			<select class="form-control" name="idloaitin">
			<?php 
				while ($row_List = mysqli_fetch_assoc($List)) {
					if($row_listtheloai['idloaitin']==$row_List['idloaitin']){
						echo "<option value='".$row_List['idloaitin']."'". "selected='selected'>".$row_List['tenloaitin']."</option>";
					}
					else
					{
						echo "<option value='".$row_List['idloaitin']."'>".$row_List['tenloaitin']."</option>";
					}
				}
			?>
			</select>
		</div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">TRẠNG THÁI</label>
	    <div class="col-xs-3">
			<select class="form-control" name="trangthai">
				<option value="0">Không hiển thị</option>
				<option value="1" selected="selected">Hiển thị</option>
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