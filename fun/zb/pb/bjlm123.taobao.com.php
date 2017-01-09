<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(640, 788);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,640,788);
imagedestroy($bg);
$black = imagecolorallocate($im, 20, 20, 20);
$text = $name;
$font = '../font/gb.ttf';

imagefill ( $im, 0, 0, $black );  

$width = imagesx ( $im );  
$height = imagesy ( $im );  
 
$fontSize = 54;
$fontWidth = imagefontwidth ( $fontSize );  
$textWidth = $fontWidth * mb_strlen ( $text ) * "4"; 
$x = ceil ( ($width - $textWidth)/2 );  

imagettftext($im, 20, 0, $x, 208, $black, $font, $text);



imagejpeg($im);
imagedestroy($im);
?>