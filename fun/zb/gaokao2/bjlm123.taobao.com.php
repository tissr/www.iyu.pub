<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";
$sex = $_GET['sex']?$_GET['sex']:"亿酷网络科技bjlm123.taobao.com";
$xuexiao = $_GET['xuexiao']?$_GET['xuexiao']:"亿酷网络科技bjlm123.taobao.com";
$kemu = $_GET['kemu']?$_GET['kemu']:"亿酷网络科技bjlm123.taobao.com";
$im = imagecreatetruecolor(703, 1081);
$bg = imagecreatefromjpeg('bjlm123.taobao.com.jpg');
imagecopy($im,$bg,0,0,0,0,703,1081);
imagedestroy($bg);
$black = imagecolorallocate($im, 88, 88, 88);
$text = $name;
$font = '../font/wz.ttf';

imagettftext($im, 16, -0.5, 280, 357, $black, $font, $text);

imagettftext($im, 16, -0.5, 278, 397, $black, $font, $kemu);

imagettftext($im, 16, -0.5, 278, 439, $black, $font, $sex);

imagettftext($im, 14, -0.1, 278, 561, $black, $font, $xuexiao);



imagejpeg($im);
imagedestroy($im);
?>