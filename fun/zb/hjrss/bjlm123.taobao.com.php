<?php
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"春哥网络";
$namea = $_GET['namea']?$_GET['namea']:"春哥网络";
$im = imagecreatetruecolor(640, 858);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,640,858);
imagedestroy($bg);
$black = imagecolorallocate($im, 10, 10, 10);
$text = $name;
$font = '../font/xjl.ttf';
imagettftext($im, 24, 0, 355, 155, $black, $font, $text);
imagettftext($im, 24, 0, 240, 225, $black, $font, $namea);
imagettftext($im, 24, 0, 418, 400, $black, $font, $text);
$showtime=date("Y   m   d");

imagettftext($im, 24, 0, 122, 155, $black, $font, $showtime);
imagettftext($im, 24, 0, 385, 436, $black, $font, $showtime);
imagejpeg($im);
imagedestroy($im);
?>