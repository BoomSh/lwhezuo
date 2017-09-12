<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:98:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view/enterprise/staff_add.html";i:1505192462;s:92:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view//Public/header.html";i:1505131053;s:92:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view//Public/footer.html";i:1505131053;}*/ ?>
﻿<!DOCTYPE HTML>
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
<title>添加员工</title>
<meta name="keywords" content="优科达">
<meta name="description" content="优科达">
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="name">
			</div>
		</div> 
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>职称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="job_title" name="job_title">
			</div>
		</div>  
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div id="mobile" >
				<div>
					<div class="formControls col-xs-8 col-sm-4">
						<input type="text" class="input-text" value="" placeholder=""  name="mobile[]">
					</div>
					<div><span class='btn  radius ppremoveline'><i class='Hui-iconfont'>&#xe6a1;</i> </span></div>
				</div>

			</div>
			<div><a onclick="addChargeItem('mobile')" class="btn btn-default btn-sm">添加</a></div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>短号：</label>
			<div id="cornet" >
				<div>
					<div class="formControls col-xs-8 col-sm-4">
						<input type="text" class="input-text" value="" placeholder=""  name="cornet[]">
					</div>
					<div><span class='btn  radius ppremoveline'><i class='Hui-iconfont'>&#xe6a1;</i> </span></div>
				</div>

			</div>
			<div><a onclick="addChargeItem('cornet')" class="btn btn-default btn-sm">添加</a></div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>分机号：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="extension" name="extension">
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
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="address" name="address">
			</div>
		</div> 
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->


<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="__PUBLIC__admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
    $(".row").delegate(".ppremoveline","click",function(){
        $(this).parent().parent().remove();
        return false;
    });
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-member-add").validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				maxlength:16
			},
			sex:{
				required:true,
			},
			job_title:{
				required:true,
			},
			extension:{
                required:true,
			},
			"mobile[]":{
				required:true,
				isMobile:true,
			},
			"cornet[]":{
				required:true,
			},
			addresse:{
				required:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
                type: 'post',
                url: "<?php echo url('Enterprise/staff_add'); ?>",
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

var items_hash ={'mobile':2,'duan':2};
function addChargeItem(item_type) {
    var html ='<div>' +
		'<div class="formControls col-xs-8 col-sm-4">' +
		'<input type="text" class="input-text" value="" placeholder=""  name="'+item_type+'[]">' +
		'</div>' +
		'<div><span class="btn  radius ppremoveline"><i class="Hui-iconfont">&#xe6a1;</i> </span></div>' +
	'</div>';
    document.getElementById(item_type).insertAdjacentHTML('beforeEnd',html);
    items_hash[item_type]++;
    //潘潘加a链接无跳转效果
    return false;
}
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>