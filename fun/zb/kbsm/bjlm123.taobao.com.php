<?php
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"春哥网络";
$im = imagecreatetruecolor(600, 800);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,600,800);
imagedestroy($bg);
$black = imagecolorallocate($im, 120, 120, 120);
$text = $name;
$font = '../font/liguofu.ttf';
imagettftext($im, 30, 0, 445, 460, $black, $font, $text);

$showtime=date("Y.m.d");
imagettftext($im, 20, 0, 445, 490, $black, $font, $showtime);

imagejpeg($im);
imagedestroy($im);
?>