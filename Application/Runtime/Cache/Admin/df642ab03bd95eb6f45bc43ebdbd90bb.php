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
	<script charset="utf-8" src="/public/kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="/public/kindeditor/lang/zh_CN.js"></script>
	<script>
	var editor;
	var n = 0;
	KindEditor.ready(function(K) {
	
		
		$('#myform').form({
			url:'/admin/group/saveadd',
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
	});
	
	</script>
</head>
<body>
<form id="myform" name="myform" method="post" action="" enctype="multipart/form-data">
  <table width="99%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#F5F5F5">
    
    <tr><td width="11%" align="right" bgcolor="#FFFFFF">分组名：</td><td width="89%" bgcolor="#FFFFFF"><input name="gname" type="text" class="easyui-validatebox" id="gname" size="45" required="true" /></td></tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#F5F5F5">权限</td>
    </tr>
    <tr><td colspan="2" align="left" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#F5F5F5">
                      
					  <tr>
					    <td align="right" bgcolor="#FFFFFF">查看全部：</td>
					    <td bgcolor="#FFFFFF"><label><input type="radio" name="all" value="1" />是</label>
					      <label>
					      <input name="all" type="radio" value="0" checked="checked" />
					      否
					      </label></td>
	      </tr>
					  
					<?php  foreach ($rbac as $key => $value) { ?>  
					  
					  
					  
					  <tr>
                        <td width="11%" align="right" bgcolor="#FFFFFF"><?=$value['name']?>：</td>
                        <td width="89%" bgcolor="#FFFFFF">
                        <?php  foreach ($value['list'] as $k => $v) { ?> 
                        	<label style="float:left; padding:5px;">
                          <input name="levelstr[]" type="checkbox" id="levelstr" value="<?php echo $v['id']?>" /><?php echo $v['name'];?>                          </label>
                        <?php
} ?>                        </td>
                      </tr>
					  <?php
 } ?>
					  
      </table></td>
      </tr>
    
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><input name="提交" type="submit" value="提交" class="submit">
        <input type="reset" name="Submit2" value="重置" class="submit" />	
		<!--<input type="button" name="Submit3" value="刷新本页" onclick="location.reload();" /> -->
		<input type="button" class="submit" name="Submit" value="关闭" onClick="parent.layer.closeAll();" />		</td>
    </tr>
  </table>
</form>
</body>
</html>