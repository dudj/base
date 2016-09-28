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
			url:'/admin/orderlist/saveadd',
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

    <input type="hidden" id="userid"  name="userid" value="<?php echo $_GET['userid']?>"><tr><td width="11%" align="right" bgcolor="#FFFFFF">工程地点：</td><td width="89%" bgcolor="#FFFFFF"><input name="address" type="text" id="address" size="50"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">工作内容：</td><td width="89%" bgcolor="#FFFFFF"><textarea name="txt" cols="80" rows="8"  id="txt"></textarea></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">需求人数：</td><td width="89%" bgcolor="#FFFFFF"><input name="num" type="text" id="num" size="11"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">开始日期：</td><td width="89%" bgcolor="#FFFFFF"><input name="startDate" type="text" id="startDate" size="20" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">竣工日期：</td><td width="89%" bgcolor="#FFFFFF"><input name="endDate" type="text" id="endDate" size="20" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">价格区间：</td><td width="89%" bgcolor="#FFFFFF"><input name="money" type="text" id="money" size=""   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">是否需要保险：</td><td width="89%" bgcolor="#FFFFFF"><input name="isbx" type="text" id="isbx" size="11"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">保险额度：</td><td width="89%" bgcolor="#FFFFFF"><input name="bf" type="text" id="bf" size=""   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">联系人：</td><td width="89%" bgcolor="#FFFFFF"><input name="name" type="text" id="name" size="50"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">电话：</td><td width="89%" bgcolor="#FFFFFF"><input name="tel" type="text" id="tel" size="11"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">描述：</td><td width="89%" bgcolor="#FFFFFF"><textarea name="txt1" cols="80" rows="8"  id="txt1"></textarea></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">订单号：</td><td width="89%" bgcolor="#FFFFFF"><input name="ddh" type="text" id="ddh" size="60"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">抢单状态：</td><td width="89%" bgcolor="#FFFFFF"><input name="state" type="text" id="state" size="11"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">经度：</td><td width="89%" bgcolor="#FFFFFF"><input name="lng" type="text" id="lng" size="50"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">维度：</td><td width="89%" bgcolor="#FFFFFF"><input name="lat" type="text" id="lat" size="50"   /></td></tr>
    
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