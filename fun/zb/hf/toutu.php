<?php
header("content-type:image/jpeg");
$name = $_GET['name']?$_GET['name']:"马大哈";
$id = $_GET['id']?$_GET['id']:"我喜欢你";
$im = imagecreatetruecolor(640, 426);
$bg = imagecreatefromjpeg('toutu.jpg');
imagecopy($im,$bg,0,0,0,0,640,426);
imagedestroy($bg);
$black = imagecolorallocate($im, 220, 220, 220);
$text = $name." , ".$id;
$font = '../font/song.ttf';
imagettftext($im, 32, 0, 122, 225, $black, $font, $text);


imagejpeg($im);
imagedestroy($im);
?>