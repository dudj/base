<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>综合应用管理平台</title>
    <link rel="stylesheet" type="text/css" href="/public/easyui1.3/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/public/easyui1.3/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="/public/easyui1.3/css/css.css">
	<script type="text/javascript" src="/public/js/jquery-1.4.4.js"></script>
	<script type="text/javascript" src="/public/easyui1.3/jquery.easyui.min.js"></script>
	<script src="/public/layer/layer.js"></script>
	<script type="text/javascript" src="/public/js/public.js"></script>
	<script type="text/javascript" src="/public/js/date.js"></script>
	<script>
	function doSearch(){
		loaddata();
	}
	
	
	
	function shanchu(val,row){
		return '<a href="javascript:del('+row.id+');"><font color="red">删除</font></a>';
	}
	function xiugai(val,row){
		return '<a href="javascript:get_html(\'/admin/wechatrecord/update?id='+row.id+'\',\'修改\');"><font color="red">修改</font></a>';
	}
	
	function get_html(url,title){
		$fly.gethtml(url,title);
	}
	
	function xiangqing(val,row){
		return '<a href="javascript:get_html(\'/admin/wechatrecord/xiangqing?id='+row.id+'\',\'详情\')"><font color="red">详情</font></a>';
	}
	
	
	
	
	
	
	function del(id){
		$.messager.confirm('友情提示','确定要删除吗？',function(r){
		if (r){
			$.get('/admin/wechatrecord/del',{id:id},function(data){
				$('#mytable').datagrid('reload');
			});
		}
		});
		
	}
	
	function loaddata(){
		$("#all").css('height',$(document).height());
		$('#mytable').datagrid({
			//title: '商品列表',
			//iconCls: 'icon-edit',//图标
			//width: 'auto',
			//height: 'auto',
			fit: true,//自动大小
			nowrap: true,//字段长度自动截取 false换行
			striped: true,//显示行条纹
			url: '/admin/wechatrecord/list_page',
			queryParams:{starttime:$("input[name='starttime']").val(),endtime:$("input[name='endtime']").val()},
			remoteSort: false,
			//idField: 'id',
			singleSelect: false,//是否单选
			pagination: true,//分页控件
			//rownumbers: true,//行号
			fitColumns:false,//自适应列宽
			checkOnSelect:false,//如果设置为 true，当用户点击一行的时候 checkbox checked(选择)/unchecked(取消选择)。 如果为false，当用户点击刚好在checkbox的时候，checkbox checked(选择)/unchecked(取消选择)
			pagePosition:'both',//定义分页工具栏的位置.可用值有： 'top'，'bottom'，'both'。
			//showFooter:true,//定义是否显示行底（如果是做统计表格，这里可以显示总计等）
			sortName:'id',//默认排序字段
			sortOrder:'desc',//排序类型
			remoteSort:true,//远程排序
			columns: [[
			   { field: 'id', title: 'ID', align: 'center', width: 30,sortable:true },
			   { field: 'headimgurl', title: '头像', align: 'center', width: 100,sortable:true },
			   { field: 'nickname', title: '用户名', align: 'center', width: 100,sortable:true },
			   { field: 'content', title: '发送内容', align: 'center', width: 100,sortable:true },
			   { field: 'createtime', title: '创建时间', align: 'center', width: 125,sortable:true },
			   //{ field: 'huifu', title: '回复', align: 'center',formatter: xiugai, width: 50 },
			   
			]],
			toolbar: [{text: '导 出',iconCls: 'icon-redo',handler: function () {
                var win = $.messager.progress({
                    title:'请稍等',
                    msg:'正在导出...'
                });
                $.post('/admin/wechatrecord/list_page',{daochu:1,starttime:$("input[name='starttime']").val(),endtime:$("input[name='endtime']").val()},function(data){
                    data = eval('['+data+']');
                    data = data[0];
                    $.messager.progress('close');
                    if(data.result){
                        window.location.href='/wechatrecord.xls';
                    }
                });
            }}]
		});
		//设置分页控件
		var p = $('#mytable').datagrid('getPager');
		$(p).pagination({
			pageSize: 15,//每页显示的记录条数，默认为10
			pageList: [15,30,50,80,100,200],//可以设置每页记录条数的列表
			beforePageText: '第',//页数文本框前显示的汉字
			afterPageText: '页    共 {pages} 页',
			displayMsg: '共 {total} 条记录'
		});
	}
	
	$(document).ready(function(){
		loaddata();
	});


	</script>
</head>
<body>
<div id="all" style="width:100%; height:100%">

<div id="tb" style="border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #dddddd;width:100%;background-color: #F4F4F4;">
<div style="padding:8px;">
<form id="sea" name="sea">
		 <span>创建时间大于</span><input name="starttime" type="text"  onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" id="starttime" size="20" value="" class="easyui-validatebox" > 小于 <input name="endtime" type="text"  onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" id="endtime" value=""  size="20" class="easyui-validatebox"> 
		<input id="search" class="submit" type="button" onClick="doSearch()" value="搜 索">
		<input id="search" class="submit" type="button" onClick="sea.reset()" value="清除搜索">
 
</form></div></div>
<div id="rongqi" style="width:100%; height:89%">
<table id="mytable"></table>
</div>
	
</div>
</body>
</html>