<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"春哥网络";
$im = imagecreatetruecolor(580, 1028);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,580,1028);
imagedestroy($bg);
$black = imagecolorallocate($im, 255, 255, 255);
$text = $name;
$font = '../font/song.ttf';
imagettftext($im, 35, 0, 242, 165, $black, $font, $text);




imagejpeg($im);
imagedestroy($im);
?>