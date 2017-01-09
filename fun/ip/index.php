<?php
include_once ("common.php");
$ip=defense($_POST['ip']);//编辑框需要显示所以放在这里
?>
<html lang="zh-cn">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <title><?=$name?></title>
        <!--baidu
        <meta name="baidu-site-verification" content="4IPJiuihDj">
		-->
        <!-- Bootstrap -->
        <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.css" rel="stylesheet">
		<link href="http://cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <!--[if lt IE 9]>
            <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
			body{ margin: 0 auto; text-align: center; color: #777;} 
			.container { max-width: 580px; padding: 15px; margin: 0 auto; }
		    .N_new_list ul li{width:125px; overflow:hidden; font-size:15px; float:left; height:30px; line-height:30px;}
		</style>
        <script type="text/javascript">
			function getValue(obj, str) {
                var input = window.document.getElementById(obj);
                input.value = str;
            }
		</script>
    </head>
    
    <body background="../images/fzbeijing.png">
        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right" role="tablist">
                    <li role="presentation" class="active">
                        <a href="index.php">IP 查询</a></li>
                    <li role="presentation">
                        <a href="http://www.iyu.pub/">联系我们</a></li>
                </ul>
                <h3 class="text-muted" align="left">IP精确位置查询</h3></div>
            <hr>
            <h3 class="form-signin-heading">输入IP地址</h3>
            <div class="form-sign">(不要带http://）
				<form method="post" action="?">
					<input type="hidden" name="my" value="query">
					<input type="text" class="form-control" name="ip" value="<?=$ip?>" placeholder="请输入IP地址"><br>
					<input type="Submit" class="btn btn-primary btn-block" name="submit" value="确定查询">
				</form>
					<br>
					<hr>
<?php
if(isset($_POST['my'])=='query'){
	if(!$ip){msg('请输入IP操作！','index.php');}
	//if(!$url or !$code){ msg('请输入邀请链接及验证码！',1); }
	$content = get_curl('http://www.hao7188.com/ip/'.$ip.'.html');
	$ip1=getSubstr($content,'本站数据：','</li>');
	$ip2=getSubstr($content,'参考数据1：','</li>');
	$ip3=getSubstr($content,'参考数据2：','</li>');
	$ip4=getSubstr($content,'参考数据3：','</li>');
	$ip5=getSubstr($content,'参考数据4：','</li>');
	$ip6=getSubstr($content,'参考数据5：','</li>');
	$ip7=getSubstr($content,'参考数据6：','</li>');
	if(strstr($content,'提示：没有找到当前IP')){
	echo '
<ul class="list-group" style="text-align:left;">
	<li class="list-group-item">
		<p><img src="images/sz0.gif" /> 提示：没有找到当前IP: <a href="">'.$ip.'</a> 信息，请您重新查询.（可以更新到今天日期）</p>
	</li>
	<li class="list-group-item">
		<p><img src="images/sz1.gif" /> 说明：本IP: <a href="">'.$ip.'</a> 数据来自于互联网多个数据来源，尽可能确保准确，但由于极少数ip段属于全省或全国范围内动态分配机制，难以精确定位，查出的结果仅供参考,敬请留意。</p>
	</li>
	
</ul>
	';
	}else{
	echo '
<ul class="list-group" style="text-align:left;">
	<li class="list-group-item">
		<p><img src="images/sz0.gif" /> 本站数据：'.$ip1.'</p>
	</li>
	<li class="list-group-item">
		<p><img src="images/sz1.gif" /> 参考数据：'.$ip2.'</p>
	</li>
	<li class="list-group-item">
		<p><img src="images/sz5.gif" /> 参考数据：'.$ip3.'</p>
	</li>
	<li class="list-group-item">
		<p><img src="images/sz3.gif" /> 地理位置：'.$ip4.'</p>
	</li>
	<li class="list-group-item">
		<p><img src="images/sz4.gif" /> 地理位置：'.$ip5.'</p>
	</li>
	<li class="list-group-item">
		<p><img src="images/sz5.gif" /> 地理位置：'.$ip6.'</p>
	</li>
	<li class="list-group-item">
		<p><img src="images/sz6.gif" /> 地理位置：'.$ip7.'</p>
	</li>
	<li class="list-group-item">
		<p>最后更新日期：<font color="green">'.$date.'</font> 
		<br>已上数据由'.$name.'提供！请勿非法获取他人信息！</p>
	</li>
	
</ul>
	';
	}
}

?>
				<!--
				<div class="panel panel-default">
					<div class="panel-heading" style="color: #777;"> 最近查询的IP</div>
					<div class="panel-body">
					<ul class="N_new_list">
						<?php
						//$get_ipnum=get_curl('http://www.hao7188.com/ip/192.168.1.1.html');//定义一个IP防止错误
						//$ipnum_html=getSubstr($get_ipnum,'<div class="N_new_list">','</div>');
						//echo $ipnum_html;
						?>
					</ul>
					</div>
				</div>
				
                <div class="container-fluid">
                    <a href="http://www.iyu.pub" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-credit-card"></span>官网</a>
                    <a href="" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-exclamation-sign"></span>帮助</a>
                    <button type="button" class="btn btn-info btn-sm" data-toggle="collapse" data-target="#lxkf-1">
                        <span class="glyphicon glyphicon-user"></span>客服</button>
                    <a href="http://www.iyu.pub" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-pencil"></span>反馈</a>
                </div>
				-->
                <p style="text-align:center">
                    <br>© Powered by
                    <a href="http://www.iyu.pub">听风吟且行</a>
				</p>
			</div>
        </div>
	<!--播放器开始-->
	<div id="divQQbox" class="QQbox" style="left: -320px; top: 280px; ">
		<div id="divOnline" class="Qlist">
			<div class="OnlineLeft">
				<iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=450 src="http://music.163.com/outchain/player?type=0&id=461394441&auto=1&height=430"></iframe>
			</div>
			<div class="switch-player">
				<i class="fa fa-angle-right" style="margin-top: 32px;"></i>
			</div>
	  </div>
	</div>

	<link href="css/music.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/music.js"></script>
    </body>

</html>