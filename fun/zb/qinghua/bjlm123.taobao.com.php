<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$namea = $_GET['namea']?$_GET['namea']:"亿酷网络科技bjlm123.taobao.com";
$nameb = $_GET['nameb']?$_GET['nameb']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(900, 539);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,900,539);
imagedestroy($bg);
$black = imagecolorallocate($im, 20, 20, 20);
$text = $name;
$font = '../font/song.ttf';
imagettftext($im, 16, 0, 100, 258, $black, $font, $text);
imagettftext($im, 16, 0, 730, 193, $black, $font, $text);

imagettftext($im, 14, 1, 240, 292, $black, $font, $namea);
imagettftext($im, 16, 0, 730, 230, $black, $font, $namea);

imagettftext($im, 14, 1, 120, 328, $black, $font, $nameb);

imagejpeg($im);
imagedestroy($im);
?>