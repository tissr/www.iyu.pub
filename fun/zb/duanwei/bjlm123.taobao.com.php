<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$namea = $_GET['namea']?$_GET['namea']:date("Y年m月d日");
$im = imagecreatetruecolor(640, 852);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,640,852);
imagedestroy($bg);
$black = imagecolorallocate($im, 20, 20, 20);
$text = $name;
$font = '../font/gb.ttf';
imagettftext($im, 25, 0, 122, 328, $black, $font, $text);

imagettftext($im, 25, 0, 430, 335, $black, $font, $namea);

imagejpeg($im);
imagedestroy($im);
?>