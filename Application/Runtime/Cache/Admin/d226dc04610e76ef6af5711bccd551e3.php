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
	<script type="text/javascript" src="/public/js/public.js"></script>
	<script>
	var editingId;
	var parid = 0;
	
	function edit(rowid){
		if(typeof(rowid)!='undefined'){
			$('#tt').treegrid('beginEdit', rowid);
			return;
		}
		if (editingId != undefined){
			$('#tt').treegrid('select', editingId);
			return;
		}
		var row = $('#tt').treegrid('getSelected');
		if (row){
			editingId = row.id
			$('#tt').treegrid('beginEdit', editingId);
		}
	}
		
	function cancel(){
			if (editingId != undefined){
				$('#tt').treegrid('cancelEdit', editingId);
			}
			if(editingId>1000000){
				$('#tt').treegrid('remove', editingId);
			}
			editingId = undefined;
			iid = 1;
		}	
		
	function save(){
			if (editingId != undefined){
				var t = $('#tt');
				t.treegrid('endEdit', editingId);
				var rows = t.treegrid('getChildren');
				for(var i=0; i<rows.length; i++){
					var row = rows[i];
					if(row.id == editingId){
					if(editingId>1000000){
						var url = '/admin/class/saveadd';
						var param = {parentid:parid,name:row.name,order:row.order};
					}else{
						var url = '/admin/class/saveupdate';
						var param = {id:editingId,name:row.name,order:row.order};
					}
						$.post(url,param,function(data){
							data = eval('['+data+']');
							data = data[0];
							//$.messager.alert('友情提示',data.message);
							editingId = undefined;
						});
						iid = 1;
					}
				}
			}
		}	
		
	function onContextMenu(e,row){
			parid = row.id;
			e.preventDefault();
			$(this).treegrid('select', row.id);
			if(row.parentid==0){
				$('#mm2').menu('show',{
					left: e.pageX,
					top: e.pageY
				});
			}else{
				$('#mm').menu('show',{
					left: e.pageX,
					top: e.pageY
				});
			}
		}	
		
	var indexid = 1000000;
	var iid = 1;
	function append(){
			if(iid>1){
				$.messager.alert('友情提示','请填写分类');
				return;
			}
			indexid++;
			iid++;
			var node = $('#tt').treegrid('getSelected');
			$('#tt').treegrid('append',{
				parent: node.id,
				data: [{
					id: indexid,
					name: ''
				}]
			});
			edit(indexid);
			editingId = indexid;
		}	
		
	function removeIt(){
		$.messager.confirm('友情提示','确定要删除吗？',function(r){
			if (r){
				var node = $('#tt').treegrid('getSelected');
				if (node){
					$.post('/admin/class/del',{id:node.id},function(data){
						data = eval('['+data+']');
						data = data[0];
						if(typeof(data)!='undefined' && data.result==false){
							$.messager.alert('友情提示',data.message);return false;
						}
						$('#tt').treegrid('remove', node.id);
					});
					
				}
			}
		});
	}	
		
			
		
	$(document).ready(function(){
	$("#all").css('height',$(document).height());
		$('#tt').treegrid({
			idField:'id',
			fit: true,//自动大小
			url:'/admin/class/getlist',
			treeField:'name',//名称
			iconCls: 'icon-ok',
			rownumbers: true,
			animate: true,
			collapsible: true,
			//fitColumns: true,
			fitColumns:true,//自适应列宽
			showFooter: true,
			onContextMenu: onContextMenu,
			method: 'post',
			columns:[[
			{title:'排序',field:'order',align: 'left',width:30,editor:'text'},
			{title:'分类名',field:'name',align: 'left',width:800,editor:'text'},
			{title:'ID',field:'id',align: 'left',width:30,editor:'text'}
			]],
			toolbar: [{
				text: '保 存',
				iconCls: 'icon-save',
				handler: function () {
					save();
				}
			}, '-', {
				text: '取 消',
				iconCls: 'icon-undo',
				handler: function () {
					cancel();
				}
			}, '-', {
				text: '刷 新',
				iconCls: 'icon-reload',
				handler: function () {
					window.location.reload();
				}
			}],
			//onClickRow:function(){}
			onDblClickRow:function(rowIndex, rowData){
				cancel();
				var row = $('#tt').treegrid('getSelected');
				if (row){
					editingId = row.id
					$('#tt').treegrid('beginEdit', editingId);
				}
			}
		});
	});
	</script>
</head>
<body>
<div id="mm" class="easyui-menu" style="width:120px;">
		<div onClick="append()" data-options="iconCls:'icon-add'">添加子分类</div>
		<div onClick="removeIt()" data-options="iconCls:'icon-cancel'">删除</div>
</div>
<div id="mm2" class="easyui-menu" style="width:120px;">
		<div onClick="append()" data-options="iconCls:'icon-add'">添加子分类</div>
</div>
<div id="all" style="width:100%;">
<div style="height:100%" id="rongqi"><table id="tt"></table></div>
</div>
</body>
</html>