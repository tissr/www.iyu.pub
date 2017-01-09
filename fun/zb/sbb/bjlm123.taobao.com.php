<?php
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");


$name = $_GET['name']?$_GET['name']:"bjlm123.toabao.com";
$id = $_GET['id']?$_GET['id']:"4";
$im = imagecreatetruecolor(640, 888);
if($id == '4'){ 
$bg = imagecreatefromjpeg('toutu4.jpg');
}else if($id == '3'){ 
$bg = imagecreatefromjpeg('toutu3.jpg');
}else if($id == '2'){ 
$bg = imagecreatefromjpeg('toutu2.jpg');
}else if($id == '1'){ 
$bg = imagecreatefromjpeg('toutu1.jpg');
}else{ 
 echo '条件不满足'; 
} 
imagecopy($im,$bg,0,0,0,0,640, 888);
imagedestroy($bg);
$black = imagecolorallocate($im, 0, 0, 0);
$text = $name;
$font = '../font/xjl.ttf';
imagettftext($im, 28, 23, 237, 673, $black, $font, $name);



imagejpeg($im);
imagedestroy($im);
?>