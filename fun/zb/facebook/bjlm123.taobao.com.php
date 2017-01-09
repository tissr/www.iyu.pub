<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"春哥网络";
$namea = $_GET['namea']?$_GET['namea']:"春哥网络";
$im = imagecreatetruecolor(720, 960);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,720,960);
imagedestroy($bg);
$black = imagecolorallocate($im, 0, 0, 0);
$text = $name;
$font = '../font/msyh.ttf';
imagettftext($im, 18, 5, 179, 500, $black, $font, $text);

imagettftext($im, 18, 5, 179, 555, $black, $font, $namea);


$showtime=date("d/m/Y");
imagettftext($im, 18, 5, 189, 664, $black, $font, $showtime);

imagejpeg($im);
imagedestroy($im);
?>