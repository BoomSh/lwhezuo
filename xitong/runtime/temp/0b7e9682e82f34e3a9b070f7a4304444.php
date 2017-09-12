<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view/index/index.html";i:1505131053;}*/ ?>
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
<title>H-ui.admin v3.0</title>
<meta name="keywords" content="H-ui.admin v3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="http://664151.hao123.cn/">优科达</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="http://664151.hao123.cn/">优科达</a> 
            <span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span> 
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav class="nav navbar-nav">
                <ul class="cl">
                    <li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onclick="member_add('添加园区','park-list.html',500,400)"><i class="Hui-iconfont">&#xe616;</i> 园区</a></li>
                            <li><a href="javascript:;" onclick="member_add('添加收入','income-add.html',500,700)"><i class="Hui-iconfont">&#xe63a;</i> 收入</a></li>
                            <li><a href="javascript:;" onclick="member_add('添加支出','expendi-add.html',500,700)"><i class="Hui-iconfont">&#xe63a;</i> 支出</a></li>
                            <li><a href="javascript:;" onclick="member_add('添加业主和同','contract-add.html')"><i class="Hui-iconfont">&#xe636;</i> 业主和同</a></li>
                            <li><a href="javascript:;" onclick="member_add('添加客户和同','customer-contract-add.html')"><i class="Hui-iconfont">&#xe636;</i> 客户和同</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
            <ul class="cl">
                <li><?php echo $admin['role_name']; ?></li>
                <li class="dropDown dropDown_hover">
                    <a href="#" class="dropDown_A"><?php echo $admin['username']; ?><i class="Hui-iconfont">&#xe6d5;</i></a>
                    <ul class="dropDown-menu menu radius box-shadow">
                        <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                        <li><a href="<?php echo url('Login/out'); ?>">切换账户</a></li>
                        <li><a href="<?php echo url('Login/out'); ?>">退出</a></li>
                </ul>
            </li>
               <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li> 
                <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                    <ul class="dropDown-menu menu radius box-shadow">
                        <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                        <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                        <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                        <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                        <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                        <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
</header>
<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">
    <?php if(is_array($ban) || $ban instanceof \think\Collection): $i = 0; $__LIST__ = $ban;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <dl id="menu-article">
            <dt class="selected"><i class="Hui-iconfont">&#xe643;</i> <?php echo $vo['auth_name']; ?><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd style="display: block;">
                <ul>
                <?php if(is_array($vo['son']) || $vo['son'] instanceof \think\Collection): $i = 0; $__LIST__ = $vo['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                    <li><a data-href="__URL__<?php echo $v['auth_c']; ?>/<?php echo $v['auth_a']; ?>" data-title="<?php echo $v['auth_name']; ?>" href="javascript:void(0)"><?php echo $v['auth_name']; ?></a></li> 
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </dd>
        </dl>
    <?php endforeach; endif; else: echo "" ;endif; ?>
        <!-- <dl id="menu-article">
            <dt class="selected"><i class="Hui-iconfont">&#xe643;</i> 企业管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd style="display: block;">
                <ul>
                    <li><a data-href="company-list.html" data-title="公司信息" href="javascript:void(0)">公司信息</a></li> 
                    <li><a data-href="staff-list.html" data-title="员工管理" href="javascript:void(0)">员工管理</a></li>
                    <li><a data-href="park-list.html" data-title="园区管理" href="javascript:void(0)">园区管理</a></li>
                    <li><a data-href="house-list.html" data-title="房源管理" href="javascript:void(0)">房源管理</a></li>
                </ul>
            </dd>
        </dl>
        
        <dl id="menu-article">
            <dt class="selected"><i class="Hui-iconfont">&#xe60d;</i> 业主管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd style="display: block;">
                <ul>
                    <li><a data-href="owner-list.html" data-title="业主管理" href="javascript:void(0)">业主管理</a></li> 
                    <li><a data-href="contract-list.html" data-title="合同管理" href="javascript:void(0)">合同管理</a></li>
                    <li><a data-href="water-customer-list.html" data-title="水表管理" href="javascript:void(0)">水表管理</a></li>
                    <li><a data-href="electric-customer-list.html" data-title="电表管理" href="javascript:void(0)">电表管理</a></li>
                    <li><a data-href="owner-cost-list.html" data-title="业主费用" href="javascript:void(0)">业主费用</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-article">
            <dt class="selected"><i class="Hui-iconfont">&#xe6cc;</i> 客户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd style="display: block;">
                <ul>
                    <li><a data-href="customer-list.html" data-title="客户管理" href="javascript:void(0)">客户管理</a></li>
                    <li><a data-href="customer-contract-list.html" data-title="合同管理" href="javascript:void(0)">合同管理</a></li>
                    <li><a data-href="water-customer-list.html" data-title="水表管理" href="javascript:void(0)">水表管理</a></li>
                    <li><a data-href="electric-customer-list.html" data-title="电表管理" href="javascript:void(0)">电表管理</a></li>
                    <li><a data-href="customer-cost-list.html" data-title="客户费用" href="javascript:void(0)">客户费用</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-article">
            <dt class="selected"><i class="Hui-iconfont">&#xe63a;</i> 财务管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd style="display: block;">
                <ul>
                    <li><a data-href="income-list.html" data-title="收入管理" href="javascript:void(0)">收入管理</a></li>
                    <li><a data-href="expendi-list.html" data-title="支出管理" href="javascript:void(0)">支出管理</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-article">
            <dt class="selected"><i class="Hui-iconfont">&#xe61e;</i> 报表管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd style="display: block;">
                <ul>
                    <li><a data-href="report-park-list.html" data-title="园区面积报表" href="javascript:void(0)">园区面积报表</a></li>
                    <li><a data-href="report-park-profitloss-list.html" data-title="园区盈损报表" href="javascript:void(0)">园区盈损报表</a></li>
                    <li><a data-href="report-house-list.html" data-title="房源空置报表" href="javascript:void(0)">房源空置报表</a></li>
                    <li><a data-href="report-contract-list.html" data-title="合同报表" href="javascript:void(0)">合同报表</a></li>
                    <li><a data-href="report-waterletric-list.html" data-title="水电报表" href="javascript:void(0)">水电报表</a></li>
                    <li><a data-href="report-exprec-list.html" data-title="收支报表" href="javascript:void(0)">收支报表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-admin">
            <dt class="selected"><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd style="display: block;">
                <ul>
                    <li><a data-href="<?php echo url('Admin/admin_role'); ?>" data-title="角色管理" href="javascript:void(0)">角色管理</a></li>
                    <li><a data-href="<?php echo url('Admin/admin_list'); ?>" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-article">
            <dt class="selected"><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd style="display: block;">
                <ul>
                    <li><a data-href="<?php echo url('Menu/system_list'); ?>" data-title="系统设置" href="javascript:void(0)">系统设置</a></li>
                    <li><a data-href="<?php echo url('Menu/lists'); ?>" data-title="菜单管理" href="javascript:void(0)">菜单管理</a></li>
                    <li><a data-href="<?php echo url('Menu/dictionary_list'); ?>" data-title="字典管理" href="javascript:void(0)">字典管理</a></li>
                    <li><a data-href="<?php echo url('Menu/systemlog_list'); ?>" data-title="日志管理" href="javascript:void(0)">日志管理</a></li>
                </ul>
            </dd>
        </dl> -->
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="我的桌面" data-href="<?php echo url('Index/welcome'); ?>">我的桌面</span>
                    <em></em></li>
        </ul>
    </div>
        <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
</div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <iframe scrolling="yes" frameborder="0" src="<?php echo url('Index/welcome'); ?>"></iframe>
    </div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
    <ul>
        <li id="closethis">关闭当前 </li>
        <li id="closeall">关闭全部 </li>
</ul>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
$(function(){
    /*$("#min_title_list li").contextMenu('Huiadminmenu', {
        bindings: {
            'closethis': function(t) {
                console.log(t);
                if(t.find("i")){
                    t.find("i").trigger("click");
                }       
            },
            'closeall': function(t) {
                alert('Trigger was '+t.id+'\nAction was Email');
            },
        }
    });*/
});
/*个人信息*/
function myselfinfo(){
    layer.open({
        type: 1,
        area: ['300px','200px'],
        fix: false, //不固定
        maxmin: true,
        shade:0.4,
        title: '查看信息',
        content: '<div>姓名：admin</div>'
    });
}

/*用户-添加*/
function member_add(title,url,w,h){
    layer_show(title,url,w,h);
}


</script> 


</body>
</html>