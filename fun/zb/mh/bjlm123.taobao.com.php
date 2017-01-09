<?php
error_reporting(0); 
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$name = $_GET['name']?$_GET['name']:"亿酷网络科技bjlm123.taobao.com";

$id = $_GET['id']?$_GET['id']:"5";
$im = imagecreatetruecolor(639, 1136);
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

imagecopy($im,$bg,0,0,0,0,639,1136);
imagedestroy($bg);
$black = imagecolorallocate($im, 230, 230, 230);
$blacka = imagecolorallocate($im, 255, 255, 255);
$text = $name;
$font = '../font/wz.ttf';
$fonta = '../font/wz.ttf';
imagettftext($im, 18.5, 0, 250, 896, $black, $font, $text);

$showtime=date("m月d日");
imagettftext($im, 19, 0, 256, 261, $blacka, $font, $showtime);

$showtimea=date("h:m");
imagettftext($im, 66, 0, 203, 201, $blacka, $fonta, $showtimea);



imagejpeg($im);
imagedestroy($im);
?>