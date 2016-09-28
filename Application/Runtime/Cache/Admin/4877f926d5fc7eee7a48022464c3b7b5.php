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
			url:'/admin/sendxq/saveupdate',
			onSubmit: function(){
				$fly.load();
			},
			success:function(data){
				$fly.disload();
				parent.$('#mytable').datagrid('reload');
				if (data == 'success') {
					$fly.msg('修改成功');
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
    
    <tr><td width="11%" align="right" bgcolor="#FFFFFF">工程地点：</td><td width="89%" bgcolor="#FFFFFF"><input name="address" type="text" id="address" size="50" value="<?php echo $result['address'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">工作内容：</td><td width="89%" bgcolor="#FFFFFF"><textarea name="txt" cols="80" rows="8" id="txt" ><?php echo $result['txt'];?></textarea></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">需求人数：</td><td width="89%" bgcolor="#FFFFFF"><input name="num" type="text" id="num" size="11" value="<?php echo $result['num'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">开始日期：</td><td width="89%" bgcolor="#FFFFFF"><input name="startDate" type="text" id="startDate" size="20" value="<?php echo $result['startDate'];?>" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">竣工日期：</td><td width="89%" bgcolor="#FFFFFF"><input name="endDate" type="text" id="endDate" size="20" value="<?php echo $result['endDate'];?>" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">价格区间：</td><td width="89%" bgcolor="#FFFFFF"><input name="money" type="text" id="money" size="" value="<?php echo $result['money'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">是否需要保险：</td><td width="89%" bgcolor="#FFFFFF"><input name="isbx" type="text" id="isbx" size="11" value="<?php echo $result['isbx'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">保险额度：</td><td width="89%" bgcolor="#FFFFFF"><input name="bf" type="text" id="bf" size="" value="<?php echo $result['bf'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">联系人：</td><td width="89%" bgcolor="#FFFFFF"><input name="name" type="text" id="name" size="50" value="<?php echo $result['name'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">电话：</td><td width="89%" bgcolor="#FFFFFF"><input name="tel" type="text" id="tel" size="11" value="<?php echo $result['tel'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">描述：</td><td width="89%" bgcolor="#FFFFFF"><textarea name="txt1" cols="80" rows="8" id="txt1" ><?php echo $result['txt1'];?></textarea></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">订单号：</td><td width="89%" bgcolor="#FFFFFF"><input name="ddh" type="text" id="ddh" size="60" value="<?php echo $result['ddh'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">订单状态：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $c83;?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">经度：</td><td width="89%" bgcolor="#FFFFFF"><input name="lng" type="text" id="lng" size="50" value="<?php echo $result['lng'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">维度：</td><td width="89%" bgcolor="#FFFFFF"><input name="lat" type="text" id="lat" size="50" value="<?php echo $result['lat'];?>"  /></td></tr>
    
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><input id="id" name="id" type="hidden"  value="<?php echo $result['id'];?>"><input name="提交" type="submit" value="提交" class="submit">
        <input type="reset" name="Submit2" value="重置" class="submit" />
        <input type="button" name="Submit" value="关闭" onClick="parent.layer.closeAll();" class="submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>