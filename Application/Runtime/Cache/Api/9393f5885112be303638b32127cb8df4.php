<?php if (!defined('THINK_PATH')) exit();?><title>接口文档</title>
<div class="main-title" style="margin:10px auto;width:600px">
	status="1001" 时表示出现错误，message为错误的描述<br>
	status="1000" 时表示正常返回，data里为相应数据<br>
	项目跟域名 http://zhaiyi.bjqttd.com<br>
</div>
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#000000">
<tr>
  <td height="44" colspan="1" align="left" bgcolor="#BD2D30"><span>接口导航</span></td>
</tr>
<tr>
  <td  height="44" align="left" bgcolor="#ffffff">
<?php
foreach ($list as $key => $value) { ?>
<span style="width:200px;margin:10px;float:left;"><a href="#id<?php echo $value['id'];?>"><?php echo $value['id'];?>.<?php echo $value['title'];?></a></span>
<?php
} ?>
  </td>
</tr>
</table>
<br><br>
<?php
foreach ($list as $key => $value) { ?>
<table id="id<?php echo $value['id'];?>" width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#000000">
<tr>
  <td height="44" colspan="1" align="left" bgcolor="#E0ECFF"><span><?php echo $value['title'];?></span></td>
</tr>
<tr>
  <td  height="44" align="left" bgcolor="#ffffff"><span>链接地址：&nbsp;<a href='<?php echo $value['link']; ?>' target='_blank'><?php echo $value['link']; ?></a></span><span><?php echo $value['content'];?></span></td>
</tr>
<tr>
  <td height="44" colspan="1" align="left" bgcolor="#E0ECFF"><span><img src="<?php echo $value['image']?>" ></span></td>
</tr>
</table>
<br><br>
<?php
} ?>