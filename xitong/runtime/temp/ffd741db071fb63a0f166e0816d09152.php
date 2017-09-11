<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"D:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\admin\admin_list.html";i:1505055147;s:81:"D:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\Public\header.html";i:1505047149;s:81:"D:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\Public\footer.html";i:1505047149;}*/ ?>
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
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
<form action="<?php echo url('Admin/admin_list'); ?>" method="get">
    <div class="bk-gray radius pd-10 col-xs-12 col-sm-12 ">
        <div class="mt-10 col-xs-12 col-sm-12">
            <strong class="col-xs-12 col-sm-2 text-r">日期范围：</strong>
            <div class="col-xs-12 col-sm-3">
                <input type="text" class="laydate-icon"  value="<?php echo $startime; ?>" placeholder="开始时间" id="laydate" name="startime" style="width:92%;">
            </div>
            <div class="col-xs-12 col-sm-3">
                <input type="text" class="laydate-icon"  value="<?php echo $overtime; ?>" placeholder="结束时间" id="laydate2" name="overtime" style="width:92%;">
            </div>
        </div>
        <div class="mt-10 col-xs-12 col-sm-12">
            <strong class="col-xs-12 col-sm-2 text-r">管理员名称：</strong>
            <div class="col-xs-12 col-sm-6">
                <input type="text" class="input-text" placeholder="输入管理员名称" id="" name="username" value="<?php echo $username; ?>">
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
            <?php if($lw_role['del'] == 1): ?><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a><?php endif; ?>　
            <?php if($lw_role['add'] == 1): ?>
            <a href="javascript:;" onclick="admin_add('添加管理员','<?php echo url('Admin/admin_add'); ?>','800','600')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a>
            <?php endif; ?>
        </span>
        <span class="r">
            共有数据：<strong><?php echo $res['num']; ?></strong> 条
        </span>
    </div>
    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
        <tr>
            <th scope="col" colspan="9">员工列表</th>
        </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th style="display:none;">ID</th>
                <th>序号</th>
                <th>登录名</th>
                <th>手机</th>
                <th>邮箱</th>
                <th>角色</th>
                <th>加入时间</th>
                <th>是否已启用</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($res['list']) || $res['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $res['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><input type="checkbox" value="<?php echo $vo['id']; ?>" name="id"></td>
                <td style="display:none;"><?php echo $vo['k']; ?></td> 
                <td><?php echo $vo['num']; ?></td> 
                <td><?php echo $vo['username']; ?></td> 
                <td><?php echo $vo['mobile']; ?></td> 
                <td><?php echo $vo['email']; ?></td>
                <td><?php echo $vo['role']; ?></td>
                <td><?php echo $vo['addtime']; ?></td>
                <td class="td-status"><?php if($vo['state'] == 1): ?><span class="label label-success radius">已启用</span><?php else: ?><span class="label radius">已停用</span><?php endif; ?></td>
                <td class="td-manage">
                <?php if($lw_role['status'] == 1): if($vo['state'] == 1): ?><a style="text-decoration:none" onClick="admin_stop(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a><?php else: ?><a style="text-decoration:none" onClick="admin_start(this,'<?php echo $vo['id']; ?>')" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe615;</i></a> <?php endif; endif; if($lw_role['edit'] == 1): ?>
                <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','<?php echo url('Admin/admin_edit',array('id'=>$vo['id'])); ?>','2','800','600')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                <?php endif; if($lw_role['del'] == 1): ?>
                 <a title="删除" href="javascript:;" onclick="admin_del(this,'<?php echo $vo['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
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
        "searching": false,//禁用原生搜索
        "bLengthChange": false,//禁用原生选择显示多少
        "aaSorting": [[ 1, "asc" ]],//默认第几个排序
        "bStateSave":false,//状态保存
        "aoColumnDefs": [
          //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
          {"orderable":false,"aTargets":[0,8]}// 制定列不参与排序
        ]
    });
    
});
/*
    参数解释：
    title   标题
    url     请求的url
    id      需要操作的数据id
    w       弹出层宽度（缺省调默认值）
    h       弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
    layer_show(title,url,w,h);
}
/*管理员-删除*/
function admin_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.post("<?php echo url('Admin/admin_del'); ?>",{id:id},function(data){
            if(data == "success"){
                layer.msg("删除成功");
                $(obj).parents("tr").remove(); 
            }else{
                layer.msg(data);
            }
        })
    });
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
    layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){
    layer.confirm('确认要停用吗？',function(index){
        //此处请求后台程序，下方是成功后的前台处理……
        $.post("<?php echo url('Admin/admin_state'); ?>",{id,id,type:2},function(data){
            if(data == "success"){
                var status = $(obj).parents("tr").find(".td-status");
                $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,'+id+')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
                status.html("<span class='label radius'>已停用</span>");
                $(obj).remove();
                layer.msg('已停用!',{icon: 5,time:1000});
            }else{
                layer.msg('操作失败');
            }
        })
    });
}

/*管理员-启用*/
function admin_start(obj,id){
    layer.confirm('确认要启用吗？',function(index){
        $.post("<?php echo url('Admin/admin_state'); ?>",{id,id,type:1},function(data){
            if(data == "success"){
                var status = $(obj).parents("tr").find(".td-status");
                 //此处请求后台程序，下方是成功后的前台处理……
                $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,'+id+')" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
                status.html("<span class='label label-success radius'>已启用</span>");
                $(obj).remove();
                layer.msg('已启用!', {icon: 6,time:1000});
            }else{
                layer.msg('操作失败');
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
        $.post("<?php echo url('Admin/admin_del'); ?>",{id:id},function(data){
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