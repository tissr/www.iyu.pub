<?php
header("content-type:image/jpeg");
$name = $_GET['name']?$_GET['name']:"佰品亿酷";
$im = imagecreatetruecolor(640, 1136);
$bg = imagecreatefromjpeg('toutu.jpg');
imagecopy($im,$bg,0,0,0,0,640,1136);
imagedestroy($bg);
$black = imagecolorallocate($im, 250, 250, 250);
$blacka = imagecolorallocate($im, 250, 250, 250);
$text = "尊敬的".$name.",您的运通百夫长黑金卡于".date("m月");
$font = '../font/fh.ttf';
imagettftext($im, 16, 0, 90, 70, $black, $font, $text);
$texta =date("d日 h:m")."消费44650000元人民币...";
imagettftext($im, 16, 0, 90, 95, $black, $font, $texta);


imagejpeg($im);
imagedestroy($im);
?>