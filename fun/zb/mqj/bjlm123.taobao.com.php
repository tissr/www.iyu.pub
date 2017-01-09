<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";

$im = imagecreatetruecolor(766,561);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,766,561);
imagedestroy($bg);
$black = imagecolorallocate($im, 90, 90, 90);
$text = $name;
$font = '../font/xjl.ttf';
imagettftext($im, 22, -28, 535, 128, $black, $font, $text);


imagejpeg($im);
imagedestroy($im);
?>