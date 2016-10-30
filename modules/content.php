<div class="center">
	<?php
							//NOI DUNG O DAY
		if(isset($_GET["menu"]))
		{
			$menu=$_GET["menu"];
			switch($menu)
			{
				case "gioithieu":
					if(isset($_GET["thaotac"]))
						require_once("ChiTietGioiThieu.php");
					else
						require_once("GioiThieu.php");
					break;
				case "noiquy":
					require_once("NoiQuy.php");
					break;
				case "cacthanhvien":
					require_once("ThanhVien.php");
					break;
				case "thongbao":
					require_once("ThongBao.php");
					break;
				case "bancanbo":
					require_once("BanCanBo.php");
					break;
				case "sodoktx":
					require_once("SoDoKTX.php");
					break;
				case 'tracuuthongtin':
					require_once("tracuuthongtin.php");
					break;
				case 'lienhe':
					require_once("lienhe.php");
					break;
					
			}
		}
		elseif (isset($_GET['search'])||isset($_GET['idtheloai'])) {
			require_once("danhsachbaiviet.php");
		}
		elseif (isset($_GET['search1'])) {
			require_once("tracuuthongtin.php");
		}
		else
			require_once("Home.php");
	?>
</div>			