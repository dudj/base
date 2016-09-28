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
	musicurl = K.create('textarea[name="musicurl"]', {allowFileManager : true});hdmusicurl = K.create('textarea[name="hdmusicurl"]', {allowFileManager : true});
		
		$('#myform').form({
			url:'/admin/wechatreplymusic/saveupdate',
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
    
    <tr><td width="11%" align="right" bgcolor="#FFFFFF">关键词：</td><td width="89%" bgcolor="#FFFFFF"><input name="keyword" type="text" id="keyword" size="80" value="<?php echo $result['keyword'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">音乐标题：</td><td width="89%" bgcolor="#FFFFFF"><input name="title" type="text" id="title" size="64" value="<?php echo $result['title'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">音乐描述：</td><td width="89%" bgcolor="#FFFFFF"><textarea name="description" cols="80" rows="8" id="description" ><?php echo $result['description'];?></textarea></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">音乐url：</td><td width="89%" bgcolor="#FFFFFF"><textarea name="musicurl" cols="90" rows="15" class="easyui-validatebox" id="musicurl"><?php echo $result['musicurl'];?></textarea></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">高清音乐url：</td><td width="89%" bgcolor="#FFFFFF"><textarea name="hdmusicurl" cols="90" rows="15" class="easyui-validatebox" id="hdmusicurl"><?php echo $result['hdmusicurl'];?></textarea></td></tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><input id="id" name="id" type="hidden"  value="<?php echo $result['id'];?>"><input name="提交" type="submit" value="提交" class="submit">
        <input type="reset" name="Submit2" value="重置" class="submit" />
        <input type="button" name="Submit" value="关闭" onClick="parent.layer.closeAll();" class="submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>