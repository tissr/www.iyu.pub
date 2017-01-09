<?php
header("content-type:image/jpeg");
$name = $_GET['name']?$_GET['name']:"装逼神器";
$id = $_GET['id']?$_GET['id']:"1";
$im = imagecreatetruecolor(640, 445);
if($id == '2'){ 
$bg = imagecreatefromjpeg('toutu2.jpg');
}
else if($id == '1'){ 
$bg = imagecreatefromjpeg('toutu.jpg');
}
else{ 
 echo '条件不满足'; 
} 

$black = imagecolorallocate($im, 90, 90, 90);

$text = $name;
$font = '../font/fh.ttf';
imagecopy($im,$bg,0,0,0,0,640,445);
imagedestroy($bg);
imagettftext($im, 14, 0, 508, 145, $black, $font, $text);

imagejpeg($im);
imagedestroy($im);
?>