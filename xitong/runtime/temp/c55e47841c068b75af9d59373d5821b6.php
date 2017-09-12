<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"/Users/wangchunlei/ykd99/lwhezuo/xitong/public/../application/admin/view/index/welcome.html";i:1505131053;}*/ ?>
﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
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
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<p class="f-20 text-success">欢迎使用物业管理系统！</p>
	<p>登录次数：<?php echo $admin['loginsum']; ?> </p>
	<p>上次登录IP：<?php echo $admin['last_ip']; ?>  上次登录时间：<?php echo $admin['last_time']; ?></p>
	<p>本月盈利情况</p>
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
		<tr class="text-c">
			<th rowspan="2">ID</th>
			<th rowspan="2">园区</th>
			<th rowspan="2">地址</th>
			<th rowspan="2">盈利</th>
			<th colspan="4">支出金额</th>
			<th colspan="4">收入金额</th>
		</tr>
		<tr class="text-c">
			<th>房租费</th>
			<th>水费</th>
			<th>电费</th>
			<th>总费用</th>
			<th>房租费</th>
			<th>水费</th>
			<th>电费</th>
			<th>总费用</th>
		</tr>
		</thead>
		<tbody>
		<tr class="text-c">
			<td>1</td>
			<td>河盛文创园</td>
			<td>深圳</td>
			<td>45000</td>
			<td>20000</td>
			<td>1000</td>
			<td>2000</td>
			<td>23000</td>
			<td>60000</td>
			<td>2000</td>
			<td>4000</td>
			<td>68000</td>
		</tr>
		<tr class="text-c">
			<td>2</td>
			<td>河盛文创园1</td>
			<td>深圳</td>
			<td>-45000</td>
			<td>60000</td>
			<td>2000</td>
			<td>4000</td>
			<td>68000</td>
			<td>20000</td>
			<td>1000</td>
			<td>2000</td>
			<td>23000</td>
		</tr>
		<tr class="text-c">
			<td>3</td>
			<td>河盛文创园2</td>
			<td>深圳</td>
			<td>-1000</td>
			<td>3000</td>
			<td>2000</td>
			<td>4000</td>
			<td>9000</td>
			<td>4000</td>
			<td>1600</td>
			<td>2400</td>
			<td>8000</td>
		</tr>
		</tbody>
	</table>
</div>
<footer class="footer mt-20">
	<div class="container">
		<p><a href="http://www.dino-tech.com/" target="_blank" title="多诺科技">多诺科技</a>提供前端技术支持</p>
	</div>
</footer>
<script type="text/javascript" src="__PUBLIC__admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="__PUBLIC__admin/static/h-ui/js/H-ui.min.js"></script> 

</body>
</html>