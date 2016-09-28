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
			url:'/admin/wechatusers/saveadd',
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

    <input type="hidden" id="wechatgroupid"  name="wechatgroupid" value="<?php echo $_GET['wechatgroupid']?>"><tr><td width="11%" align="right" bgcolor="#FFFFFF">多个应用唯一标示：</td><td width="89%" bgcolor="#FFFFFF"><input name="unionid" type="text" id="unionid" size="80"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">微信openid：</td><td width="89%" bgcolor="#FFFFFF"><input name="openid" type="text" id="openid" size="80" class="easyui-validatebox" required="true" validType="length[0,254]"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">昵称：</td><td width="89%" bgcolor="#FFFFFF"><input name="nickname" type="text" id="nickname" size="80" class="easyui-validatebox" required="true" validType="length[0,128]"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">性别：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $c6;?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">语言：</td><td width="89%" bgcolor="#FFFFFF"><input name="language" type="text" id="language" size="64"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">城市：</td><td width="89%" bgcolor="#FFFFFF"><input name="city" type="text" id="city" size="64"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">省份：</td><td width="89%" bgcolor="#FFFFFF"><input name="province" type="text" id="province" size="64"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">国家：</td><td width="89%" bgcolor="#FFFFFF"><input name="country" type="text" id="country" size="80"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">头像：</td><td width="89%" bgcolor="#FFFFFF"><input name="headimgurl" type="text" id="headimgurl" size="80"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">关注时间：</td><td width="89%" bgcolor="#FFFFFF"><input name="subscribe_time" type="text" id="subscribe_time" size="10"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">取消关注时间：</td><td width="89%" bgcolor="#FFFFFF"><input name="unsubscribe_time" type="text" id="unsubscribe_time" size="10"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">手机号/身份照/邮箱：</td><td width="89%" bgcolor="#FFFFFF"><input name="phone" type="text" id="phone" size="80"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">公共帐号关注状态0:未关注1关注：</td><td width="89%" bgcolor="#FFFFFF"><input name="subscribe" type="text" id="subscribe" size="4"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">记录关注次数：</td><td width="89%" bgcolor="#FFFFFF"><input name="uphits" type="text" id="uphits" size="10"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">微信用户备注：</td><td width="89%" bgcolor="#FFFFFF"><input name="remark" type="text" id="remark" size="80"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">1正常 2排除：</td><td width="89%" bgcolor="#FFFFFF"><input name="isdel" type="text" id="isdel" size="4"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">标签：</td><td width="89%" bgcolor="#FFFFFF"><input name="tag" type="text" id="tag" size="64"   /></td></tr>
    
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