<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	if(isset($_GET["thaotac"]))
	{
		$thaotac=$_GET["thaotac"];
		switch($thaotac)
		{
			case "lichlamviec":
				?>
                <h1 style="color:#00F">A.LỊCH LÀM VIỆC</h1>
                <table border="1" cellspacing="0" cellpadding="0" width="500">
  					<tr >
    					<td width="159" valign="top"><p><strong>NỘI DUNG</strong></p></td>
    					<td width="276" valign="top"><p><strong>THỜI GIAN</strong></p></td>
    					<td width="185" valign="top"><p><strong>THỰC HIỆN</strong></p></td>
  					</tr>
  					<tr>
    					<td width="159" valign="top"><p><strong>KHẢO SÁT</strong></p></td>
   						 <td width="276" valign="top"><p>1.11.2015 – 3.11.2015</p></td>
    					<td width="185" valign="top"><p>Đặng Tiến Quân<br />
     													
  					</tr>
  					<tr >
    					<td width="159" valign="top"><p><strong>PHÂN TÍCH</strong></p></td>
    					<td width="276" valign="top"><p>5.11.2015 – 13.11.2015</p></td>
    					<td width="185" valign="top"><p>Đặng Tiến Quân<br />
      												
  					</tr>
  					<tr>
    					<td width="159" valign="top"><p><strong>LẬP TRÌNH</strong></p></td>
   						 <td width="276" valign="top"><p>1.12.2015 – 15.2.2016</p></td>
    					<td width="185" valign="top"><p>Đặng Tiến Quân</p></td>
  					</tr>
  					<tr >
    					<td width="159" valign="top"><p><strong>KIỂM TRA</strong></p></td>
    					<td width="276" valign="top"><p>16.2.2016 – 17.2.2016</p></td>
    					<td width="185" valign="top"><p>Đặng Tiến Quân<br />
      													
  					</tr>
  					<tr>
    					<td width="159" valign="top"><p><strong>BÀN GIAO</strong></p></td>
    					<td width="276" valign="top"><p>20.3.2016</p></td>
    					<td width="185" valign="top"><p>Đặng Tiến Quân</p></td>
  					</tr>
				</table>
				<br />
				<p style="font: 13px/1.5em Verdana;">
				<i><u>Thời gian dự kiến:</u></i><br />
					Từ ngày 1.11.2016 – 18.3.2016<br />
				<i><u>Địa điểm làm việc</u></i><br />
					Th thực hành tại phòng máy của trường và thực hiện ở nhà trên môi trường online (Google seach....) <br />
				<i><u>Người thực hiện dự án:</u></i><br />
				1.Đặng Tiến Quân<br />
				
                <hr />
                <a href="index.php?menu=gioithieu&thaotac=phantich">>><u>B.PHÂN TÍCH DỰ ÁN</u></a><br />
				<a href="index.php?menu=gioithieu&thaotac=thucthi">>><u>C.THỰC THI DỰ ÁN</u></a><br />
				<a href="index.php?menu=gioithieu&thaotac=mohinh">>><u>D.MÔ HÌNH QUAN HỆ</u></a><br />
				<a href="index.php?menu=gioithieu&thaotac=dulieu">>><u>E.MÔ HÌNH DỮ LIỆU</u></a><br />
                </p>
                <?php
				break;
			case "phantich":
				?>
                
                <h1 style="color:#00F">B.PHÂN TÍCH DỰ ÁN</h1><br />
                <p style="font: 13px/1.5em Verdana;">
					<u><i><b>B.1: Yêu cầu:</b></i></u><br />
						Quản trị KTX  trên website, được đưa ra theo yêu cầu quản lý KTX trong thực tế,nhằm tạo 
                        một không gian quản lý hợp lý,và dễ 
                        dàng.Hiện này có nhiều phần mềm quản lý ra đời,nhưng 
                        việc quản lý KTX trên website là vô cùng thuận lợi.Vì hầu
                         hết các máy tính đều có thể chạy trình duyệt web. 
					Quản lý KTX trên nền web,có thể thực hiện online hay offline.Xây dựng 
               	 mô hình quản lý KTX được nhóm thống nhất và tiến hành xây dựng<br />
				<u><i><b>B.2 Công việc quản lý</b></i></u><br />
				Công việc quản lý KTX được thực hiện bởi những công việc sau<br />
				<i>a.Quản lý các Khu ở trong KTX</i><br />
				Bao gồm các chức năng,thêm,sửa KHU.<br />
				<i>b.Quản Lý Khoa</i><br />
				Mỗi sinh viên ở trong KTX thuộc các khoa khác nhau,việc quản lý sinh viên cũng kèm theo việc quản lý Khoa mà sinh viên đang học
				Quản lý Khoa bao gồm việc thêm,sửa Khoa<br />
				<i>c.Quản lý Phòng</i><br />
				Sinh viên ở tại phòng, được quản lý thông qua mã phòng và người phòng trưởng của 
                phòng đó..Mỗi sinh viên thuộc phòng nào đều có mang mã phòng của phòng đó<br />
				Việc quản lý phòng bao gồm các chức năng,thêm phòng và sửa phòng<br />
				<i>d.Quản lý Lớp</i><br />
				Sinh viên ở tại KTX thuộc các khoa khác nhau,trong mỗi khoa cáo các lớp khác nhau,
                việc quản lý KTX cũng kèm theo việc quản lý Lớp của sinh viên
				Quản lý Lớp bao gồm chức năng thêm lớp và sửa lớp<br />

					<i>e.Quản lý sinh viên</i><br />
				Sinh viên là đối tượng chính được quản lý trong KTX.mỗi sinh viên ở KTX đều được cấp thẻ quản 
                lý theo mã số sinh viên,và những thông tin mà nơi sinh viên ở ( khu nào,phòng nào,…) và các thông tin về thời gian ở của sinh viên<br />
				Việc quản lý sinh viên bao gồm các chức năng: Thêm sửa xóa<br />
				<i>f.Quản lý chi tiêu </i><br />
					Mỗi phòng trong KTX được quản lý thêm thông tin chi tiêu của phòng,bao gồm các thông số 
       			 về phòng,quản lý sinh hoạt của phòng đó để ban quản lý 		
        			KTX có thể căn cứ vào đó để thực hiện thu tiền của phòng theo tháng<br />
				<u><i><b>B.3 Hỗ trợ dự án</b></i></u><br />
				- Ngôn ngữ lập trình PHP<br />
				- Cơ sở dữ liệu MySQL<br />
				- Công cụ thiết kế giao diện Adobe Dreamweaver,Photoshop<br />
				- Công cụ quản lý dự án: Google Code,TortoiseSVN<br />
                <hr />
                <a href="index.php?menu=gioithieu&thaotac=lichlamviec">>><u>A.LỊCH LÀM VIỆC</u></a><br />				
				<a href="index.php?menu=gioithieu&thaotac=thucthi">>><u>C.THỰC THI DỰ ÁN</u></a><br />
				<a href="index.php?menu=gioithieu&thaotac=mohinh">>><u>D.MÔ HÌNH QUAN HỆ</u></a><br />
				<a href="index.php?menu=gioithieu&thaotac=dulieu">>><u>E.MÔ HÌNH DỮ LIỆU</u></a><br />
   				 </p>                
                <?php
				break;
			case "thucthi":
				?>
                
                <h1 style="color:#00F">C.THỰC THI DỰ ÁN</h1><br />
                <p style="font: 13px/1.5em Verdana;">
				<u><i><b>C.1 :Khảo sát</b></i></u><br />
				Nhìn nhận mô hình tổng quát của quy trình quản lý KTX trên lý thuyết và chỉ tham khảo trên thực tế…<br />
				<u><i><b>C.2 : Phân tích</b></i></u><br />
				<u><i>a.Phạm vi và ràng buột cho hệ thống</i></u><br />
 				- Hệ thống là một chương trình quản lý,và thực hiện các chức năng nhằm quản lý các sinh viên ở và sinh hoạt tại KTX<br />
				<u><i>b.Ràng buột cho hệ thống</i></u><br />
 				- Việc thực hiện dự án phải đảm bảo :<br />
  				 + Chi phí cho dự án phải thấp nhất,cả về thời gian lẫn tiền bạc.<br />
				 + Chương trình khi đem vào ứng dụng sẽ hoạt động tốt.<br />
                 <hr />
                <a href="index.php?menu=gioithieu&thaotac=lichlamviec">>><u>A.LỊCH LÀM VIỆC</u></a><br />
				<a href="index.php?menu=gioithieu&thaotac=phantich">>><u>B.PHÂN TÍCH DỰ ÁN</u></a><br />				
				<a href="index.php?menu=gioithieu&thaotac=mohinh">>><u>D.MÔ HÌNH QUAN HỆ</u></a><br />
				<a href="index.php?menu=gioithieu&thaotac=dulieu">>><u>E.MÔ HÌNH DỮ LIỆU</u></a><br />				
				</p>
                <?php
				break;
			case "mohinh":
				?>
                <h1 style="color:#00C"> MÔ HÌNH QUAN HỆ</h1>
 				<p style="font: 13px/1.5em Verdana;">
 				<B>KHOA</B><BR />
 				<img src="images/Khoa.jpg" width="859" height="91" /><BR />
 				<b>KHU</b><BR />
 				<img src="images/khu.jpg" /><BR />
 				<B>LOP</B><BR />
 				<img src="images/lop.jpg" /><BR />
 				<b>PHONG</b><BR />
 				<img src="images/phong.jpg" /><BR />
				 <B>SINHVIEN</B><BR />
 				<img src="images/sinhvien.jpg" /><BR />
                <hr />
                <a href="index.php?menu=gioithieu&thaotac=lichlamviec">>><u>A.LỊCH LÀM VIỆC</u></a><br />
				<a href="index.php?menu=gioithieu&thaotac=phantich">>><u>B.PHÂN TÍCH DỰ ÁN</u></a><br />
				<a href="index.php?menu=gioithieu&thaotac=thucthi">>><u>C.THỰC THI DỰ ÁN</u></a><br />				
				<a href="index.php?menu=gioithieu&thaotac=dulieu">>><u>E.MÔ HÌNH DỮ LIỆU</u></a><br />
 				</p>
                <?php
				break;
			case "dulieu":
				?>  
                <h1 style="color:#00C"> MÔ HÌNH DỮ LIỆU</h1>              
				<img src="images/Test_clip_image002.gif" alt="" width="500" height="444" />
                <hr />
                <a href="index.php?menu=gioithieu&thaotac=lichlamviec">>><u>A.LỊCH LÀM VIỆC</u></a><br />
				<a href="index.php?menu=gioithieu&thaotac=phantich">>><u>B.PHÂN TÍCH DỰ ÁN</u></a><br />
				<a href="index.php?menu=gioithieu&thaotac=thucthi">>><u>C.THỰC THI DỰ ÁN</u></a><br />
				<a href="index.php?menu=gioithieu&thaotac=mohinh">>><u>D.MÔ HÌNH QUAN HỆ</u></a><br />				
                <?php
				break;
			}
	}
?>
</body>
</html>