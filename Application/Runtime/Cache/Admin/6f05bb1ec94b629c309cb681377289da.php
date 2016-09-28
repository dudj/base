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
			url:'/admin/wechatusers/saveupdate',
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
    <tr>
    	<td width="11%" align="right" bgcolor="#FFFFFF">ID：</td>
    	<td width="89%" bgcolor="#FFFFFF">
    		<input name="id" type="text" id="id" size="80" value="<?php echo $result['id'];?>" readonly="readonly"  />
    	</td>
    </tr>
    <tr>
    	<td width="11%" align="right" bgcolor="#FFFFFF">微信openid：</td>
    	<td width="89%" bgcolor="#FFFFFF">
    		<input name="openid" type="text" id="openid" size="80" value="<?php echo $result['openid'];?>" readonly="readonly"  />
    	</td>
    </tr>
    <tr>
    	<td width="11%" align="right" bgcolor="#FFFFFF">昵称：</td>
    	<td width="89%" bgcolor="#FFFFFF">
    		<input name="nickname" type="text" id="nickname" size="80" value="<?php echo $result['nickname'];?>"  readonly="readonly"/>
    	</td>
    </tr>
    <tr>
    	<td width="11%" align="right" bgcolor="#FFFFFF">性别：</td>
    	<td width="89%" bgcolor="#FFFFFF">
    		<?php echo $c6;?></td>
   	</tr>
   	<tr>
    	<td width="11%" align="right" bgcolor="#FFFFFF">分组：</td>
    	<td width="89%" bgcolor="#FFFFFF">
    		<select name="wechatgroupid">
    			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if( $result["wechatgroupid"] == $val["id"] ): ?><option value="<?php echo ($val["id"]); ?>" selected="selected"><?php echo ($val["groupname"]); ?></option>
    				<?php else: ?>
    					<option value="<?php echo ($val["id"]); ?>"><?php echo ($val["groupname"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    		</select>
    </tr>
   	<tr>
   		<td width="11%" align="right" bgcolor="#FFFFFF">微信用户备注：</td>
   		<td width="89%" bgcolor="#FFFFFF">
   			<input name="remark" type="text" id="remark" size="80" value="<?php echo $result['remark'];?>"  />
   		</td>
   	</tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF">
      	<input id="id" name="id" type="hidden"  value="<?php echo $result['id'];?>">
      	<input name="提交" type="submit" value="提交" class="submit">
        <input type="reset" name="Submit2" value="重置" class="submit" />
        <input type="button" name="Submit" value="关闭" onClick="parent.layer.closeAll();" class="submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>