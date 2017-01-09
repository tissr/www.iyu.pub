<?php
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"春哥网络";
$im = imagecreatetruecolor(960, 720);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,960,720);
imagedestroy($bg);
$black = imagecolorallocate($im, 30, 30, 30);
$text = $name;
$font = '../font/msyh.ttf';
imagettftext($im, 16, 0, 255, 258, $black, $font, $text);

$showtime=date("Y年m月");

imagettftext($im, 15, 0, 346, 259, $black, $font, $showtime);

imagejpeg($im);
imagedestroy($im);
?>