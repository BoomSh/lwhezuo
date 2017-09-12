<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:100:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view/enterprise/garden_list.html";i:1505186499;s:92:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view//Public/header.html";i:1505131053;s:92:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view//Public/footer.html";i:1505131053;}*/ ?>
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
<title>园区信息</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 园区管理 <span class="c-gray en">&gt;</span>园区列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="bk-gray radius pd-10 col-xs-12 col-sm-12">
		<div class="mt-10 col-xs-12 col-sm-12">
			<strong class="col-xs-12 col-sm-2 text-r">园区名称：</strong>
			<div class="col-xs-12 col-sm-6">
				<input type="text" class="input-text" placeholder="输入园区名称" id="" name="">
			</div>
		</div>
		<div class="cl mt-10  col-xs-12 col-sm-12">
			<strong class="col-xs-12 col-sm-2 text-r"></strong>
			<div class="col-xs-12 col-sm-6">
				<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
			</div>
		</div>
	</div>
	<div class="cl pd-5 bg-1 bk-gray col-xs-12 col-sm-12 mt-20">
		<span class="l">
			<?php if($lw_role['del'] == 1): ?>
            <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
            <?php endif; ?>　
			<?php if($lw_role['add'] == 1): ?><a href="javascript:;" onclick="member_add('添加园区','<?php echo url('Enterprise/garden_add'); ?>','800','600')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加园区</a><?php endif; ?>
		</span>
		<span class="r">
			共有数据：<strong>1</strong> 条</span>
	</div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th>ID</th>
				<th>园区名称</th>
				<th>地址</th>
				<th>实际面积</th>
				<th>对公面积</th>
				<th>公司</th>
				<th>账户</th>
				<th>财务人</th>
				<th>联系电话</th>
				<th>管理人</th>
				<th>联系电话</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td>1</td> 
				<td>河盛文创园</td> 
				<td>深圳市龙华街道三联居委</td> 
				<td>1000</td>
				<td>1500</td>
				<td>优科达</td>
				<td>123232323</td>
				<td>小芳</td>
				<td>13304333453</td>
				<td>张三</td>
				<td>1232342342</td>
				<td class="td-manage"><a title="编辑" href="javascript:;" onclick="member_edit('编辑','park-add.html','4','350','400')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		</tbody>
	</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
 

<script type="text/javascript" src="__PUBLIC__admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/lib/laydate/laydate.js"></script>
<script type="text/javascript">
    //调用时间插件
    laydate({
        elem:"#laydate",  //ID选择器
        format:"YYYY-MM-DD hh:hh:hh",
        istime:true,
    });
    //调用时间插件
    laydate({
        elem:"#laydate2",  //ID选择器
        format:"YYYY-MM-DD hh:hh:hh",
        istime:true,
    });

</script>
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
        "aaSorting": [[ 1, "asc" ]],//默认第几个排序
        "searching": false,//禁用原生搜索
        "bLengthChange": false,//禁用原生搜索
        "bStateSave": false,//状态保存
        "aoColumnDefs": [
          //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
          {"orderable":false,"aTargets":[0,5]}// 制定列不参与排序
        ]
    });
	
});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
} 
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
} 
/*用户-删除*/
function member_del(obj,id){
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
$.dataTablesSettings = {
    processing : false,//是否显示加载中提示
    bAutoWidth : false,//是否自动计算表格各列宽度
    bPaginate : true,//是否显示使用分页
    bInfo : false,//是否显示页数信息
    sPaginationType : "full_numbers",//分页样式
    iDisplayLength : 10,//默认每页显示多少条记录
    searching : false,//是否显示搜索框
    bSort : false,//是否允许排序
    serverSide : true,//是否从服务器获取数据
    bStateSave : true,//页面重载后保持当前页
    bLengthChange : false,//是否显示每页大小的下拉框
    sServerMethod : "POST",
    language: {
        lengthMenu : "每页显示 _MENU_记录", 
        zeroRecords : "没有匹配的数据", 
        info : "第_PAGE_页/共 _PAGES_页", 
        infoEmpty : "没有符合条件的记录", 
        search : "查找", 
        infoFiltered : "(从 _MAX_条记录中过滤)", 
        paginate : { "first" : "首页 ", "last" : "末页", "next" : "下一页", "previous" : "上一页"}
    },
    //这里是为ajax添加自定义参数，给它添加的属性，它会传给后台
    fnServerParams : function (aoData) {
        aoData._rand = Math.random();
    }
};
</script> 
</body>
</html>