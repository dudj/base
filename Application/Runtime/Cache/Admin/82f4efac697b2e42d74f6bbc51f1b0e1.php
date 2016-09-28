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
	<script type="text/javascript" src="/public/js/checkform.js"></script>
	<script type="text/javascript" src="/public/sanji/location.js"></script>
	<script type="text/javascript" src="/public/sanji/area.js"></script>

	<script>
	$(function(){
		$('#myform').form({
			url:'/admin/admin/saveadd',
			onSubmit: function(){
				return $(this).form('validate');
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
	showLocation();
	});

	</script>
</head>
<body>
<form id="myform" name="myform" method="post" action="" enctype="multipart/form-data">
  <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#F5F5F5">
    <tr>
      <td width="16%" align="right" bgcolor="#FFFFFF">用户名：</td>
      <td width="84%" bgcolor="#FFFFFF">
      	<input autocomplete="off" name="username" type="text" class="easyui-validatebox" id="username" size="35" required="true" />
      	<input name="parentid" type="hidden" id="parentid" value="<?=$_SESSION['id']?>" />
      	<input name="groupid" type="hidden" id="groupid" value="26" />
      </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">密码：</td>
      <td bgcolor="#FFFFFF"><input autocomplete="off" name="password" type="password" class="easyui-validatebox" id="password" size="35" required="true" /></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">确认密码：</td>
      <td bgcolor="#FFFFFF"><input autocomplete="off" name="password2" type="password" class="easyui-validatebox" id="password2" size="35"  required="true" validType="xiangtong['password']" /></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">商户名：</td>
      <td bgcolor="#FFFFFF"><input autocomplete="off" name="name" type="text" class="easyui-validatebox" id="name" size="35" required="true" /></td>
    </tr>
    <tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">商户地址：</td>
      <td bgcolor="#FFFFFF">
      	<select name="provinceid" id="loc_province"></select>&nbsp;&nbsp;
      	<select name="cityid" id="loc_city"></select>&nbsp;&nbsp;
      	<select name="countryid" id="loc_town"></select>
      	&nbsp;&nbsp;&nbsp;<input autocomplete="off" name="address" type="text" class="easyui-validatebox" id="address" size="35" required="true" />
      </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">地址坐标：</td>
      <td bgcolor="#FFFFFF">
      	纬度：<input autocomplete="off" name="lat" type="text" class="easyui-validatebox" id="lat" size="7" required="true" />
      	经度：<input autocomplete="off" name="lng" type="text" class="easyui-validatebox" id="lng" size="7" required="true" />&nbsp;&nbsp;&nbsp;<a href="http://code.autonavi.com/LngLatPicker" target="_blank">点击获取坐标</a>
      </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">商户logo：</td>
      <td bgcolor="#FFFFFF"><input name="logo" id="logo" type="file" /></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">商户大图：</td>
      <td bgcolor="#FFFFFF"><input name="picture" id="picture" type="file" /></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">商户星级：</td>
      <td bgcolor="#FFFFFF"><input autocomplete="off" name="star" type="text" class="easyui-validatebox" id="star" size="10" required="true" /></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">联系电话：</td>
      <td bgcolor="#FFFFFF"><input autocomplete="off" name="tel" type="text" class="easyui-validatebox" id="tel" size="10" required="true" /></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">折扣程度：</td>
      <td bgcolor="#FFFFFF"><input autocomplete="off" name="discount" type="text" class="easyui-validatebox" id="discount" size="10" required="true" /></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">美食商户勾选：</td>
      <td bgcolor="#FFFFFF">
      	<?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cv): $mod = ($i % 2 );++$i;?><label style="float:left; padding:5px;">
        	<input name="cateid[]" type="checkbox" id="cateid" value="<?php echo ($cv["id"]); ?>" /><?php echo ($cv["name"]); ?>
        </label><?php endforeach; endif; else: echo "" ;endif; ?>
      </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">美食商户勾选：</td>
      <td bgcolor="#FFFFFF">
      	<label style="float:left; padding:5px;">
        	<input name="typeid[]" type="checkbox" id="typeid" value="1" />优惠商户
        </label>
        <label style="float:left; padding:5px;">
        	<input name="typeid[]" type="checkbox" id="typeid" value="2" />外卖商户
        </label>
        <label style="float:left; padding:5px;">
        	<input name="typeid[]" type="checkbox" id="typeid" value="3" />预定商户
        </label>
      </td>
    </tr>
    
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><input name="提交" type="submit" value="提交" class="submit">
        <input type="reset" name="Submit2" value="重置" class="submit" />	
		<!--<input type="button" name="Submit3" value="刷新本页" onclick="location.reload();" /> -->
		<input type="button" class="submit" name="Submit" value="关闭" onClick="parent.layer.closeAll();" />				</td>
    </tr>
  </table>
</form>
</body>
</html>