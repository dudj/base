<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>综合应用管理平台</title>
   <link rel="stylesheet" type="text/css" href="/public/easyui1.3/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/public/easyui1.3/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="/public/easyui1.3/css/css.css">
	<script type="text/javascript" src="/public/js/jquery-1.4.4.js"></script>
	<script type="text/javascript" src="/public/easyui1.3/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="/public/js/public.js"></script>
</head>
<body>
<form id="myform" name="myform" method="post" action="">
  <table width="99%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#F5F5F5">
    
    <tr><td width="11%" align="right" bgcolor="#FFFFFF">工程地点：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['address'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">工作内容：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['txt'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">需求人数：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['num'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">开始日期：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['startDate'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">竣工日期：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['endDate'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">价格区间：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['money'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">是否需要保险：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['isbx'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">保险额度：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['bf'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">联系人：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['name'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">电话：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['tel'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">描述：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['txt1'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">订单号：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['ddh'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">经度：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['lng'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">维度：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['lat'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">订单状态：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $c83;?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">现有人数：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['in_num'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">创建时间：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['createtime'];?></td></tr><tr><td width="11%" align="right" bgcolor="#FFFFFF">修改时间：</td><td width="89%" bgcolor="#FFFFFF"><?php echo $result['updatetime'];?></td></tr>
    
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="button" name="Submit" value="关闭" onclick="parent.layer.closeAll();" class="submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>