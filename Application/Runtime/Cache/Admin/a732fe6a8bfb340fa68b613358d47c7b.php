<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>综合应用管理平台</title>
   <link rel="stylesheet" type="text/css" href="/public/easyui1.3/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/public/easyui1.3/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="/public/easyui1.3/css/css.css">
	<script type="text/javascript" src="/public/js/jquery-1.4.4.js"></script>
	<script src="/public/layer/layer.js"></script> 
	<script type="text/javascript" src="/public/easyui1.3/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="/public/js/public.js"></script>
	<script type="text/javascript" src="/public/js/date.js"></script>
	<script charset="utf-8" src="/public/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/public/kindeditor/lang/zh_CN.js"></script>
	<script type="text/javascript" src="/public/js/checkform.js"></script>
	<script>
	var editor;
	var n = 0;
	KindEditor.ready(function(K) {
	
		
		$('#myform').form({
			url:'/admin/wechatmenu/saveadd',
			onSubmit: function(){
				$fly.load();
			},
			success:function(data){
				$fly.disload();
				parent.$('#mytable').datagrid('reload');
				if (data == 'success') {
					$fly.msg('添加成功');
				} else{
					$fly.msg(data);
				}
			}
		});
	});
	
	</script>
</head>
<body>
<form id="myform" name="myform" method="post" action="" enctype="multipart/form-data">
  <table width="99%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#F5F5F5">

    <tr><td width="11%" align="right" bgcolor="#FFFFFF">：</td><td width="89%" bgcolor="#FFFFFF"><input name="key" type="text" id="key" size="64"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">：</td><td width="89%" bgcolor="#FFFFFF"><input name="type" type="text" id="type" size="64"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">：</td><td width="89%" bgcolor="#FFFFFF"><input name="name" type="text" id="name" size="64"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">：</td><td width="89%" bgcolor="#FFFFFF"><input name="url" type="text" id="url" size="80"   /></td></tr>
    
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><input name="提交" type="submit" value="提交" class="submit">
        <input type="reset" name="Submit2" value="重置" class="submit" />	
		<input type="button" name="Submit" value="关闭" onClick="parent.layer.closeAll();" class="submit" />
				</td>
    </tr>
  </table>
</form>
</body>
</html>