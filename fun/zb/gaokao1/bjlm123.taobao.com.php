<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$sex = $_GET['sex']?$_GET['sex']:"亿酷网络科技bjlm123.taobao.com";
$kaodian = $_GET['kaodian']?$_GET['kaodian']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(800, 1071);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,800,1071);
imagedestroy($bg);
$black = imagecolorallocate($im, 28, 28, 28);
$text = $name;
$font = '../font/wz.ttf';

imagettftext($im, 22, 1, 400, 418, $black, $font, $text);

imagettftext($im, 24, 1, 640, 418, $black, $font, $sex);

imagettftext($im, 23, 1, 400, 489, $black, $font, $kaodian);



imagejpeg($im);
imagedestroy($im);
?>