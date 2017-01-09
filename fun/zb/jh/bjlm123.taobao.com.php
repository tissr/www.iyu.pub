<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(615, 934);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,615,934);
imagedestroy($bg);
$black = imagecolorallocate($im, 120, 120, 120);
$text = $name;
$font = '../font/msyh.ttf';

imagefill ( $im, 0, 0, $black );  

$width = imagesx ( $im );  
$height = imagesy ( $im );  
 
$fontSize = 54;
$fontWidth = imagefontwidth ( $fontSize );  
$textWidth = $fontWidth * mb_strlen ( $text ) * "4"; 
$x = ceil ( ($width - $textWidth)/2 );  

imagettftext($im, 29, -6, $x, 352, $black, $font, $text);



imagejpeg($im);
imagedestroy($im);
?>