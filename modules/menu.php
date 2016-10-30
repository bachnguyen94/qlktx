<?php 
    if(!empty($quyen) && $quyen == 1){
        $li = "<li class='it-menu'>
                 <a href='admincp/index.php'>Trang Quản Lý</a>
                </li>";
    }
?>
<div class="menu">						
	<ul class="menu-ul">
        <li class="it-menu"><a href="index.php">Trang chủ</a></li>                                    	
        <li class="it-menu"><a href="index.php?menu=thongbao">Thông Báo</a></li>
        <li class="it-menu"><a href="index.php?menu=tracuuthongtin">Tra cứu thông tin</a></li>
        <li class="it-menu"><a href="index.php?menu=noiquy">Nội Quy</a></li>
        <li class="it-menu"><a href="index.php?menu=bancanbo">Ban Điều Hành</a></li>
        <li class="it-menu"><a href="index.php?menu=lienhe">Liên hệ</a></li>
        <?php echo $li?>
    </ul>				
	<div class="clr"></div>
</div>
<div class="after-menu">
    <div class="row">
    <div class="col-md-4">
        <div id="clock"></div>
    </div>
    <div class="col-md-offset-4 col-md-4 ">
        <form action="index.php" method="GET">
            
                <div id="imaginary_container"> 
                    <div class="input-group stylish-input-group">
                        <input type="text" class="form-control" placeholder="Search" name="key" id="search">
                        <span class="input-group-addon sp-search">
                            <button type="submit" name="search">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>  
                        </span>
                    </div>
                </div>     
        </form>
    </div>
    </div>

</div>
