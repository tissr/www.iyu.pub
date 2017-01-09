<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"听风吟且行blog.iyu.pub";
$namea = $_GET['namea']?$_GET['namea']:"听风吟且行blog.iyu.pub";
$im = imagecreatetruecolor(696, 916);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,696,916);
imagedestroy($bg);
$black = imagecolorallocate($im, 20, 20, 20);
$text = $name;
$font = '../font/liguofu.ttf';
imagettftext($im, 22, 1, 20, 318, $black, $font, $text);


imagettftext($im, 22, 0, 20, 378, $black, $font, $namea);


imagejpeg($im);
imagedestroy($im);
?>