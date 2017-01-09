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
$im = imagecreatetruecolor(640, 640);

$black = imagecolorallocate($im, 55, 55, 55);

$text = $name;
$font = '../font/song.ttf';
imagecopy($im,$bg,0,0,0,0,640,640);
imagedestroy($bg);
imagettftext($im, 16, -1, 85, 115, $black, $font, $text);


imagejpeg($im);
imagedestroy($im);
?>