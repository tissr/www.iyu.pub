<?php
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"春哥网络";
$im = imagecreatetruecolor(815, 519);
$bg = imagecreatefromjpeg('toutu.jpg');
imagecopy($im,$bg,0,0,0,0,815,519);
imagedestroy($bg);
$black = imagecolorallocate($im, 80, 80, 80);
$text = $name;
$font = '../font/wz.ttf';
imagettftext($im, 12, 1, 488, 152, $black, $font, $text);

$showtime=date("Y    m    d");

imagettftext($im, 12, 0, 538, 428, $black, $font, $showtime);

imagejpeg($im);
imagedestroy($im);
?>