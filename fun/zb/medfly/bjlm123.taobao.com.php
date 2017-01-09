<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(720, 1167);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,720,1167);
imagedestroy($bg);
$black = imagecolorallocate($im, 220, 220, 220);
$text = $name.", 您所预定的马尔代";
$font = '../font/fh.ttf';
imagettftext($im, 22, 0, 335, 457, $black, $font, $text);


$showtime=date("Y年m月d日");
imagettftext($im, 24, 0, 252, 312, $black, $font, $showtime);

imagejpeg($im);
imagedestroy($im);
?>