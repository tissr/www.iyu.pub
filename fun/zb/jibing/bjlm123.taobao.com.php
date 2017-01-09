<?php
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"春哥网络";
$jb = $_GET['jb']?$_GET['jb']:"春哥网络";
$uname = $_GET['uname']?$_GET['uname']:"春哥网络";
$im = imagecreatetruecolor(853, 640);
$bg = imagecreatefromjpeg('toutu.jpg');
imagecopy($im,$bg,0,0,0,0,853,640);
imagedestroy($bg);
$black = imagecolorallocate($im, 0, 0, 0);
$text = $name;
$font = '../font/xjl.ttf';
imagettftext($im, 32, 0, 349, 284, $black, $font, $text);

imagettftext($im, 25, 0, 123, 343, $black, $font, $jb);
imagettftext($im, 32, 0, 349, 543, $black, $font, $uname);
$showtime=date("Y.m.d");

imagettftext($im, 30, 0, 529, 574, $black, $font, $showtime);

imagejpeg($im);
imagedestroy($im);
?>