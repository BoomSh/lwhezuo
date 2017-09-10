<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:91:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view/menu/listsadd.html";i:1504936336;s:92:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view//Public/header.html";i:1504663244;s:92:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view//Public/footer.html";i:1504664540;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="__PUBLIC__admin/favicon.ico" >
<link rel="Shortcut Icon" href="__PUBLIC__admin/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__PUBLIC__admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->

<title>添加菜单</title>
<meta name="keywords" content="优科达">
<meta name="description" content="优科达">
</head>
<body>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>菜单名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="username" name="auth_name">
            </div>
        </div> 
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>控制器：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="username" name="auth_c">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>方法：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="username" name="auth_a">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">上级菜单：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                <select class="select" size="1" name="city">
                    <option value="0">主菜单</option>
                    <?php if(is_array($res) || $res instanceof \think\Collection): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo['id']; ?>"><?php echo $vo['auth_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                </span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">备注：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="remark" cols="" rows="" class="textarea"></textarea>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">拥有功能：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <label><input type="checkbox" name="auths" value="1"/>添加</label>
                <label><input type="checkbox" name="auths" value="2"/>修改</label>
                <label><input type="checkbox" name="auths" value="3"/>删除</label>
                <label><input type="checkbox" name="auths" value="4"/>修改</label>
                <label><input type="checkbox" name="auths" value="5"/>审查</label>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;" onclick="listsadd();return false;">
            </div>
        </div>
    </form>
</article>

<!--_footer 作为公共模版分离出去-->
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="__PUBLIC__admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
     
});
function listsadd(){
    var auth_name = $("input[name=auth_name]").val();
    var auth_c = $("input[name=auth_c]").val();
    var auth_a = $("input[name=auth_a]").val();
    var pid = $(".select").val();
    var remark = $(".textarea").val();
    var auths = '';
    $("input[name=auths]:checked").each(function(){
        auths += $(this).val()+",";
    }); 
    $.post("<?php echo url('Menu/listsadd'); ?>",{auth_name:auth_name,auth_c:auth_c,auth_a:auth_a,pid:pid,remark:remark,auths:auths},function(data){
        if(data == "success"){
                 layer.msg('添加成功!');
                setTimeout(function () {
                    parent.location.reload();
                },1000)
        }else{
            layer.msg(data);
        }
    })
}
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>