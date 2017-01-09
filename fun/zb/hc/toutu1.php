<?php
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"马大哈";
$im = imagecreatetruecolor(640, 853);
$bg = imagecreatefromjpeg('toutu1.jpg');
imagecopy($im,$bg,0,0,0,0,640,853);
imagedestroy($bg);
$black = imagecolorallocate($im, 0, 0, 0);
$text = $name;
$font = '../font/gb.ttf';
imagettftext($im, 22, 0, 409, 754, $black, $font, $text);

$showtime=date("Y-m-d");
$fonta = '../font/liguofu.ttf';
imagettftext($im, 18, -1, 409, 780, $black, $fonta, $showtime);

imagejpeg($im);
imagedestroy($im);
?>