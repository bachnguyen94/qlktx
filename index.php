<?php
	session_start();
	if(isset($_GET['logout']))
	{
		session_destroy();
	}
	$li ='';
	if(!isset($_SESSION['username'])){
		$login = '';
		$li = "<li class='it-menu'>
					<a href='modules/login.php'>Đăng Nhập</a>
				</li>
				<li class='it-menu'>
					<a href='modules/register.php'>Đăng Ký</a>
				</li>";
	}
	else
	{
		$username = $_SESSION['username'];
		$name = $_SESSION['name'];
		$quyen = $_SESSION['quyen'];
		$login = "<div class='div-acc'>
					<div class='row'>
						<div class='col-sm-offset-9 col-sm-1'>".$name ."</div>
						<div class='col-sm-2'>
							<a class='logout' href='index.php'>Đăng Xuất</a>
						</div>
					</div>
				</div>";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi-vn" lang="vi-vn">
    <head>
   		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   		<title>Chương Trình Quản Lý Và Điều Hành Ký Túc Xá</title>
   		<script type="text/javascript" src="js/jquery.min.js"></script>
	    <script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.2.74.js"></script>
	    <link href="style/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="style/css/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
		<link href="style/font-awesome-4.6.1/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	    <script type="text/javascript" src="http://malsup.github.com/chili-1.7.pack.js"></script>
		<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
		<script type="text/javascript" src="http://malsup.github.com/jquery.easing.1.3.js"></script>
	    <script type="text/javascript" src="http://quehuongonline.vn/js/jquery.slimscroll.min.js"></script>
	    <link rel="stylesheet" href="style/style.css" type="text/css">
	    <script type="text/javascript" src="js/jquery.jcarousellite.min.js"></script>
	    <link href="style/owl.carousel.css" rel="stylesheet" type="text/css"/>
	</head>
	<body onload="time()">
		<div class="header w1000">
			<?php
				include('modules/banner.php');
				include('modules/menu.php');
			?>
			<div class="content">
			<?php
				include('modules/left.php');
				include('modules/content.php');
				include('modules/right.php');
			?>
			<div class="clr"></div>
			</div>
			<div class="bot">
				<h2 style="color: white;background: gray;text-align: center;">Các trang liên kết</h2>
				<ul>
					<li><a href="http://www.tlu.edu.vn/"><img src="images/lienket/avatadh.jpg" /></a></li>
					<li><a href="http://vui.edu.vn/ky-tuc-xa.html"><img src="images/lienket/Diem-chuan-NV2-2013-Truong-DH-Cong-nghiep-Viet15092013204232.jpg" /></a></li>				
					<li><a href="http://hust.edu.vn/"><img src="images/lienket/tải xuống.jpg" /></a></li>				
					<li><a href="http://utc.edu.vn/"><img src="images/lienket/uct2_logo_new.jpg" /></a></li>
					<li><a href="http://vnu.edu.vn/"><img src="images/lienket/VNU.logo.jpg" /></a></li>
				</ul>
			</div>
			<?php
				include('modules/footer.php');
			?>
			<div class="back_top">
                <img src="images/back_top.png" alt=""/>
            </div><!--.back_top-->
		</div>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
        $("a.logout").click(function(){
            $.ajax(
                {
                    type: "GET",
                    url : "index.php",
                    dataType: 'text',
                    data : {
                        logout : 1
                    },
                    cache: false,
                    success: function()
                    {
                        location.reload();
                    }
                });
      	 });
    });
    function goBack() {
	    window.history.back();
	}
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        var offset = 20;
        var duration = 500;
        jQuery('.back_top').fadeOut(0);
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.back_top').fadeIn(duration);
            } else {
                jQuery('.back_top').fadeOut(duration);
            }
        });

        jQuery('.back_top').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    });


 $(".bot").jCarouselLite({
    auto: 800,
    speed: 1500,
    visible:5
});


function time() {
   var today = new Date();
   var weekday=new Array(7);
   weekday[0]="Sunday";
   weekday[1]="Monday";
   weekday[2]="Tuesday";
   weekday[3]="Wednesday";
   weekday[4]="Thursday";
   weekday[5]="Friday";
   weekday[6]="Saturday";
   var day = weekday[today.getDay()]; 
   var dd = today.getDate();
   var mm = today.getMonth()+1; //January is 0!
   var yyyy = today.getFullYear();
   var h=today.getHours();
   var m=today.getMinutes();
   var s=today.getSeconds();
   m=checkTime(m);
   s=checkTime(s);
   nowTime = h+":"+m+":"+s;
   if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm} today = day+', '+ dd+'/'+mm+'/'+yyyy;
 
   tmp='<span class="date">'+today+' | '+nowTime+'</span>';
 
   document.getElementById("clock").innerHTML=tmp;
 
   clocktime=setTimeout("time()","1000","JavaScript");
   function checkTime(i)
   {
      if(i<10){
	 i="0" + i;
      }
      return i;
   }
}
</script>