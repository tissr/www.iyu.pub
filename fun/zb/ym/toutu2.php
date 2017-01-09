<?php
header("content-type:image/jpeg");
$name = $_GET['name']?$_GET['name']:"马大哈";
$im = imagecreatetruecolor(640, 853);
$bg = imagecreatefromjpeg('toutu2.jpg');
imagecopy($im,$bg,0,0,0,0,640,853);
imagedestroy($bg);
$black = imagecolorallocate($im, 20, 20, 20);
$text = $name;
$font = '../font/gb.ttf';
imagettftext($im, 22, -2, 248, 162, $black, $font, $text);


imagejpeg($im);
imagedestroy($im);
?>