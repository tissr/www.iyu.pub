<?php
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"www.iyu.pub";
$im = imagecreatetruecolor(640, 1137);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,640,1137);
imagedestroy($bg);
$black = imagecolorallocate($im, 60, 60, 60);
$text = "￥".$name;
$font = '../font/fh.ttf';

imagefill ( $im, 0, 0, $black );  

$width = imagesx ( $im );  
$height = imagesy ( $im );  
 
$fontSize = 54;
$fontWidth = imagefontwidth ( $fontSize );  
$textWidth = $fontWidth * mb_strlen ( $text ) * "6"; 
$x = ceil ( ($width - $textWidth)/2 );  

imagettftext($im, 54, 0, $x, 565, $black, $font, $text);



imagejpeg($im);
imagedestroy($im);
?>