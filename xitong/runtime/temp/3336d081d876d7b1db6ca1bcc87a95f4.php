<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\menu\systemlog_list.html";i:1506649687;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\Public\header.html";i:1506649687;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\Public\footer.html";i:1506649687;}*/ ?>
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
<title>系统日志</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span>
    系统管理
    <span class="c-gray en">&gt;</span>
    系统日志
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">
<form action="<?php echo url('Menu/systemlog_list'); ?>" method="get">
    <div class="bk-gray radius pd-10 col-xs-12 col-sm-12 ">
        <div class="mt-10 col-xs-12 col-sm-12">
            <strong class="col-xs-12 col-sm-2 text-r">日期范围：</strong>
            <div class="col-xs-12 col-sm-3">
                <input type="text" onfocus="WdatePicker({maxDate:'#F{\$dp.\$D(\'datemax\')}'})" id="datemin" class="input-text Wdate li-date" name="startime"  value="<?php echo $startime; ?>">
            </div>
            <div class="col-xs-12 col-sm-3">
                <input type="text" onfocus="WdatePicker({minDate:'#F{\$dp.\$D(\'datemin\')}'})" id="datemax" class="input-text Wdate li-date" name="overtime"  value="<?php echo $overtime; ?>" >
            </div>
        </div>
        <div class="mt-10 col-xs-12 col-sm-12">
            <strong class="col-xs-12 col-sm-2 text-r">日志名称：</strong>
            <div class="col-xs-12 col-sm-6">
                <input type="text" class="input-text" placeholder="输入日志名称" id="" name="remarks" value="<?php echo $remarks; ?>">
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
        </span>
        <span class="r">共有数据：<strong><?php echo $res['num']; ?></strong> 条</span>
    </div>
<table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th style="display:none;">ID</th>
                <th width="80">序号</th>
                <th width="100">类型</th>
                <th>内容</th>
                <th width="17%">用户名</th>
                <th width="120">客户端IP</th>
                <th width="120">时间</th>
                <th width="70">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($res['list']) || $res['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $res['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><input type="checkbox" value="<?php echo $vo['id']; ?>" name="id"></td>
                <td style="display:none;"><?php echo $vo['k']; ?></td> 
                <td><?php echo $vo['num']; ?></td> 
                <td><?php echo $vo['result']; ?></td> 
                <td><?php echo $vo['remarks']; ?></td> 
                <td><?php echo $vo['user_name']; ?></td>
                <td><?php echo $vo['user_ip']; ?></td>
                <td><?php echo $vo['create_time']; ?></td>
                <td class="td-status">
                <!--<a title="详情" href="javascript:;" onclick="system_log_show(this,'10001')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe665;</i></a>-->
                <?php if($lw_role['del'] == 1): ?>
                    <a title="删除" href="javascript:;" onclick="system_log_del(this,'<?php echo $vo['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                <?php endif; ?>
                 </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div id="pageNav" class="pageNav"></div>
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
$(function(){
    $('.table-sort').dataTable({
        "searching": false,//禁用原生搜索
        "bLengthChange": false,//禁用原生选择显示多少
        "aaSorting": [[ 1, "asc" ]],//默认第几个排序
        "bStateSave":false,//状态保存
        "aoColumnDefs": [
          //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
          {"orderable":false,"aTargets":[0,7]}// 制定列不参与排序
        ]
    });
    
});

/*查看日志*/
function system_log_show(){
    
}
/*日志-删除*/
function system_log_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.post("<?php echo url('Menu/systemlog_del'); ?>",{id:id},function(data){
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
        $.post("<?php echo url('Menu/systemlog_del'); ?>",{id:id},function(data){
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