<?php
$xm=$_GET['xm'];
$cs=explode("-",$_GET['cs']);

$cs=$cs[0].'       '.$cs[1].'      '.$cs[2];

$mz=$_GET['mz'];
$xba=$_GET['xba'];
$zhuzhi=$_GET['zhuzhi'];
$hm=$_GET['hm'];
$tx=$_GET['tx'];
$qfdw=$_GET['qfdw'];
$yxq=$_GET['yxq'];
$yz=$_GET['yz'];
function imagettftextSp($image, $size, $angle, $x, $y, $color, $font, $text, $spacing = 0)
{        
    if ($spacing == 0)
    {
        imagettftext($image, $size, $angle, $x, $y, $color, $font, $text);
    }
    else
    {
        $temp_x = $x;
        for ($i = 0; $i < strlen($text); $i++)
        {
            $bbox = imagettftext($image, $size, $angle, $temp_x, $y, $color, $font, $text[$i]);
            $temp_x += $spacing + ($bbox[2] - $bbox[0]);
        }
    }
}



if($yz=='zm'){
    $dst_path = './8.jpg';//背景图片
//头像
$tximg = imagecreatefrompng($tx);
//创建图片的实例
$dst = imagecreatefromstring(file_get_contents($dst_path));
//打上文字
$font = './xh.ttf';//字体
$font1= './2.ttf';
$black = imagecolorallocate($dst, 50, 50, 50);//字体颜色
//imagettftextSp($dst, 11, -2, 130, 132, $black, $font, 'aaa',19);
imagefttext($dst, 12, 0, 130, 132, $black, $font,$xm );
imagefttext($dst, 12, 0,131, 132, $black, $font, $xm);
imagefttext($dst, 11.5, 0, 130, 162, $black, $font, $xba);
imagefttext($dst, 11.5, 0, 131, 162, $black, $font, $xba);
imagefttext($dst, 11.5, 0, 220, 162, $black, $font, $mz);
imagefttext($dst, 11.5, 0, 221, 162, $black, $font, $mz);
imagefttext($dst, 11.5, 0, 130, 194, $black, $font, $cs);
imagefttext($dst, 11.5, 0, 131, 194, $black, $font, $cs);
imagefttext($dst, 10.8, 0, 130, 228, $black, $font, $zhuzhi);
imagefttext($dst, 10.8, 0, 131, 228, $black, $font, $zhuzhi);
//输出图片
imagettftextSp($dst, 14, 0, 200, 308.4, $black, $font1, $hm,4);
imagettftextSp($dst, 14, 0, 201, 308.4, $black, $font1, $hm,4);

imagecopymerge($dst, $tximg, 307, 127, 0, 0,128, 145, 100); 
list($dst_w, $dst_h, $dst_type) = getimagesize($dst_path);
switch ($dst_type) {
    case 1://GIF
        header('Content-Type: image/gif');
        imagegif($dst);
        break;
    case 2://JPG
        header('Content-Type: image/jpeg');
        imagejpeg($dst);
        break;
    case 3://PNG
        header('Content-Type: image/png');
        imagepng($dst);
        break;
    default:
        break;
}
imagedestroy($dst);
}else{
    $dst_path = './22.jpg';
//头像

//创建图片的实例
$dst = imagecreatefromstring(file_get_contents($dst_path));
//打上文字
$font = './xh.ttf';//字体

$black = imagecolorallocate($dst, 50, 50, 50);//字体颜色
//imagettftextSp($dst, 11, -2, 130, 132, $black, $font, 'aaa',19);
imagefttext($dst, 13, 0, 203, 230, $black, $font,$qfdw );
imagefttext($dst, 13, 0, 204, 230, $black, $font, $qfdw);
imagefttext($dst, 13, 0.7, 203, 270, $black, $font, $yxq);
imagefttext($dst, 13, 0.7, 204, 270, $black, $font, $yxq);


//输出图片

list($dst_w, $dst_h, $dst_type) = getimagesize($dst_path);
switch ($dst_type) {
    case 1://GIF
        header('Content-Type: image/gif');
        imagegif($dst);
        break;
    case 2://JPG
        header('Content-Type: image/jpeg');
        imagejpeg($dst);
        break;
    case 3://PNG
        header('Content-Type: image/png');
        imagepng($dst);
        break;
    default:
        break;
}
imagedestroy($dst);
}








?>