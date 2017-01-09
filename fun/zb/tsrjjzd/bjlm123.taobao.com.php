<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"http://www.iyu.pub";
$im = imagecreatetruecolor(562, 750);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,562,750);
imagedestroy($bg);
$black = imagecolorallocate($im, 65, 55, 55);
$blacka = imagecolorallocate($im, 45, 45, 45);
$text = $name;
$font = '../font/song.ttf';
$fonta = '../font/liguofu.ttf';
imagettftext($im, 22, -1, 430, 742, $blacka, $fonta, $text);


$showtime=date("Y:m:d h:m:s");
imagettftext($im, 14, -1, 116, 325, $black, $font, $showtime);

imagejpeg($im);
imagedestroy($im);
?>