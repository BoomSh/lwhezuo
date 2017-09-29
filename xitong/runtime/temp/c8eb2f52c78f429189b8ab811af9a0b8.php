<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:94:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\report\report_contract_list.html";i:1506657480;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\public\header.html";i:1506649687;s:81:"F:\wamp64\www\lwhezuo\xitong\public/../application/admin\view\\public\footer.html";i:1506649687;}*/ ?>
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
    <title>合同报表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>报表管理 <span class="c-gray en">&gt;</span>合同报表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="bk-gray radius pd-10 col-xs-12 col-sm-12 ">
        <div class="mt-10 col-xs-12 col-sm-12">
            <strong class="col-xs-12 col-sm-2 text-r">选择园区：</strong>
            <div class="col-xs-12 col-sm-6">
				<span class="select-box inline">
					<select name="" class="select">
						<option value="0">全部园区</option>
                        <option value="1">河盛文创园</option>
                        <option value="2">河盛文创园1</option>
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
    <div class="cl pd-5 bg-1 bk-gray mt-20 col-xs-12 col-sm-12">
        <span class="l">
                <a href="exel/report-contract.xlsx" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe644;</i> 导出报表</a>
        </span>
        <span class="r">
            新签和同：<strong>12</strong>份 &nbsp;
            到期和同：<strong>2</strong>份
        </span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th>ID</th>
                <th>园区</th>
                <th>地址</th>
                <th>新签和同</th>
                <th>到期和同</th>
                <th>退租和同</th>
            </tr>
            </thead>
            <tbody>
            <tr class="text-c">
                <td>1</td>
                <td>河盛文创园</td>
                <td>深圳</td>
                <td>13</td>
                <td>2</td>
                <td>1</td>
            </tr>
            <tr class="text-c">
                <td>2</td>
                <td>河盛文创园1</td>
                <td>深圳</td>
                <td>7</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr class="text-c">
                <td>3</td>
                <td>河盛文创园2</td>
                <td>深圳</td>
                <td>100</td>
                <td>77</td>
                <td>5</td>
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
            "bPaginate": true,//翻页功能
            "bInfo": true,//页脚信息
            "bSort": true,//排序功能
            "aaSorting": [[ 1, "desc" ]],//默认第几个排序
            "bStateSave": false,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            ]
        });

    });
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