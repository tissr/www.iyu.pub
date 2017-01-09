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
$id = $_GET['id']?$_GET['id']:"5000000";

$im = imagecreatetruecolor(702, 830);

$black = imagecolorallocate($im, 33, 33, 33);
$text = $name;
$fonta = '../font/msyh.ttf';
imagecopy($im,$bg,0,0,0,0,702,830);
imagedestroy($bg);
imagettftext($im, 15, 0, 85, 158, $black, $fonta, $text);

imagettftext($im, 14, 0, 190, 248, $black, $fonta, $id);

$showtime=date("Y  m   d");
$fonta = '../font/song.ttf';
imagettftext($im, 14, -1, 280, 205, $black, $fonta, $showtime);


imagejpeg($im);
imagedestroy($im);
?>