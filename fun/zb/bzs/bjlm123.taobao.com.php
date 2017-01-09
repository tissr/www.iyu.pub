<?php
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"春哥网络";
$namea = $_GET['namea']?$_GET['namea']:"春哥网络";
$im = imagecreatetruecolor(640, 905);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,640,905);
imagedestroy($bg);
$black = imagecolorallocate($im, 0, 0, 0);
$text = $name;
$font = '../font/xjl.ttf';
imagettftext($im, 30, 0, 400, 750, $black, $font, $text);
imagettftext($im, 28, 0, 120, 172, $black, $font, $namea);

imagejpeg($im);
imagedestroy($im);
?>