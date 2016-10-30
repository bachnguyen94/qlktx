<?php
	// Khai báo thư viên phpmailer
	require "PHPMailer-master/PHPMailerAutoload.php";
	require "PHPMailer-master/class.phpmailer.php";
	// Khai báo tạo PHPMailer
	$mail = new PHPMailer();
	//Khai báo gửi mail bằng SMTP
	$mail->IsSMTP();
	//Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
	// 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
	// 1 = Thông báo lỗi ở client
	// 2 = Thông báo lỗi cả client và lỗi ở server
	$mail->SMTPDebug  = 2;
	 
	$mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
	$mail->Host       = "smtp-mail.outlook.com"; //host smtp để gửi mail
	$mail->Port       = 587; // cổng để gửi mail
	$mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
	$mail->SMTPAuth   = true; //Xác thực SMTP
	$mail->Username   = "chienthantihon@outlook.com.vn"; // Tên đăng nhập tài khoản Gmail
	$mail->Password   = "meocaphe94"; //Mật khẩu của gmail
	$mail->SetFrom("chienthantihon@outlook.com.vn", "Test Email"); // Thông tin người gửi
	$mail->AddReplyTo("no-reply@example.com","Test Reply");// Ấn định email sẽ nhận khi người dùng reply lại.
	$mail->AddAddress("nguyenxuanbach6789@gmail.com", "John Doe");//Email của người nhận
	$mail->Subject = "Tiêu đề thư"; //Tiêu đề của thư
	$mail->MsgHTML("loremhgf"); //Nội dung của bức thư.
	// $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
	// Gửi thư với tập tin html
	$mail->isHTML(true);
	$mail->AltBody = "This is a plain-text message body";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
	echo !extension_loaded('openssl')?"Not Available":"Available";
	//Tiến hành gửi email và kiểm tra lỗi
	if(!$mail->Send()) {
	  echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
	} else {
	  echo "Đã gửi thư thành công!";
	}
?>