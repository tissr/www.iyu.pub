<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(876, 628);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,876,628);
imagedestroy($bg);
$black = imagecolorallocate($im, 20, 20, 20);
$text = $name;
$font = '../font/song.ttf';
$fonta = '../font/wz.ttf';
imagettftext($im, 15, -0.6, 254, 435, $black, $font, $text);
imagettftext($im, 15, 0, 580, 115, $black, $font, $text);
$namea=date("Y     m     d  ");
imagettftext($im, 14, -1, 560, 435, $black, $fonta, $namea);

imagejpeg($im);
imagedestroy($im);
?>