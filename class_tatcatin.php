<?php
	class AllTin
	{
		function __construct() 
		{
			Alltin::Get_all_theloai();
			for($j=0;$j<Alltin::$length_theloai;$j++){
				$this->Ds_baiviet($j);
			}
		}

		var $Arr = array('0' =>'Hoạt Động Trạm Y Tế',
						 '1' => 'Hoạt Động Sinh Viên');
		var $i = 0;
		public static $Arr_theloai;
		public static $length_theloai;
		public static $limit_tin = 5;
		function Prints($id,$tentin,$anhminhhoa,$tomtat)
		{
			global $i;
			if($this->i == 0)
			{
				echo "
					<div class='box-trai'>
						<img src='$anhminhhoa' width='98%' height='230px'>
						<h3>
							<a href='index.php?idbaiviet={$id}'>{$tentin}</a>
						</h3>
						<div>{$tomtat}</div>
						<div class='clr'></div>
					</div>
				";
			}
			else
			{
				echo "
					<div class='box-phai'>
						<img src='$anhminhhoa' width='80px' height='60px'>
						<h4>
							<a href='index.php?idbaiviet={$id}'>{$tentin}</a>
						</h4>
						<div class='clr'></div>
					</div>
				";
			}
			if($this->i<Alltin::$limit_tin-1){
				$this->i++;
			}
			else{
				$this->i=0;
			}
		}
		public function Ds_baiviet($thutu)
		{
			//global $Arr_theloai;
			include 'config/config.php';
			$sql = "SELECT tt.id,tt.tentin,tt.anhminhhoa,tt.tomtat FROM tintuc tt 
		    JOIN theloai tl ON tt.idtheloai=tl.id 
		    WHERE tt.idtheloai=".Alltin::$Arr_theloai[$thutu]." ORDER BY tt.id DESC LIMIT ".Alltin::$limit_tin;


		    $result = mysqli_query($quanlyktx,$sql);
		    echo "<div class=box-tin>";
		   		echo "<h3 class='tin'><a href='index.php?idtheloai=".Alltin::$Arr_theloai[$thutu]."'>".$this->Arr[$thutu]."</a></h3>";
				    while ($row = mysqli_fetch_assoc($result)) {
				   		call_user_func_array(array($this, "Prints"), $row);
				    }
				echo "<div class='clr'></div>";
		    echo "</div>";
		    
		}
		public static function Get_all_theloai()
		{
			//global $Arr_theloai;
			include 'config/config.php';
			$sql = "SELECT id FROM theloai WHERE idloaitin=2";
			$result = mysqli_query($quanlyktx,$sql);
			$i=0;
			While($row = mysqli_fetch_assoc($result))
			{
				Alltin::$Arr_theloai[$i] = $row['id'];
				$i++;
			}
			Alltin::$length_theloai = mysqli_num_rows($result);
		}
	}
?>