<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:89:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\cuscontract\water_list.html";i:1506649687;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\Public\header.html";i:1506649687;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\Public\footer.html";i:1506649687;}*/ ?>
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
<title>水表管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>水表列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
<form action="<?php echo url('Cuscontract/water_list'); ?>" method="get">
    <div class="bk-gray radius pd-10 col-xs-12 col-sm-12">
        <div class="mt-10 col-xs-12 col-sm-12">
            <strong class="col-xs-12 col-sm-2 text-r">选择园区：</strong>
            <div class="col-xs-12 col-sm-6">
                <span class="select-box inline">
                    <select name="park_id" class="select">
                        <?php if(is_array($res['park']) || $res['park'] instanceof \think\Collection): $i = 0; $__LIST__ = $res['park'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($park_id == $vo['id']): ?>
                            <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        <option value="0">全部园区</option>
                        <?php if(is_array($res['park']) || $res['park'] instanceof \think\Collection): $i = 0; $__LIST__ = $res['park'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($park_id != $vo['id']): ?>
                            <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </span>
            </div>
        </div>
        <div class="mt-10 col-xs-12 col-sm-12">
            <strong class="col-xs-12 col-sm-2 text-r">水表名称：<?php echo $res['sql']; ?></strong>
            <div class="col-xs-12 col-sm-6">
                <input type="text" class="input-text"  placeholder="输入水表名称" id="" value="<?php echo $name; ?>" name="name">
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
    <div class="cl pd-5 bg-1 bk-gray mt-20 col-xs-12 col-sm-12">
        <span class="l">
            <?php if($lw_role['del'] == 1): ?><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>　　<?php endif; if($lw_role['excelin'] == 1): ?><a href="javascript:;" onclick="member_add('导入抄表数据','water_excelin.html','','300')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe645;</i> 导入抄表数据</a><?php endif; ?>
        </span>
        <span class="r">
            共有数据：<strong><?php echo $res['num']; ?></strong> 条
        </span>
    </div>
    <div class="mt-20">
    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th style="display:none;">ID</th>
                <th>序号</th>
                <th>园区</th>
                <th>水表名</th>
                <!--<th>初始度数</th>-->
                <th>上期度数</th>
                <th>当前度数</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($res['list']) || $res['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $res['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><input type="checkbox" value="<?php echo $vo['id']; ?>" name="id"></td>
                <td style="display:none;"><?php echo $vo['k']; ?></td> 
                <td><?php echo $vo['num']; ?></td> 
                <td><?php echo $vo['name']; ?></td>
                <td><?php echo $vo['wname']; ?></td>
                <!--<td><?php echo $vo['init_record']; ?></td>-->
                <td><?php echo $vo['up_record']; ?></td>
                <td><?php echo $vo['current_record']; ?></td>
                <td class="td-manage">
                    <?php if($lw_role['edit'] == 1): ?><a title="编辑" href="javascript:;" onclick="member_edit('编辑','water_edit.html?id=<?php echo $vo['id']; ?>','4','','400')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a><?php endif; if($lw_role['del'] == 1): ?><a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo $vo['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a><?php endif; if($lw_role['add'] == 1): ?><a title="抄表" href="javascript:;" onclick="member_edit('抄表','water_add.html?id=<?php echo $vo['id']; ?>','4','','300')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe600;</i></a><?php endif; ?>
                    <a title="记录" href="javascript:;" onclick="member_show('抄表记录','waterhistory_list.html?id=<?php echo $vo['id']; ?>','300')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe720;</i></a>
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

<script type="text/javascript" src="__PUBLIC__admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui.admin/js/H-ui.admin.js"></script> 

<script type="text/javascript" src="__PUBLIC__admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
    $('.table-sort').dataTable({
        "searching": false,//禁用原生搜索 
        "bLengthChange": false,//禁用原生搜索 
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": false,//状态保存
        "aoColumnDefs": [
          //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
          {"orderable":false,"aTargets":[0,4]}// 制定列不参与排序
        ]
    });
    
});
/*用户-添加*/
function member_show(title,url,w,h){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
}
/*用户-添加*/
function member_add(title,url,w,h){
    layer_show(title,url,w,h);
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
    layer_show(title,url,w,h);
} 
/*用户-删除*/
function member_del(obj,id){
    layer.confirm('确认要删除吗？',function(index){
        $.post("<?php echo url('Cuscontract/water_del'); ?>",{id:id},function(data){
            if(data == "success"){
                layer.msg("删除成功");
                $(obj).parents("tr").remove();
            }else{
                layer.msg(data);
            }
        });   
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
        $.post("<?php echo url('Cuscontract/water_del'); ?>",{id:id},function(data){
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