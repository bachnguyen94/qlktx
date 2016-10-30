<?php
	include 'global.php';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Contact-SinhVienIT.Net</title>
<style>
	body{
		font-family: Tahoma;
		font-size: 12px;
	}
	td
	{
		font-size: 12px;
	}
</style>
</head>

<body>
<center>
<font size="4"> PHP Simple Contact Script 1.0   <br></font>
<?php
if($success)
{
?>
	<font color="blue"><?=$success?></font>
<?php
}
elseif($error['mail'])
{
?>
	<font color="red"><?="{$error['mail']}"?></font>
<?php
}
?>
<form method="POST">
	<table border="1" width="650"  style="border-collapse: collapse">
		<tr>
			<td>Tiêu đề liên hệ <?php echo $error['subject'];?>:</td>
			<td><input type="text" name="subject" value="<?=$_POST['subject']?>"  size="40"></td>
		</tr>
		<tr>
			<td>Email của bạn <?php echo $error['email'];?>:</td>
			<td><input type="text" name="email" value="<?=$_POST['email']?>" size="40"></td>
		</tr>
<?php
	foreach($config['fields'] as $key => &$value)
	{
?>
		<tr>
			<td><?=$value?> <?php echo $error[$key];?>:</td>
			<td><input type="text" name="<?=$key?>" value="<?=$_POST[$key]?>"  size="40"></td>
		</tr>
<?php
	}
?>
		<tr>
			<td colspan="2">Nội dung<?php echo $error['message'];?>:</td>
		</tr>
		<tr>
			<td colspan="2"><textarea rows="10" name="message" cols="70"><?=$_POST['message']?></textarea></td>
		</tr>
		<tr>
			<td>Mã xác nhận<?php echo $error['verify'];?>:</td>
			<td><input type="text" name="verify" value=""  size="20"><img border="0" src="verify.php?<?=NUMBER_RANDOM?>" align="absmiddle"></td>
		</tr>
		<tr>
			<td colspan="2" align="right"><input type="submit" value="Gửi đi"></td>
		</tr>
	</table>
</form>
<?php
$to = "nguyenxuanbach6789@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: nguyenxuanbach6789@gmail.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);
?>

Code by: Đặng Tiến Quân - Shared at: <a href="http://sinhvienit.net/@forum/">sinhvienit.net</a>
</center>
</body>

</html>