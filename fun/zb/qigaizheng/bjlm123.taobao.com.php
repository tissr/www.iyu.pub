<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(800, 600);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,800,600);
imagedestroy($bg);
$black = imagecolorallocate($im, 20, 20, 20);
$text = $name;
$font = '../font/song.ttf';
$fonta = '../font/wz.ttf';
imagettftext($im, 15, 0.7, 254, 410, $black, $font, $text);
imagettftext($im, 15, 0, 540, 147, $black, $font, $text);
$namea=date("Y       m     d  ");
imagettftext($im, 12, 0, 520, 410, $black, $fonta, $namea);

imagejpeg($im);
imagedestroy($im);
?>