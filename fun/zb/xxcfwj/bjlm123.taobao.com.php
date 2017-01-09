<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"听风吟且行blog.iyu.pub";
$im = imagecreatetruecolor(800, 1100);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,800,1100);
imagedestroy($bg);
$black = imagecolorallocate($im, 100, 100, 100);
$blacka = imagecolorallocate($im, 80, 80, 80);
$text = $name;
$font = '../font/fh.ttf';
imagettftext($im, 18, 1, 250, 368, $black, $font, $text);
imagettftext($im, 17, 1, 310, 405, $blacka, $font, $text);
imagettftext($im, 17, 1, 148, 605, $blacka, $font, $text);

$showtime=date("Y年m月d日");
imagettftext($im, 16, 0, 130, 405, $blacka, $font, $showtime);

imagettftext($im, 20, 0, 450, 795, $blacka, $font, $showtime);

imagejpeg($im);
imagedestroy($im);
?>