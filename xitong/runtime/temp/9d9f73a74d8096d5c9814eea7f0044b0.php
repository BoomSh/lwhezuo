<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:99:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view/enterprise/staff_list.html";i:1505207897;s:92:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view//Public/header.html";i:1505131053;s:92:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view//Public/footer.html";i:1505131053;}*/ ?>
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
<title>员工信息</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 企业管理 <span class="c-gray en">&gt;</span>员工列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
  <form action="<?php echo url('Enterprise/staff_list'); ?>" method="post">
	<div class="bk-gray radius pd-10 col-xs-12 col-sm-12">
		<div class="mt-10 col-xs-12 col-sm-12">
			<strong class="col-xs-12 col-sm-2 text-r">员工名称：</strong>
			<div class="col-xs-12 col-sm-6">
				<input type="text" class="input-text" placeholder="输入员工名称" id="" name="name">
			</div>
		</div>
		<div class="cl mt-10 col-xs-12 col-sm-12">
			<strong class="col-xs-12  col-sm-2 text-r"></strong>
			<div class="col-xs-12 col-sm-6">
				<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
			</div>
		</div>
	</div>
  </form>	
	<div class="cl pd-5 bg-1 bk-gray col-xs-12 col-sm-12  mt-20">
		<span class="l">
			<?php if($lw_role['del'] == 1): ?>
            <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
            <?php endif; ?>　
			<?php if($lw_role['add'] == 1): ?><a href="javascript:;" onclick="member_add('添加员工','<?php echo url('Enterprise/staff_add'); ?>','800','600')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加员工</a><?php endif; ?>
		</span>
		<span class="r">

		</span>
	</div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th>ID</th>
				<th>姓名</th>
				<th>职称</th>
				<th>手机</th>
				<th>短号</th>
				<th>分机号</th>
				<th>性别</th>
				<th>地址</th> 
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		  <?php if(is_array($res['list']) || $res['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $res['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?php echo $vo['id']; ?>" name="id"></td>
				<td><?php echo $vo['num']; ?></td> 
				<td><?php echo $vo['name']; ?></td> 
				<td><?php echo $vo['job_title']; ?></td> 
				<td><?php echo $vo['mobile'][0]; ?></td>
				<td><?php echo $vo['cornet'][0]; ?></td>
				<td><?php echo $vo['extension']; ?></td>
				<td><?php echo $vo['sex']; ?></td>
				<td><?php echo $vo['address']; ?></td> 
				<td class="td-manage">
					<?php if($lw_role['edit'] == 1): ?>
                <a title="编辑" href="javascript:;" onclick="member_edit('编辑','<?php echo url('Enterprise/staff_edit',array('id'=>$vo['id'])); ?>','4','','300')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                <?php endif; if($lw_role['del'] == 1): ?>
                 <a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo $vo['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                 <?php endif; ?>
				</td>
			</tr>
		  <?php endforeach; endif; else: echo "" ;endif; ?>	
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
        $.post("<?php echo url('Enterprise/staff_del'); ?>",{id:id},function(data){
            if(data == "success"){
                layer.msg("删除成功");
                $(obj).parents("tr").remove();
            }else{
                layer.msg(data);
            }
        })     
    });
}
function datadel(){
    layer.confirm('确认要删除吗？',function(index){
    if($(".text-c input[name='id']:checked").length > 0){
        var id = "";
        $(".text-c input[name='id']:checked").each(function() {
                             var reservation = $(this).val();
                             id += reservation + ",";
                        });
        length = id.length;
        id = id.substring(id,length-1);
        $.post("<?php echo url('Enterprise/staff_del'); ?>",{id:id},function(data){
            if(data == "success"){
                layer.msg("删除成功");
                $(".text-c input[name='id']:checked").each(function() {
                        var reservation = $(this).parents(".text-c");
                        reservation.hide();
                });
            }else{
                layer.msg(data);
            }
        })
    }else{
        layer.msg("请选择删除的信息");
        return false;
    }
})
}
</script> 
</body>
</html>