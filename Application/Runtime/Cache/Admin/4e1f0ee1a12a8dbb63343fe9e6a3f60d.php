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
			url:'/admin/user/saveadd',
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

    <input type="hidden" id="gztypeid"  name="gztypeid" value="<?php echo $_GET['gztypeid']?>"><tr><td width="11%" align="right" bgcolor="#FFFFFF">手机号：</td><td width="89%" bgcolor="#FFFFFF"><input name="mobile" type="text" id="mobile" size="11"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">密码：</td><td width="89%" bgcolor="#FFFFFF"><input name="password" type="text" id="password" size="32"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">用户昵称：</td><td width="89%" bgcolor="#FFFFFF"><input name="nickname" type="text" id="nickname" size="32"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">用户性别：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $c80;?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">联系电话：</td><td width="89%" bgcolor="#FFFFFF"><input name="tel" type="text" id="tel" size="11"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">联系地址：</td><td width="89%" bgcolor="#FFFFFF"><input name="address" type="text" id="address" size="80"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">用户头像：</td><td width="89%" bgcolor="#FFFFFF"><input name="picture" id="picture" type="file"></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">用户秘钥：</td><td width="89%" bgcolor="#FFFFFF"><input name="token" type="text" id="token" size="11"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">用户分类：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $c77;?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">籍贯：</td><td width="89%" bgcolor="#FFFFFF"><input name="live_city" type="text" id="live_city" size="80"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">年限：</td><td width="89%" bgcolor="#FFFFFF"><input name="job_year" type="text" id="job_year" size="11"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">学历：</td><td width="89%" bgcolor="#FFFFFF"><input name="education" type="text" id="education" size="32"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">身份证号：</td><td width="89%" bgcolor="#FFFFFF"><input name="id_card" type="text" id="id_card" size="18"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">学历证书：</td><td width="89%" bgcolor="#FFFFFF"><input name="education_image[]" id="education_image[]" type="file" multiple="true"></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">用户介绍：</td><td width="89%" bgcolor="#FFFFFF"><input name="user_desc" type="text" id="user_desc" size="32"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">接单设置：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $c93;?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">用户名：</td><td width="89%" bgcolor="#FFFFFF"><input name="username" type="text" id="username" size="32"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">红包：</td><td width="89%" bgcolor="#FFFFFF"><input name="money" type="text" id="money" size=""   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">积分：</td><td width="89%" bgcolor="#FFFFFF"><input name="record" type="text" id="record" size="11"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">极光ID：</td><td width="89%" bgcolor="#FFFFFF"><input name="jpushcode" type="text" id="jpushcode" size="32"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">随机数：</td><td width="89%" bgcolor="#FFFFFF"><input name="salt" type="text" id="salt" size="32"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">最后登录的时间：</td><td width="89%" bgcolor="#FFFFFF"><input name="logintime" type="text" id="logintime" size="20" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">充值金额：</td><td width="89%" bgcolor="#FFFFFF"><input name="recharge_money" type="text" id="recharge_money" size=""   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">经度：</td><td width="89%" bgcolor="#FFFFFF"><input name="a_lng" type="text" id="a_lng" size="80"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">纬度：</td><td width="89%" bgcolor="#FFFFFF"><input name="a_lat" type="text" id="a_lat" size="80"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">雇主的用户名：</td><td width="89%" bgcolor="#FFFFFF"><input name="em_name" type="text" id="em_name" size="32"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">雇主的昵称：</td><td width="89%" bgcolor="#FFFFFF"><input name="em_nickname" type="text" id="em_nickname" size="32"   /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">雇主的头像：</td><td width="89%" bgcolor="#FFFFFF"><input name="em_image" id="em_image" type="file"></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">用户性别：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $c80;?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">雇主地址：</td><td width="89%" bgcolor="#FFFFFF"><input name="em_address" type="text" id="em_address" size="80" class="easyui-validatebox" required="true" validType="length[0,100]"  /></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">雇主红包：</td><td width="89%" bgcolor="#FFFFFF"><input name="em_money" type="text" id="em_money" size=""   /></td></tr>
    
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