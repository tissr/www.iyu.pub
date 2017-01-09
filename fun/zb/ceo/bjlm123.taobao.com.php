<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"春哥网络";
$im = imagecreatetruecolor(640, 882);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,640,882);
imagedestroy($bg);
$black = imagecolorallocate($im, 30, 30, 30);
$blacka = imagecolorallocate($im, 80, 80, 80);
$text = $name;
$font = '../font/song.ttf';
imagettftext($im, 16, 0, 242, 305, $black, $font, $text);

imagettftext($im, 14, 0, 351, 375, $blacka, $font, $text);


$showtime=date("Y-m-d");
imagettftext($im, 15, 0, 445, 605, $blacka, $font, $showtime);

imagejpeg($im);
imagedestroy($im);
?>