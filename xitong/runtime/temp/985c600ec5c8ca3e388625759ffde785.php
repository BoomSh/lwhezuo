<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:91:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\finance\expenditure_list.html";i:1506657292;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\public\header.html";i:1506649687;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\public\footer.html";i:1506649687;}*/ ?>
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
<title>支出列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 财务管理 <span class="c-gray en">&gt;</span> 支出列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
  <form action="<?php echo url('Finance/expenditure_list'); ?>" method="post">
	<div class="bk-gray radius pd-10 col-xs-12 col-sm-12 ">
		<div class="mt-10 col-xs-12 col-sm-12">
			<strong class="col-xs-12 col-sm-2 text-r">客户类型：</strong>
			<div class="col-xs-12 col-sm-6">
				<span class="select-box inline">
					<select name="customer_type" class="select">
					    <option  value="">请选择客户类型</option>
						<option <?php if($customer_type == 1): ?>selected='selected'<?php endif; ?> value="1">客户</option>
						<option <?php if($customer_type == 2): ?>selected='selected'<?php endif; ?> value="2">业主</option>
						<option <?php if($customer_type == 3): ?>selected='selected'<?php endif; ?> value="3">外联</option>
					</select>
				</span>
			</div>
		</div>
		<div class="mt-10 col-xs-12 col-sm-12">
			<strong class="col-xs-12 col-sm-2 text-r">选择园区：</strong>
			<div class="col-xs-12 col-sm-6">
				<span class="select-box inline">
					<select name="park_id" class="select">
					    <option value="">全部园区</option>
						<?php if(is_array($res['park']) || $res['park'] instanceof \think\Collection): $i = 0; $__LIST__ = $res['park'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option <?php if($park_id == $vo['id']): ?>selected='selected'<?php endif; ?> value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span>
			</div>
		</div>
		<div class="mt-10 col-xs-12 col-sm-12">
			<strong class="col-xs-12 col-sm-2 text-r">支付方式：</strong>
			<div class="col-xs-12 col-sm-6">
				<span class="select-box inline">
					<select name="pay_type" class="select">
						<option value="" selected>请选择支付方式</option>
						<?php if(is_array($res['dictionary']) || $res['dictionary'] instanceof \think\Collection): $i = 0; $__LIST__ = $res['dictionary'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<option <?php if($pay_type == $vo['id']): ?>selected='selected'<?php endif; ?> value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</span>
			</div>
		</div>
		<div class="mt-10 col-xs-12 col-sm-12">
			<strong class="col-xs-12 col-sm-2 text-r">日期范围：</strong>
			<div class="col-xs-12 col-sm-3">
                <input type="text" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss',maxDate:'#F{\$dp.\$D(\'datemax\')}'})" id="datemin" class="input-text Wdate li-date" name="startime"  value="<?php echo $startime; ?>">
            </div>
            <div class="col-xs-12 col-sm-3">
                <input type="text" onfocus="WdatePicker({dateFmt: 'yyyy-MM-dd HH:mm:ss',minDate:'#F{\$dp.\$D(\'datemin\')}'})" id="datemax" class="input-text Wdate li-date" name="overtime"  value="<?php echo $overtime; ?>">
            </div>
		</div>
		<div class="cl mt-10 col-xs-12 col-sm-12">
			<strong class="col-xs-12 col-sm-2 text-r"></strong>
			<div class="col-xs-12 col-sm-6">
				<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
			</div>
		</div>
	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20 col-xs-12 col-sm-12">
		<span class="l">
			<?php if($lw_role['add'] == 1): ?><a href="javascript:;" onclick="admin_add('添加支出','<?php echo url('Finance/expenditure_add'); ?>','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加支出</a><?php endif; ?>
		</span>
		<span class="r">
			共有数据：<strong><?php echo $res['num']; ?></strong> 条
		</span>
	</div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="14">支出列表</th>
			</tr>
			<tr class="text-c">
				<th>序号</th>
				<th>日期</th>
				<th>类型</th>
				<th>园区</th>
				<th>付款人</th>
				<th>收款人</th>
				<th>支出项目</th>
				<th>支出方式</th>
				<th>金额</th>
				<th>备注</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		 <?php if(is_array($res['list']) || $res['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $res['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><?php echo $vo['num']; ?></td>
				<td><?php echo dateFormat($vo['pay_time']); ?></td>
				<td><?php echo customerType($vo['customer_type']); ?></td>
				<td><?php echo parkId($vo['park_id']); ?></td>
				<td><?php echo staffName($vo['payment_id']); ?></td>
				<td><?php echo customerName($vo['payee_id']); ?></td>
				<td><?php echo dictionaryName($vo['dictionary_id']); ?></td>
				<td><?php echo dictionaryName($vo['pay_type']); ?></td>
				<td><?php echo $vo['price']; ?></td>
				<td><?php echo $vo['remark']; ?></td>
				<td class="td-manage">
				<?php if($lw_role['edit'] == 1): ?>
                <a title="编辑" href="javascript:;" onclick="admin_edit('编辑','<?php echo url('Finance/expenditure_edit',array('id'=>$vo['id'])); ?>','4','','300')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                <?php endif; ?>
				</td>
			</tr>
		 <?php endforeach; endif; else: echo "" ;endif; ?>	
		</tbody>
	</table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__PUBLIC__admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要更改退款吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="正常" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">退款</span>');
		$(obj).remove();
		layer.msg('已更改退款!',{icon: 5,time:1000});
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要更改正常吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="退款" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">正常</span>');
		$(obj).remove();
		layer.msg('已更改正常!', {icon: 6,time:1000});
	});
}
</script>
</body>
</html>