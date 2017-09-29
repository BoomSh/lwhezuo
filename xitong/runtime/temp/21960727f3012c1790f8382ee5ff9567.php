<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\finance\income_edit.html";i:1506657170;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\public\header.html";i:1506649687;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\public\footer.html";i:1506649687;}*/ ?>
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
<title>添加支出</title>
<meta name="keywords" content="优科达">
<meta name="description" content="优科达">
</head>
<body>
<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-member-add">
	  <input type="hidden" value="<?php echo $res['id']; ?>" name="id"></input>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>类型：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input type="radio" <?php if($res['customer_type'] == 1): ?>checked<?php endif; ?> id="customer_1" name="customer_type" value="1" >
					<label for="radio-2">客户</label>
				</div>
				<div class="radio-box">
					<input type="radio" <?php if($res['customer_type'] == 2): ?>checked<?php endif; ?> id="customer_2"  name="customer_type" value="2" >
					<label for="radio-1">业主</label>
				</div>
				<div class="radio-box">
					<input type="radio" <?php if($res['customer_type'] == 3): ?>checked<?php endif; ?> id="customer_3"  name="customer_type" value="3" >
					<label for="radio-1">外联</label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>园区：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text park_input" t_id='park_id' value="<?php echo parkId($res['park_id']); ?>" autocomplete="off" placeholder="" id="" name="park_name">
				<input type="hidden" value="<?php echo $res['park_id']; ?>" id="park_id" name="park_id"></input>
				<ul class="keyword_park keyword">
					
				</ul>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>付款人：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text payment_input" t_id='payment_id' value="<?php echo customerName($res['payment_id']); ?>" autocomplete="off" placeholder="" id="" name="payment_name">
				<input type="hidden" value="<?php echo $res['payment_id']; ?>" id="payment_id" name="payment_id"></input>
				<ul class="keyword_payment keyword">
					
				</ul>
			</div>
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>收款人：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text payee_input" t_id='payee_id' value="<?php echo staffName($res['payee_id']); ?>" autocomplete="off" placeholder="" id="" name="payee_name">
				<input type="hidden" value="<?php echo $res['payee_id']; ?>" id="payee_id" name="payee_id"></input>
				<ul class="keyword_payee keyword">
					
				</ul>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>费用科目：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select class="select" size="1" name="dictionary_id">
					<option value="" selected>请选择费用科目</option>
					<?php if(is_array($res['dictionarysele']) || $res['dictionarysele'] instanceof \think\Collection): $i = 0; $__LIST__ = $res['dictionarysele'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option <?php if($res['dictionary_id'] == $vo['id']): ?>selected='selected'<?php endif; ?> value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
				    <?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>付款时间：</label>
			<div class="formControls col-xs-8 col-sm-9">
                <input type="text" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss'})" placeholder="付款时间" value="<?php echo dateFormat($res['pay_time']); ?>" class="input-text Wdate li-date" name="pay_time" >
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>金额：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $res['price']; ?>" placeholder="" id="price" name="price">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>支付方式：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select class="select" size="1" name="pay_type">
					<option value="" selected>请选择支付方式</option>
					<?php if(is_array($res['paysele']) || $res['paysele'] instanceof \think\Collection): $i = 0; $__LIST__ = $res['paysele'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option <?php if($res['pay_type'] == $vo['id']): ?>selected='selected'<?php endif; ?> value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">自动抵扣欠费：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="check-box">
					<input type="checkbox" id="checkbox-1" name="demo-radio1">
					<label for="checkbox-1"></label>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">备注：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="remark" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"><?php echo $res['remark']; ?></textarea>
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
<script type="text/javascript" src="__PUBLIC__admin/lib/laydate/laydate.js"></script>
<script type="text/javascript">
    //调用时间插件
    laydate({
        elem:"#laydate",  //ID选择器
        format:"YYYY-MM-DD hh:hh:hh",
        istime:true,
    });

</script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$("#form-member-add").validate({
		rules:{
			park_name:{
				required:true,
			},
			payment_name:{
				required:true,
			},
			payee_name:{
				required:true,
			},
			dictionary_id:{
                required:true,
			},
			pay_time:{
				required:true,
			},
			price:{
				required:true,
			},
			pay_type:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
                type: 'post',
                url: "<?php echo url('Finance/income_edit'); ?>",
                success: function(data){
                    if(data == "success"){
                        layer.msg('修改成功!');
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
	//园区
	keyword($(".park_input"),$(".keyword_park"),1);
	//付款
	keyword($(".payment_input"),$(".keyword_payment"),3);
	//收款
	keyword($(".payee_input"),$(".keyword_payee"),2);
	
	
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
					url:"<?php echo url('Finance/expenditure_selectinfo'); ?>",
					data:{name:val,type:type,customer_type:$("input[name='customer_type']:checked").val()},
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