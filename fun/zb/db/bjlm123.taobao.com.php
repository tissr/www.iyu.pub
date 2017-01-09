<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$namea = $_GET['namea']?$_GET['namea']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(640, 1138);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,640,1138);
imagedestroy($bg);
$black = imagecolorallocate($im, 144, 140, 105);
$text = $name;
$texta= $namea.":";
$font = '../font/msyh.ttf';
imagettftext($im, 22, 0, 488, 1092, $black, $font, $text);
imagettftext($im, 22, 0, 30, 832, $black, $font, $texta);

imagejpeg($im);
imagedestroy($im);
?>