<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:99:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view/detailed/detailed_add.html";i:1505182250;s:92:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view//Public/header.html";i:1505131053;s:92:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view//Public/footer.html";i:1505131053;}*/ ?>
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
<title>添加业主</title>
<meta name="keywords" content="优科达">
<meta name="description" content="优科达">
</head>
<body>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>业主名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="name" name="name">
            </div>
        </div> 
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>联系人：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="contact">
            </div>
        </div>   
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>别名：</label>
            <div class="formControls col-xs-4 col-sm-3">
                <input type="text" class="input-text" value="" placeholder="" id="" name="alias1">
            </div>
            <div class="formControls col-xs-4 col-sm-3">
                <input type="text" class="input-text" value="" placeholder="" id="" name="alias2">
            </div>
            <div class="formControls col-xs-4 col-sm-3">
                <input type="text" class="input-text" value="" placeholder="" id="" name="alias3">
            </div>
        </div> 
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">性别：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                <select class="select" size="1" name="sex">
                    <option value="" selected>请选择性别</option>
                    <option value="0">保密</option>
                    <option value="1">男</option>
                    <option value="2">女</option>
                </select>
                </span> </div>
        </div> 
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="email">
            </div>
        </div>  
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="mobile" name="mobile">
            </div>
        </div> 
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red"></span>电话：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="phone" name="phone">
            </div>
        </div> 
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">证件类型：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                <select class="select" size="1" name="number_type">
                    <option value="" selected>请选择证件类型</option>
                    <?php if(is_array($res) || $res instanceof \think\Collection): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                </span> </div>
        </div> 
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>证件号码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="id_number">
            </div>
        </div> 
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>地址：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="" id="" name="address">
            </div>
        </div> 
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">备注：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea name="remark" cols="" rows="" class="textarea"  placeholder="说点什么..."></textarea>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                <!--<input class="btn btn-primary radius" type="button" value="生成此客户的房租单">-->
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
     $("#form-member-add").validate({
        rules:{
            name:{
                required:true,
            },
            contact:{
                required:true,
            },
            mobile:{
                required:true,
                isMobile:true,
            },
            email:{
                required:true,
                email:true,
            },
            sex:{
                required:true,
            },
             number_type:{
                required:true,
            },
             id_number:{
                required:true,
            },
             address:{
                required:true,
            },
        },
        focusCleanup:true,
        success:"valid",
        submitHandler:function(form){
            $(form).ajaxSubmit({
                type: 'post',
                url: "<?php echo url('Detailed/detailed_add'); ?>",
                success: function(data){
                    if(data == "success"){
                        layer.msg('添加成功!');
                        setTimeout(function () {
                            parent.location.reload();
                            },1000)
                    }else{
                        layer.msg(data);
                        return false;
                    }
                },
            });
        }
    });
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>