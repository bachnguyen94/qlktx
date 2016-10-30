<?php
/*======================================================================*\
|| #################################################################### ||
|| # vt.Lai PHP Contact Script 1.0                                    # ||
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
ob_start();
session_start();
header('Content-type: image/jpeg');
$width = 65;
$height = 24;

$my_image = imagecreatetruecolor($width, $height);

imagefill($my_image, 0, 0, 0xFFFFFF);

// add noise
for ($c = 0; $c < 40; $c++){
	$x = rand(0,$width-1);
	$y = rand(0,$height-1);
	imagesetpixel($my_image, $x, $y, 0x000000);
}

$x = rand(1,20);
$y = rand(1,6);

$rand_string = rand(1000,9999);
imagestring($my_image, 14, $x, $y, $rand_string, 0x000000);

$_SESSION['vtlai_verify']=md5(md5(strtolower($rand_string)).'vtlai');

imagejpeg($my_image);
imagedestroy($my_image);
?>