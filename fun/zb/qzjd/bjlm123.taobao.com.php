<?php
header("content-type:image/jpeg");
mb_internal_encoding("UTF-8");
$nametaobao = $_GET['nametaobao']?$_GET['nametaobao']:"春哥网络";
$namebjlm123 = $_GET['namebjlm123']?$_GET['namebjlm123']:"春哥网络";
$checkResult = $_GET['checkResult']?$_GET['checkResult']:"2";
$sex = $_GET['sex']?$_GET['sex']:"儿子";


$im = imagecreatetruecolor(640, 532);
if($checkResult == '2'){ 
$bg = imagecreatefromjpeg('toutu2.jpg');
}else if($checkResult == '1'){ 
$bg = imagecreatefromjpeg('toutu1.jpg');
}else{ 
 echo '条件不满足'; 
} 

imagecopy($im,$bg,0,0,0,0,640,532);
imagedestroy($bg);
$black = imagecolorallocate($im, 80, 80, 80);
$font = '../font/song.ttf';
if($checkResult == '2'){ 
$txt="经过我中心鉴定，".$namebjlm123."与".$nametaobao."确认无血缘关系。";
}else if($checkResult == '1'){ 
$txt="经过我中心鉴定，".$namebjlm123."确认是".$nametaobao."的亲生".$sex."。";
}else{ 
 echo '条件不满足'; 
} 

imagettftext($im, 10, -0.1, 72, 262, $black, $font, $txt);



imagejpeg($im);
imagedestroy($im);
?>