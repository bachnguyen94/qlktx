<?php
/*======================================================================*\
|| #################################################################### ||
|| # vt.Lai PHP Simple Contact Script 1.0                             # ||
|| # ---------------------------------------------------------------- # ||
|| # Copyright ©2010-2011 Vu Thanh Lai. All Rights Reserved.          # ||
|| # Please do not remove this comment lines.                         # ||
|| # -------------------- LAST MODIFY INFOMATION -------------------- # ||
|| # Last Modify: 19-07-2011 02:00:00 PM by: Vu Thanh Lai             # ||
|| #################################################################### ||
\*======================================================================*/
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*\
|*-------Please specify source when using my code or a part of them-----*|
\*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();
include 'config.php';

if(get_magic_quotes_gpc())
{
	foreach($_POST as &$value)
		$value=stripslashes(trim($value));
}
	
//----Get Endline Char Funtion
function get_endline_char()
{
	static $eol='';
	if($eol)
		return $eol;
	if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
	  $eol="\r\n";
	} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
	  $eol="\r";
	} else {
	  $eol="\n";
	}
	return $eol;
}
define('CHAR_ENDLINE',get_endline_char());
define('NUMBER_RANDOM',rand(0,999));
//----Check Valid Email Function
function isemail($email)
{
	if (strlen($email) == 0) 
		return false;
	// if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) return true;
	// 	return false;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;
		else return true;
}

//-----Send mail function
function vtlai_mail($from,$to, $subject = 'Thư liên hệ', $message = '') 
{
	//---Set Header
	$headers='';
	$headers.='MIME-Version: 1.0'.CHAR_ENDLINE;
	$headers.='Content-type: text/html; charset=UTF-8'.CHAR_ENDLINE;
	$headers.="From: $from <$from>".CHAR_ENDLINE;
	$headers.="Reply-To: $from <$from>".CHAR_ENDLINE;
	$headers.="Return-Path: $from <$from>".CHAR_ENDLINE;
	$subject=htmlspecialchars($subject);
	if(!$config['allowhtml'])
		$message=htmlspecialchars($message);
	$message=str_replace("\n",'<br>',$message);
	//----Send mail
	if(mail($to, "=?UTF-8?B?".base64_encode($subject).'?=', $message, $headers))
		return true;
	return false;
}

///------Check Submit Info
if($_POST)
{
	if($_SESSION['vtlai_verify']!=md5(md5(strtolower($_POST['verify'])).'vtlai'))
		$error['verify']='Sai mã xác nhận';
	if(!$_POST['subject'])
		$error['subject']='Bạn chưa nhập tiêu đề';
	if(!$_POST['email'])
		$error['email']='Bạn chưa nhập email của bạn';
	elseif(!isemail($_POST['email']))
		$error['email']='Email bạn nhập vào ko hợp lệ';
	foreach($config['fields'] as $key=>&$value)
	{
		if(!$_POST[$key])
			$error[$key]="Bạn chưa nhập '$value'";
	}
	if(!$_POST['message'])
		$error['message']="Bạn chưa nhập thông điệp";
	if(!$error)
	{
		$now=date('d-m-Y h:i:s A');
		$subject="Email liên hệ: {$_POST['subject']}";
		$message="Email liên hệ từ: {$_POST['email']}\n";
		$message.="Thời gian liên hệ: $now\n";
		foreach($config['fields'] as $key=>&$value)
		{
			$message.="$value: {$_POST[$key]}\n";
		}
		$message.="---------------------------------------\n";
		$message.=$_POST['message'];
		if(!vtlai_mail($_POST['email'],$config['email'], $subject, $message))
			$error['mail']='Gửi mail thất bại, Bạn hãy gửi liên hệ tới: '.$config['email'];
		else
			$success='Liên hệ đã được gửi';
	}
	else
	{
		foreach($error as &$value)
		{
			$value="<font color='red'>( $value )</font>";
		}
	}
}