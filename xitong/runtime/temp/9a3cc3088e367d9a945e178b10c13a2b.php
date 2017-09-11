<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:89:"D:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\enterprise\company_add.html";i:1505133055;s:81:"D:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\Public\header.html";i:1505047149;s:81:"D:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\Public\footer.html";i:1505047149;}*/ ?>
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

<title>添加公司</title>
<meta name="keywords" content="优科达">
<meta name="description" content="优科达">
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>公司名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="name">
			</div>
		</div> 
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>统一社会信用代码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="license_number" name="license_number">
			</div>
		</div> 
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="address" name="address">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>法人代表：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="legal" name="legal">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>联系电话：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="legal_mobile" name="legal_mobile">
			</div>
		</div>
		<div class="row cl zhanghu" >
			<div id="rent">
				<div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">银行账户：</label>
			<div class="formControls col-xs-8 col-sm-6"> <span class="select-box">
				<select class="select" size="1" name="bankname[]">
					<option value="" selected>请选择开户银行</option>
					<?php if(is_array($bank) || $bank instanceof \think\Collection): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span> </div>
		</div>
		<div class="row cl" >
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>银行账号：</label>
			<div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" placeholder="@" name="bank_number[]" />
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>银行户名：</label>
			<div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" placeholder="@" name="bank_name[]" />
			</div>
			<div>
				<span class='btn  radius ppremoveline'><i class='Hui-iconfont'>&#xe6a1;</i> </span>
			</div>
		</div>
		</div>
		</div>
		</div>
		<a onclick="addChargeItem('rent')" class="btn btn-default btn-sm">添加</a>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">对接联系人：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="contact" name="contact">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="contact_mobile" name="contact_mobile">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">固定电话：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="contact_phone" name="contact_phone">
			</div>
		</div>
		 
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="remark" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" onKeyUp="$.Huitextarealength(this,100)"></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
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
    $(".zhanghu").delegate(".ppremoveline","click",function(){
        $(this).parent().parent().parent().remove();
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
			license_number:{
				required:true,
			},
			address:{
				required:true,
			},
			legal:{
				required:true,
			},
			legal_mobile:{
				required:true,
				isMobile:true,
			},
			"bank_number[]":{
				required:true,
				number:true,
			},
			"bank_name[]":{
				required:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
                type: 'post',
                url: "<?php echo url('Enterprise/company_add'); ?>",
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
var items_hash ={'rent':2};
function addChargeItem(item_type) {
    var html ='<div><div class="row cl"><label class="form-label col-xs-4 col-sm-3">银行账户：</label>' +
		'<div class="formControls col-xs-8 col-sm-6"> <span class="select-box">' +
		'<select class="select" size="1" name="bankname[]">' +
		'<option value="" selected>请选择开户银行</option>' +
		'<?php if(is_array($bank) || $bank instanceof \think\Collection): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo $v["id"]; ?>"><?php echo $v["name"]; ?></option><?php endforeach; endif; else: echo "" ;endif; ?>'+
		'</select>' +
		' </span> </div>' +
		'</div>' +
		'<div class="row cl" >' +
		'<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>私人账号：</label>' +
		'<div class="formControls col-xs-8 col-sm-6">' +
		'<input type="text" class="input-text" placeholder="@" name="bank_number[]" />' +
		'</div>' +
		'</div>' +
		'<div class="row cl">' +
		'<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>私人户名：</label>' +
		'<div class="formControls col-xs-8 col-sm-6">' +
		'<input type="text" class="input-text" placeholder="@" name="bank_name[]" />' +
		'</div>' +
		'<div>' +
		'<span class="btn  radius ppremoveline"><i class="Hui-iconfont">&#xe6a1;</i> </span></div></div></div>';
    document.getElementById(item_type).insertAdjacentHTML('beforeEnd',html);
    items_hash[item_type]++;
    //潘潘加a链接无跳转效果
    return false;
}
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>