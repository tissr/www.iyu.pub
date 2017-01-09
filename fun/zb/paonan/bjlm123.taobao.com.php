<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$namea = $_GET['namea']?$_GET['namea']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(440, 628);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,440,628);
imagedestroy($bg);
$black = imagecolorallocate($im, 20, 20, 20);
$text = $name;
$font = '../font/msyh.ttf';
imagettftext($im, 12, -4, 180, 452, $black, $font, $text);


imagettftext($im, 12, -5, 173, 488, $black, $font, $namea);


imagejpeg($im);
imagedestroy($im);
?>