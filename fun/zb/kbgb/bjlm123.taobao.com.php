<?php
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"春哥网络";
$im = imagecreatetruecolor(640, 463);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,640,463);
imagedestroy($bg);
$black = imagecolorallocate($im, 20, 20, 20);
$text = $name;
$font = '../font/lxk.ttf';
imagettftext($im, 32, 12, 42, 320, $black, $font, $text);
$texta = "Thank you for being";
$textb= "my fan , goodbye ! ";

imagettftext($im, 26, 13, 52, 380, $black, $font, $texta);

imagettftext($im, 26, 13.5, 62, 430, $black, $font, $textb);
imagejpeg($im);
imagedestroy($im);
?>