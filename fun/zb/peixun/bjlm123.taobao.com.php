<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$id = $_GET['id']?$_GET['id']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(894, 641);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,894,641);
imagedestroy($bg);
$black = imagecolorallocate($im, 88, 97, 94);
$text = $name;
$font = '../font/song.ttf';

imagettftext($im, 16, 0, 165, 235, $black, $font, $text);
imagettftext($im, 16, 0, 523, 278, $black, $font, $id);

$showtime=date("Y年m月d日");
imagettftext($im, 16, 0, 300, 235, $black, $font, $showtime);

imagejpeg($im);
imagedestroy($im);
?>