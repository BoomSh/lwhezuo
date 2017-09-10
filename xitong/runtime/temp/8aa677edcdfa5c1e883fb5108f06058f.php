<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\wamp64\www\xitong\public/../application/admin\view\login\login.html";i:1504933634;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link href="__PUBLIC__admin/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<script src="__LAYER__jquery-1.8.2.min.js" type="text/javascript"></script>
<script src="__LAYER__layer.js" type="text/javascript"></script>
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>后台登录 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header"></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="index-1.html" method="post">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="username" type="text" placeholder="账户" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" type="text" placeholder="验证码"  value="" style="width:150px;" name="code">
          <img src="<?php echo url('Login/verify'); ?>" class="form-label col-xs-3" > <a id="kanbuq" href="javascript:verify();">看不清，换一张</a> </div>
      </div>
      <!-- <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="1">
            使我保持登录状态</label>
        </div>
      </div> -->
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;" onclick="sub();return false;">
          <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer"></div>
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui/js/H-ui.min.js"></script>
<!--此乃百度统计代码，请自行删除-->
<script>
function sub(){
    var username = $("input[name=username]").val();
    var password = $("input[name=password]").val();
    var code = $("input[name=code]").val();
    var online = $("input[name=online]:checked").val();
    if(!username){
       layer.msg("请输入账户");return false;
    }
    if(!password){
       layer.msg("请输入密码");return false;
    }
    if(!code){
       layer.msg("请输入验证码");return false;
    }
    $.post("<?php echo url('Login/login'); ?>",{username:username,password:password,online:online,code:code},function(data){
        if(data == "success"){
            layer.msg("登录成功,正在跳转......");
                setInterval(function(){
                  location.href="<?php echo url('Index/index'); ?>";
                 },1000)
        }else{
            layer.msg(data);
            /**重新生成验证码**/
            var time = new Date().getTime();
            $(".col-xs-3").attr('src',"<?php echo url('Login/verify'); ?>?"+time);
        }
    })
    return false;
}
/**验证码更换**/
    function verify(){
        var time = new Date().getTime();
        $(".col-xs-3").attr('src',"<?php echo url('Login/verify'); ?>?"+time);
    }
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--/此乃百度统计代码，请自行删除
</body>
</html>