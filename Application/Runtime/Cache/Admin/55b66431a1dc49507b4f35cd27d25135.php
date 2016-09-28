<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>综合应用管理平台</title>
	<link rel="stylesheet" type="text/css" href="/public/easyui1.3/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="/public/easyui1.3/themes/icon.css">
	<script type="text/javascript" src="/public/js/jquery-1.4.4.js"></script>
	<script type="text/javascript" src="/public/easyui1.3/jquery.easyui.min.js"></script>
	<script src="/public/layer/layer.js"></script>
	<script type="text/javascript" src="/public/js/public.js"></script>
	<script>
  //jquery克隆用补丁
  (function (original) {
  jQuery.fn.clone = function () {
  var result = original.apply(this, arguments),
  my_textareas = this.find('textarea').add(this.filter('textarea')),
  result_textareas = result.find('textarea').add(result.filter('textarea')),
  my_selects = this.find('select').add(this.filter('select')),
  result_selects = result.find('select').add(result.filter('select'));
   
  for (var i = 0, l = my_textareas.length; i < l; ++i) $(result_textareas[i]).val($(my_textareas[i]).val());
  for (var i = 0, l = my_selects.length; i < l; ++i) result_selects[i].selectedIndex = my_selects[i].selectedIndex;
   
  return result;
  };
  }) (jQuery.fn.clone);
	//添加关联表
	function addgl(){
		$("#guanlianbiao").append('<div id="lian'+$("#lian").val()+'" style="width:400px;height:30px;"><input type="text" value="" id="leftjoin'+$("#lian").val()+'"  name="leftjoin[]" size="10"> <input size="10" type="text" placeholder="表名" id="ltablename'+$("#lian").val()+'"  name="ltablename[]"> <label><input type="checkbox" value="1" id="duoduiduo'+$("#lian").val()+'" name="duoduiduo[]">多对多</label> <input type="button" value="删除" onclick="lian_del('+$("#lian").val()+');"> </div> ');
		$("#lian").val($("#lian").val()*1+1);
	}
	
	
	//添加管理外表数据
	function addwb(){
		$("#guanliwaibiaoshuju").append('<div style="width:600px;height:30px;" id="guan'+$("#guan").val()+'"><label><input name="addother[]" type="checkbox" id="addother" value="1" />          添加</label><label><input name="chakanother[]" type="checkbox" id="chakanother" value="1" />            查看</label> &nbsp;&nbsp;                         <input name="othertable[]" type="text" id="othertable" placeholder="外表名" /> <input name="otherdescription[]" type="text" id="otherdescription" placeholder="表描述"  />  <input type="button" value="删除" onclick="guan_del('+$("#guan").val()+');"><div>');
		$("#guan").val($("#guan").val()*1+1);
	}
	function lian_del(id){
		$("#lian"+id).remove();
	}
	function guan_del(id){
		$("#guan"+id).remove();
	}
	function del(id){
		if(id == $("#hang").val()){
			$("#hang").val($("#hang").val()*1-1);
		}
		$("#hang"+id).parent().remove();
	}
	function add(){
		id = $("#hang").val()*1+1;
		$("#hang"+$("#hang").val()).parent().after('<tr><td bgcolor="#FFFFFF" id="hang'+id+'"><input name="name[]" type="text" id="name'+id+'" size="15" /> <a href="javascript:shangyi('+id+');">上移</a> <a href="javascript:xiayi('+id+');">下移</a> </td><td bgcolor="#FFFFFF"><select name="type[]" id="type'+id+'"><option>请选择</option><option value="int">int</option><option value="smallint">smallint</option><option value="varchar">varchar</option><option value="text">text</option><option value="longtext">longtext</option><option value="datetime">datetime</option><option value="pic">图片</option><option value="piclist">多图片</option><option value="class">分类</option> <option value="huobi">货币</option></select><label>&nbsp;<select name="yanzheng[]" id="yanzheng'+id+'"><option value="0">不验</option><option value="1">验证</option></select></label></td><td bgcolor="#FFFFFF"><input name="long[]" type="text" id="long'+id+'" size="5" /></td><td bgcolor="#FFFFFF"><input name="default[]" type="text" id="default'+id+'" size="8" /></td><td bgcolor="#FFFFFF"><input name="description[]" type="text" id="description'+id+'" size="15" /></td><td bgcolor="#FFFFFF"><select name="searchtype[]" id="searchtype'+id+'"><option value="">不搜索</option><option value="like">like</option><option value="=">=</option></select></td><td bgcolor="#FFFFFF">&nbsp;<select name="ifshow[]" id="ifshow'+id+'"><option value="0" selected>否</option><option value="1">是</option></select></td><td bgcolor="#FFFFFF"><input type="button" name="Submit4" value="删除" onclick="del('+id+')" /></td></tr>');
	$("#hang").val($("#hang").val()*1+1); 
	}

  function shangyi(id){
    var tr = $("#hang"+id).parents().eq(0);
    if (tr.index() != 4) {
      tr.prev().before(tr.clone());
      tr.remove();
    }else{
      alert('不能再上移');
    }
  }
  function xiayi(id){
    var tr = $("#hang"+id).parents().eq(0);
    html = tr.next().html();
    if (html.indexOf("添加字段") > 0) {
      alert('不能再下移');
      return;
    };
    tr.next().after(tr.clone());
    tr.remove();
  }
	
	$(document).ready(function() {
    $('#myform').form({
		url:'/admin/admin/savedevelop',
		onSubmit: function(){
			$fly.load();
		},
		success:function(data){
			data = eval('['+data+']');
			data = data[0];
			$fly.disload();
			parent.$('#mytable').datagrid('reload');
			$.messager.alert('友情提示',data.message);
			
		}
	});
	
	
});
	</script>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
.STYLE1 {
	color: #FF0000;
	font-weight: bolder;
}
-->
</style>
</head>
	<body>
	<form id="myform" name="myform" method="post" action="">
	  <table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#000000">
        <tr>
          <td height="44" colspan="2" align="left" bgcolor="#E0ECFF"><span class="STYLE1">注：非技术人员禁止使用该功能。</span></td>
        </tr>
        <!--<tr>
          <td width="8%" align="right" bgcolor="#FFFFFF">选择类型：</td>
          <td width="92%" bgcolor="#FFFFFF"><select name="type" id="type">
            <option value="">请选择类型</option>
            <option value="1">列表</option>
          </select>          </td>
        </tr> -->
        <tr>
          <td width="18%" align="right" bgcolor="#FFFFFF">一级模块：</td>
          <td width="82%" bgcolor="#FFFFFF"><input name="md" type="text" id="md" /></td>
        </tr>
        <tr>
          <td align="right" bgcolor="#FFFFFF">二级模块：</td>
          <td bgcolor="#FFFFFF"><input name="module" type="text" id="module" /></td>
        </tr>
        
        
        <tr>
          <td align="right" bgcolor="#FFFFFF">表名称：</td>
          <td bgcolor="#FFFFFF">
            <input name="table" type="text" id="table" />
            <input type="button" name="Submit" value="添加关联表" onClick="addgl();" />
            <font color="#FF0000">*添加关联表时请注意，必须保证该表已经被添加。</font></td>
        </tr>
        <tr>
          <td align="right" bgcolor="#FFFFFF">关联表：</td>
          <td align="left" bgcolor="#FFFFFF" id="guanlianbiao">&nbsp;</td>
        </tr>
		<tr>
          <td align="right" bgcolor="#FFFFFF">功能：</td>
          <td bgcolor="#FFFFFF"><label><input name="gongneng[]" type="checkbox" id="gongneng1" value="add" />
            添加</label>
              <label><input name="gongneng[]" type="checkbox" id="gongneng1" value="del" />
              删除</label>
              <label><input name="gongneng[]" type="checkbox" id="gongneng1" value="update" />
          修改</label>
		  <label><input name="gongneng[]" type="checkbox" id="gongneng1" value="xiangqing" />
          详情</label>
		  <label>
<input name="gongneng[]" type="checkbox" id="gongneng1" value="out" />
导出</label>
<label>
<input name="gongneng[]" type="checkbox" id="gongneng1" value="setting" />
配置<font color="#FF0000">(一般用于基本配置,如果勾选了该项则必须勾选修改)</font></label></td>
        </tr>
        <tr>
          <td align="right" bgcolor="#FFFFFF">管理外表数据：</td>
          <td bgcolor="#FFFFFF"><input type="button" name="Submit4" value="增加" onclick="addwb();" /></td>
        </tr>
        <tr>
          <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
          <td bgcolor="#FFFFFF" id="guanliwaibiaoshuju"></td>
        </tr>
        <tr>
          <td colspan="2" align="center" bgcolor="#E0ECFF">添加字段</td>
        </tr>
        <tr>
          <td colspan="2" align="right" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#666666">
            <tr>
              <td bgcolor="#E0ECFF">名</td>
              <td bgcolor="#E0ECFF">类型</td>
              <td bgcolor="#E0ECFF">长度</td>
              <td bgcolor="#E0ECFF">默认值</td>
              <td bgcolor="#E0ECFF">字段名</td>
              <td bgcolor="#E0ECFF">搜索类型</td>
              <td bgcolor="#E0ECFF">是否显示在列表</td>
              <td bgcolor="#E0ECFF">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">id</td>
              <td bgcolor="#FFFFFF">int</td>
              <td bgcolor="#FFFFFF">10</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF">id</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">createtime</td>
              <td bgcolor="#FFFFFF">datetime</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF">创建时间</td>
              <td bgcolor="#FFFFFF"><input type="checkbox" value="1" id="chuangjian" name="chuangjian"> 时间区间</td>
              <td bgcolor="#FFFFFF"><input type="checkbox" value="1" id="chuangjian_ifshow" name="chuangjian_ifshow"> 是</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">updatetime</td>
              <td bgcolor="#FFFFFF">datetime</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF">更新时间</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
              <td bgcolor="#FFFFFF"><input type="checkbox" value="1" id="gengxin_ifshow" name="gengxin_ifshow"> 是</td>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF" id="hang1"><input name="name[]" type="text" id="name1" size="15" /> <a href="javascript:shangyi(1);">上移</a> <a href="javascript:xiayi(1);">下移</a> </td>
              <td bgcolor="#FFFFFF"><select name="type[]" id="type1">
                <option value="">请选择</option>
                  <option value="int">int</option>
				  <option value="smallint">smallint</option>
                  <option value="varchar">varchar</option>
				  <option value="text">text</option>
				  <option value="longtext">longtext</option>
				  <option value="datetime">datetime</option>
				  <option value="pic">图片</option>
				  <option value="piclist">多图片</option>
				  <option value="class">分类</option>
				  <option value="huobi">货币</option>
                              </select><label>&nbsp;<select name="yanzheng[]" id="yanzheng1"><option value="0">不验</option><option value="1">验证</option></select></label>               </td>
              <td bgcolor="#FFFFFF"><input name="long[]" type="text" id="long1" size="5" /></td>
              <td bgcolor="#FFFFFF"><input name="default[]" type="text" id="default1" size="8" /></td>
              <td bgcolor="#FFFFFF"><input name="description[]" type="text" id="description1" size="15" /></td>
              <td bgcolor="#FFFFFF"><select name="searchtype[]" id="searchtype1">
                <option value="">不搜索</option>
                <option value="like">like</option>
				<option value="=">=</option>
              </select>              </td>
              <td bgcolor="#FFFFFF">&nbsp;<select name="ifshow[]" id="ifshow1"><option value="0">否</option><option value="1">是</option></select></td>
              <td bgcolor="#FFFFFF"><input type="button" name="Submit4" value="删除" onclick="del(1)" /></td>
            </tr>
            <tr>
              <td colspan="8" bgcolor="#FFFFFF"><input type="button" name="Submit3" value="添加字段" onClick="add();" /></td>
            </tr>
          </table></td>
        </tr>
        
        <tr>
          <td colspan="2" align="center" bgcolor="#E0ECFF">描述</td>
        </tr>
        <tr>
          <td colspan="2" align="left" bgcolor="#FFFFFF"><textarea name="descriptions" cols="90" rows="6" id="descriptions"></textarea></td>
        </tr>
        <tr>
          <td colspan="2" align="center" bgcolor="#FFFFFF"><input name="hang" type="hidden" id="hang" value="1" /><input name="lian" type="hidden" id="lian" value="1" /><input name="guan" type="hidden" id="guan" value="1" />
          <input type="hidden" name="ifupdate" id="ifupdate" value="1">
            <input type="submit" name="Submit1" value="添加" />
          <input type="reset" name="Submit2" value="重置" class="submit" />
		  <!--<input type="button" name="Submit3" value="刷新" onclick="location.reload();" />
          <input type="button" name="Submit4" value="返回" onclick="history.go(-1);" /> --><input type="button" name="Submit" value="关闭" onClick="parent.layer.closeAll();" class="submit" />
		  <input name="action" type="hidden" id="action" value="add"></td>
        </tr>
      </table>
    </form>
	</body></html>