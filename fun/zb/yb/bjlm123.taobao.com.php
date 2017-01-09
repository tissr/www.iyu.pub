<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"听风吟且行blog.iyu.pub";

$id = $_GET['id']?$_GET['id']:"5";
$im = imagecreatetruecolor(640, 853);
if($id == '3'){ 
$bg = imagecreatefromjpeg('toutu3.jpg');
}else if($id == '2'){ 
$bg = imagecreatefromjpeg('toutu2.jpg');
}
else if($id == '1'){ 
$bg = imagecreatefromjpeg('toutu1.jpg');
}
else{ 
 echo '条件不满足'; 
} 

imagecopy($im,$bg,0,0,0,0,640,853);
imagedestroy($bg);
$black = imagecolorallocate($im, 51, 44, 33);
$text = $name;
$font = '../font/liguofu.ttf';
imagettftext($im, 24, 0, 422, 755, $black, $font, $text);

$showtime=date("Y.m.d");
imagettftext($im, 16, 0, 422, 785, $black, $font, $showtime);


imagejpeg($im);
imagedestroy($im);
?>