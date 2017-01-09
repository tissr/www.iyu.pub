<?php
header("content-type:image/jpeg");
$name = $_GET['name']?$_GET['name']:"马大哈";
$id = $_GET['id']?$_GET['id']:"4";
$im = imagecreatetruecolor(640, 460);
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
imagecopy($im,$bg,0,0,0,0,640, 460);
imagedestroy($bg);
$black = imagecolorallocate($im, 90, 90, 90);
$text = $name;
$font = '../font/msyh.ttf';

$text = substr($name , 0 , 3); 

imagettftext($im, 22, -30, 88, 178, $black, $font, $text);
$texta = substr($name , 3 , 3); 

imagettftext($im, 22, -4, 150, 185, $black, $font, $texta);
$textb = "哥"; 
$textc = substr($name , 6 , 6); 
if(strlen($name)<7){ 
imagettftext($im, 22, 5, 202, 181, $black, $font, $textb);
}
else if(strlen($name)>6){ 
imagettftext($im, 22, 5, 202, 181, $black, $font, $textc);
}
else{ 
 echo '条件不满足'; 
} 




imagejpeg($im);
imagedestroy($im);
?>