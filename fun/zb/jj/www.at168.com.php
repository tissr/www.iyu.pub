<?php
header("content-type:image/jpeg");
$web=$_SERVER['HTTP_HOST'];

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
$im = imagecreatetruecolor(640, 360);

$black = imagecolorallocate($im, 55, 55, 55);

$text = $name;
$font = '../font/lxk.ttf';
imagecopy($im,$bg,0,0,0,0,640,360);
imagedestroy($bg);
imagettftext($im, 12, 1, 489, 285, $black, $font, $text);

$showtime=date("Y  m  d");
$fonta = '../font/lxk.ttf';
imagettftext($im, 16, 2, 260, 98, $black, $fonta, $showtime);


imagejpeg($im);
imagedestroy($im);
?>