<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:95:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\cuscontract\cuscontract_list.html";i:1506650832;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\public\header.html";i:1506649687;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\public\footer.html";i:1506649687;}*/ ?>
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
<title>合同信息</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 客户管理 <span class="c-gray en">&gt;</span>合同列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
<form action="<?php echo url('Cuscontract/cuscontract_list'); ?>" method="get">
    <div class="bk-gray radius pd-10 col-xs-12 col-sm-12 ">
        <!-- <div class="mt-10 col-xs-12 col-sm-12">
            <strong class="col-xs-12 col-sm-2 text-r">日期范围：</strong>
            <div class="col-xs-12 col-sm-3">
                <input type="text" class="laydate-icon"  value="<?php echo $startime; ?>" placeholder="开始时间" id="laydate" name="startime" style="width:92%;">
            </div>
            <div class="col-xs-12 col-sm-3">
                <input type="text" class="laydate-icon"  value="<?php echo $overtime; ?>" placeholder="结束时间" id="laydate2" name="overtime" style="width:92%;">
            </div>
        </div> -->
        <div class="mt-10 col-xs-12 col-sm-12">
            <strong class="col-xs-12 col-sm-2 text-r">合同号：</strong>
            <div class="col-xs-12 col-sm-6">
                <input type="text" class="input-text" placeholder="输入合同号" id="" name="contract_num" value="<?php echo $contract_num; ?>">
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
             <?php if($lw_role['edit'] == 1): ?><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量退租</a>
<?php endif; ?>　
             <?php if($lw_role['add'] == 1): ?><a href="javascript:;" onclick="member_add('添加合同','cuscontract_add.html','','550')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加合同</a><?php endif; ?>
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
                <th>合同号</th>
                <th>出租方</th>
                <th>承租方</th>
                <th>园区</th>
                <!-- <th>房源</th> -->
                <th>租赁地址</th>
                <th>出租面积</th>
                <!-- <th>用途</th> -->
                <th>经营范围</th>
                <th>客户来源</th>
                <th>起租日期</th>
                <th>截止日期</th>
                <th>生效日期</th>
                <th>当月租金</th>
                <th>每月租金</th>
                <th>电价</th>
                <th>水价</th>
                <th>备注</th> 
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
         <?php if(is_array($res['list']) || $res['list'] instanceof \think\Collection): $i = 0; $__LIST__ = $res['list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><input type="checkbox" value="<?php echo $vo['id']; ?>" name="id"></td>
                <td style="display:none;"><?php echo $vo['k']; ?></td> 
                <td><?php echo $vo['num']; ?></td> 
                <td><?php echo $vo['contract_num']; ?></td> 
                <td><?php echo $vo['tname']; ?></td> 
                <td><?php echo $vo['pname']; ?></td>
                <td><?php echo $vo['kname']; ?></td>
                <!-- <td><?php echo $vo['house_id']; ?></td> -->
                <td>租凭地址</td>
                <td><?php echo $vo['lease_area']; ?></td>
                <!-- <td>用途</td> -->
                <td><?php echo $vo['business_scope']; ?></td>
                <td><?php echo $vo['client_source']; ?></td>
                <td><?php echo $vo['time_effect']; ?></td>
                <td><?php echo $vo['time_end']; ?></td>
                <td><?php echo $vo['time_begin']; ?></td>
                <td><?php echo $vo['first_rent']; ?></td>
                <td><?php echo $vo['basic_rent']; ?></td>
                <td><?php echo $vo['ele_deposit']; ?></td>
                <td><?php echo $vo['water_deposit']; ?></td>
                <td><?php echo $vo['remark']; ?></td> 
                <td class="td-manage">
                     <?php if($lw_role['edit'] == 1): ?><a title="编辑" href="javascript:;" onclick="member_edit('编辑','Cuscontract_edit.html?id=<?php echo $vo['id']; ?>','4','','550')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a><?php endif; if($lw_role['edit'] == 1): if($vo['status'] == 1): ?><a title="退租" href="javascript:;" onclick="member_del(this,'<?php echo $vo['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6a6;</i></a><?php endif; ?></td><?php endif; ?>
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

<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>


<script type="text/javascript" src="__PUBLIC__admin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/laypage/1.2/laypage.js"></script>

<script type="text/javascript">
$(function(){
    $('.table-sort').dataTable({
        "searching": false,//禁用原生搜索 
        "bLengthChange": false,//禁用原生搜索 
        "aaSorting": [[ 1, "asc" ]],//默认第几个排序
        "bStateSave": false,//状态保存
        "aoColumnDefs": [
          //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
          {"orderable":false,"aTargets":[0,19]}// 制定列不参与排序
        ]
    });
    
});
/*用户-添加*/
function member_add(title,url,w,h){
    var index = layer.open({
        type: 2,
        title: title,
        content: url
    });
    layer.full(index);
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
    layer.confirm('确认要退租吗？',function(index){
        $.post("<?php echo url('Cuscontract/cuscontract_status'); ?>",{id:id},function(data){
            if(data == "success"){
                layer.msg("退租成功");
                $(obj).remove();
            }else{
                layer.msg(data);
            }
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
function datadel(){
    layer.confirm('确认要退租吗？',function(index){
    if($(".text-c input[name='id']:checked").length > 0){
        var id = "";
        $(".text-c input[name='id']:checked").each(function() {
                             var reservation = $(this).val();
                             id += reservation + ",";
                        });
        length = id.length;
        id = id.substring(id,length-1);
        $.post("<?php echo url('Cuscontract/cuscontract_status'); ?>",{id:id},function(data){
            if(data == "success"){
                layer.msg("退租成功");
                $(".text-c input[name='id']:checked").each(function() {
                        var reservation = $(this).parents(".text-c");
                        reservation.hide();
                });
            }else{
                layer.msg(data);
            }
        })
    }else{
        layer.msg("请选择退租的合同");
        return false;
    }
})
}
</script> 
</body>
</html>