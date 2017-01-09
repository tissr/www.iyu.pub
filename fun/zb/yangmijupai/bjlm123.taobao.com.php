<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"听风吟且行blog.iyu.pub";
$namea = $_GET['namea']?$_GET['namea']:"听风吟且行blog.iyu.pub";
$im = imagecreatetruecolor(396, 516);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,396,516);
imagedestroy($bg);
$black = imagecolorallocate($im, 177, 116, 198);
$text = $name;
$font = '../font/xjl.ttf';
imagettftext($im, 22, -56, 70, 358, $black, $font, $text);


imagettftext($im, 22, -59, 1, 335, $black, $font, $namea);


imagejpeg($im);
imagedestroy($im);
?>