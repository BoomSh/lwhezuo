<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:88:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\enterprise\garden_add.html";i:1506650840;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\public\header.html";i:1506649687;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\public\footer.html";i:1506649687;}*/ ?>
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

<title>添加园区</title>
<meta name="keywords" content="优科达">
<meta name="description" content="优科达">
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-member-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>园区名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="name">
			</div>
		</div> 
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>地址：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="address" name="address">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>公司：</label>
				<div class="formControls col-xs-8 col-sm-9" style="position: relative;">
					<input type="text" class="input-text company_input" value="" t_id='company_id' autocomplete="off" placeholder="" id="" name="company_name">
					<input type="hidden" value="" id="company_id" name="company_id"></input>
					<ul class="keyword_company keyword">
						
					
					</ul>
				</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>账户：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text bank_input" t_id='bank_id' value="" autocomplete="off" placeholder="" id="" name="bank_name">
				<input type="hidden" value="" id="bank_id" name="bank_id"></input>
				<ul class="keyword_bank keyword">
					
				</ul>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>财务人：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text money_input" t_id='finance_id' value="" autocomplete="off" placeholder="" id="" name="finance_name">
				<input type="hidden" value="" id="finance_id" name="finance_id"></input>
				<ul class="keyword_money keyword">
					
				</ul>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理人：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text person_input" t_id='managers_id' value="" autocomplete="off" placeholder="" id="" name="managers_name">
				<input type="hidden" value="" id="managers_id" name="managers_id"></input>
				<ul class="keyword_person keyword">
				
				</ul>
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
			address:{
				required:true,
			},
			company_name:{
				required:true,
			},
			bank_name:{
				required:true,
			},
			finance_name:{
                required:true,
			},
			managers_name:{
				required:true,
			},
			
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
                type: 'post',
                url: "<?php echo url('Enterprise/garden_add'); ?>",
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
	//公司
	keyword($(".company_input"),$(".keyword_company"),1);
	//账户
	keyword($(".bank_input"),$(".keyword_bank"),2);
	//财务
	keyword($(".money_input"),$(".keyword_money"),3);
	//管理人
	keyword($(".person_input"),$(".keyword_person"),4);
	
	/*keyword模糊搜索函数
	 * input输入框
	 * downmask下拉框
	 * 
	 * */
	function keyword(input,downmask,type){
		input.bind('input porpertychange',function(e){
			var val = $(this).val();
			$("#"+input.attr('t_id')+"").val('');
			if(val){
				var html ="";
				$.ajax({
					type:"post",
					url:"<?php echo url('Enterprise/garden_selectinfo'); ?>",
					data:{name:val,type:type,company_id:$('#company_id').val()},
					success:function(data){
						$.each(data,function(index,value){
                            html += "<li p_id='"+value['id']+"'>"+value['name']+"</li>";
						});
                        downmask.html(html);
                        downmask.show();
						downmask.find('li').mouseover(function(e){
		 					$(this).css('background-color','#5a98de');
		 					$(this).css('color','#fff');
		 					$(this).siblings().css('background-color','');
		 					$(this).siblings().css('color','');
		 				})
		 				downmask.find('li').bind('click').on('click',function(e){
		 					e.stopPropagation();
		 					input.val($(this).html());
		 					$("#"+input.attr('t_id')+"").val($(this).attr('p_id'));
		 					
		 					$(this).closest('ul').hide();
		 				})
					},
					async:true
				});
			}else{
				downmask.hide();
			}
			$(document).click(function(e){
				e.stopPropagation();
				downmask.hide();
			})
		})
	}
	 
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>