<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(800, 533);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,800,533);
imagedestroy($bg);
$black = imagecolorallocate($im, 220, 220, 220);
$text = $name;
$font = '../font/msyh.ttf';



imagettftext($im, 18, 0, 55, 95, $black, $font, $text);




imagejpeg($im);
imagedestroy($im);
?>