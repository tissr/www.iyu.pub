<?php

session_start();
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('PRC');
header('Content-Type: text/html; charset=UTF-8');

include_once ("function.php");

$name = '在线IP地理精确位置查询系统';
$date = date("Y-m-d H:i:s");//取得当前时间 datatime
?>