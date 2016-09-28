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
			url:'/admin/wechatrecord/saveupdate',
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
    
    <tr><td width="11%" align="right" bgcolor="#FFFFFF">用户openid：</td><td width="89%" bgcolor="#FFFFFF"><input name="fromusername" type="text" id="fromusername" size="80" value="<?php echo $result['fromusername'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">消息类型：</td><td width="89%" bgcolor="#FFFFFF"><input name="msgtype" type="text" id="msgtype" size="64" value="<?php echo $result['msgtype'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">发送内容：</td><td width="89%" bgcolor="#FFFFFF"><textarea name="content" cols="80" rows="8" id="content" ><?php echo $result['content'];?></textarea></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">消息id：</td><td width="89%" bgcolor="#FFFFFF"><input name="msgid" type="text" id="msgid" size="11" value="<?php echo $result['msgid'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">图片链接：</td><td width="89%" bgcolor="#FFFFFF"><input name="picurl" type="text" id="picurl" size="80" value="<?php echo $result['picurl'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">资源链接：</td><td width="89%" bgcolor="#FFFFFF"><input name="mediaid" type="text" id="mediaid" size="80" value="<?php echo $result['mediaid'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">标题：</td><td width="89%" bgcolor="#FFFFFF"><input name="title" type="text" id="title" size="80" value="<?php echo $result['title'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">描述：</td><td width="89%" bgcolor="#FFFFFF"><input name="description" type="text" id="description" size="80" value="<?php echo $result['description'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">跳转地址：</td><td width="89%" bgcolor="#FFFFFF"><input name="url" type="text" id="url" size="80" value="<?php echo $result['url'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">微信是否回复消息：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $c13;?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">回复人：</td><td width="89%" bgcolor="#FFFFFF"><input name="replyid" type="text" id="replyid" size="11" value="<?php echo $result['replyid'];?>"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">回复内容：</td><td width="89%" bgcolor="#FFFFFF"><textarea name="replycontent" cols="80" rows="8" id="replycontent" ><?php echo $result['replycontent'];?></textarea></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">回复时间：</td><td width="89%" bgcolor="#FFFFFF"><input name="replytime" type="text" id="replytime" size="11" value="<?php echo $result['replytime'];?>"  /></td></tr>
    
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><input id="id" name="id" type="hidden"  value="<?php echo $result['id'];?>"><input name="提交" type="submit" value="提交" class="submit">
        <input type="reset" name="Submit2" value="重置" class="submit" />
        <input type="button" name="Submit" value="关闭" onClick="parent.layer.closeAll();" class="submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>