<?php
header("content-type:image/jpeg");
$web=$_SERVER['HTTP_HOST'];
mb_internal_encoding("UTF-8");
if($web == '17wap.cn'){ 
$bg = imagecreatefromjpeg('');
}else if($web == 'dy98.top'){ 
$bg = imagecreatefromjpeg('');
}else if($web == 'yqx.ilwei.com'){ 
$bg = imagecreatefromjpeg('');
}else if($web == 'bbs.ptpkj.cn'){ 
$bg = imagecreatefromjpeg('');
}else if($web == 'www.bst0776.cn'){ 
$bg = imagecreatefromjpeg('');
}else if($web == 'zb.aulice.com'){ 
$bg = imagecreatefromjpeg('');
}else{ 
$bg = imagecreatefromjpeg('toutu.jpg');
} 

$name = $_GET['name']?$_GET['name']:"bjlm123.taobao,com";
$im = imagecreatetruecolor(720, 978);

$black = imagecolorallocate($im, 55, 55, 55);
$blacka = imagecolorallocate($im, 15, 15, 15);
$text = $name;
$font = '../font/msyh.ttf';
imagecopy($im,$bg,0,0,0,0,720,978);
imagedestroy($bg);
imagettftext($im, 17, 0, 359, 415, $black, $font, $text);

$showtime=date("Y-m-d");
imagettftext($im, 11, 0, 325, 655, $blacka, $font, $showtime);

imagejpeg($im);
imagedestroy($im);
?>