<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="format-detection" content="telephone=no">
        <title>身份证照片生成器</title>
       <link href="//cdn.bootcss.com/FrozenUI/1.3.0/css/frozen.css" rel="stylesheet">
      
       <script src="//cdn.bootcss.com/FrozenUI/1.3.0/lib/zepto.min.js"></script>
        <script src="//cdn.bootcss.com/FrozenUI/1.3.0/js/frozen.js"></script>
    </head>
    <body ontouchstart="">
        <header class="ui-header ui-header-positive ui-border-b">
            <i class="ui-icon-return" onclick="history.back()"></i><h1>身份证照片生成器</h1><a href="http://www.iyu.pub/"><button class="ui-btn">回首页</button></a>
        </header>
        <footer class="ui-footer ui-footer-btn">
            <ul class="ui-tiled ui-border-t">
                <li data-href="index.html" class="ui-border-r"><div>基础样式</div></li>
                <li data-href="ui.html" class="ui-border-r"><div>UI组件</div></li>
                <li data-href="js.html"><div>JS插件</div></li>
            </ul>
        </footer>
        <section class="ui-container">
            <section id="tab">
            	<div class="demo-item">
            		
            		<div class="demo-block">
            			<div class="ui-tab">
            			    <ul class="ui-tab-nav ui-border-b">
            			        <li class="current">正面生成</li>
            			        <li>背面生成</li>
            			    
            			    </ul>
            			    <ul class="ui-tab-content" style="width:300%">
            			        <li>
            			            <div class="ui-form ui-border-t">
    <form action="./post.php" method="post">
        <div class="ui-form-item ui-border-b">
            <label>
                姓名
            </label>
            <input type="text" placeholder="请输入姓名" name="xm">
            <a href="#" class="ui-icon-close">
            </a>
        </div>
        <div class="ui-form-item ui-border-b">
            <label>性别</label>
            <div class="ui-select-group">
                <div class="ui-select">
                    <select name="xba">
                        <option selected value ="男">男</option>
                        <option value ="女">女</option>
                    </select>
                </div></div></div>
         <div class="ui-form-item ui-border-b">
            <label>
                出生年月
            </label>
            <input type="text" placeholder="格式:1900-11-11" name="cs">
            <a href="#" class="ui-icon-close">
            </a>
        </div>
         <div class="ui-form-item ui-border-b">
            <label>
                民族
            </label>
            <input type="text" placeholder="民族" value="汉" name="mz">
            <a href="#" class="ui-icon-close">
            </a>
        </div>
        <div class="ui-form-item ui-form-item-textarea ui-border-b">
            <label>
                住址
            </label>
            <textarea placeholder="家庭住址详细地址" name="zhuzhi"></textarea>
        </div>
        
        <div class="ui-form-item ui-border-b">
            <label>
                头像URL
            </label>
            <input type="text" placeholder="头像图片地址，http://开头"  name="tx">
            <a href="#" class="ui-icon-close">
            </a>
        </div>
        <div class="ui-form-item ui-form-item-l ui-border-b">
            <label class="ui-border-r">
                身份证号
            </label>
            <input type="text" placeholder="请输入身份证号码" name="hm">
            <a href="#" class="ui-icon-close">
            </a>
        </div>
        <input type="hidden" name="yz" value="zm">
        <div class="ui-notice-btn">
       <input type="submit" value="生成"  class="ui-btn-primary ui-btn-lg" />
    </div>
    
    </form>
</div></li>
            			        <li> <div class="ui-form ui-border-t">
    <form action="./post.php" method="post">
        <div class="ui-form-item ui-border-b">
            <label>
                签发机关
            </label>
            <input type="text" placeholder="请输入姓名" name="qfdw">
            <a href="#" class="ui-icon-close">
            </a>
        </div>
         <div class="ui-form-item ui-border-b">
            <label>
                有效期限
            </label>
            <input type="text" placeholder="格式:2008.11.21-2028.11.21" name="yxq" value ="2008.11.21-2028.11.21">
            <a href="#" class="ui-icon-close">
            </a>
        </div>
         
        <input type="hidden" name="yz" value="bm">
        <div class="ui-notice-btn">
       <input type="submit" value="生成"  class="ui-btn-primary ui-btn-lg" />
    </div>
    
    </form>
</div></li>
            			        
            			    </ul>
            			</div>
            		</div>
            		<script class="demo-script">
            		
                    </script>
            	</div>
            </section>
            <div class="ui-tips ui-tips-info">
    <i></i><span>本软件仅供学习交流之用，请勿用于非法用途,否则后果作者概不负责！<a href="http://www.iyu.pub/" target="_blank" title="我们的旅途"></span>
</div>
<div class="ui-tips ui-tips-info">
    <i></i><span>使用前请制作一张背景透明的头像PNG图片,尺寸128px*145px,制作好之后传到图床，获取到图片的url</span>
</div>
            
        </section>
        <script src="../lib/zepto.min.js"></script>
        <script src="../js/frozen.js"></script>
        <script>
        (function (){
            var tab = new fz.Scroll('.ui-tab', {
                role: 'tab',
                autoplay: false,
                interval: 3000
            });
            /* 滑动开始前 */
            tab.on('beforeScrollStart', function(fromIndex, toIndex) {
                console.log(fromIndex,toIndex);// from 为当前页，to 为下一页
            })
        })();
        </script>
    </body>
    
</html>