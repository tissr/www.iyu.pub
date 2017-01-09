<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$namea = $_GET['namea']?$_GET['namea']:date("Y年m月d日");
$im = imagecreatetruecolor(750, 999);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,750,999);
imagedestroy($bg);
$black = imagecolorallocate($im, 70, 70, 70);
$blacka = imagecolorallocate($im, 35, 35, 35);
$text = $name;
$font = '../font/fh.ttf';
$fonta = '../font/fh.ttf';
imagettftext($im, 15, 0, 222, 297, $black, $font, $text);

imagettftext($im, 15, 0, 230, 798, $blacka, $fonta, $namea);

imagejpeg($im);
imagedestroy($im);
?>