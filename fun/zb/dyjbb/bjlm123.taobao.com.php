<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$namea = $_GET['namea']?$_GET['namea']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(960, 629);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,960,629);
imagedestroy($bg);
$black = imagecolorallocate($im, 30, 30, 30);
$text = $name;
$font = '../font/msyh.ttf';
imagettftext($im, 28, -3, 380, 140, $black, $font, $text);

imagettftext($im, 28, -2, 310, 200, $black, $font, $namea);

$showtime=date("Y年m月d日 h:m:s");
imagettftext($im, 22, -3, 300, 75, $black, $font, $showtime);

imagejpeg($im);
imagedestroy($im);
?>