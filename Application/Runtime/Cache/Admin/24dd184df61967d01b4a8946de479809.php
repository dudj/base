<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>综合应用管理平台</title>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css" />
    <script type="text/javascript" src="/public/js/jquery-1.8.3.min.js"></script>
	<style>
		.input{ width:300px;}
	</style>
	<script>
		$(document).ready(function(){
			$(".delete").click(function(){
				if(confirm("您确定清除菜单吗？")){
					window.location.href='/admin/wechatmenu/delete';
				}
			});
		})
	</script>
</head>
<body>
<div id="tb" style="border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #dddddd;width:100%;background-color: #F4F4F4;">
<div style="padding:8px;">
<form id="myform" name="myform" action="/admin/wechatmenu/create" method="post">
    <div class="table-list">
      <table>
        <tr>
          <td>
            <lable><b>主菜单：</b></lable><input type="text" name="parents[][name]" value="<?php echo ($list[0][name]); ?>"/>
            <input name="url[][url]" type="text" class="input" value="<?php echo ($list[0][key]); echo ($list[0][url]); ?>"/>
          </td>
        </tr>
        <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[0][name][]" value="<?php echo ($list[0][sub_button][0][name]); ?>"/>
         <input name="sub_button[0][url][]" ty	pe="text" class="input" value="<?php echo ($list[0][sub_button][0][key]); echo ($list[0][sub_button][0][url]); ?>"/>
       </td>
      </tr>
      <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[0][name][]" value="<?php echo ($list[0][sub_button][1][name]); ?>"/>
         <input name="sub_button[0][url][]" type="text" class="input" value="<?php echo ($list[0][sub_button][1][key]); echo ($list[0][sub_button][1][url]); ?>"/>
       </td>
      </tr>
      <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[0][name][]" value="<?php echo ($list[0][sub_button][2][name]); ?>"/>
         <input name="sub_button[0][url][]" type="text" class="input" value="<?php echo ($list[0][sub_button][2][key]); echo ($list[0][sub_button][2][url]); ?>"/>
       </td>
      </tr>
      <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[0][name][]" value="<?php echo ($list[0][sub_button][3][name]); ?>"/>
         <input name="sub_button[0][url][]" type="text" class="input" value="<?php echo ($list[0][sub_button][3][key]); echo ($list[0][sub_button][3][url]); ?>"/>
       </td>
              </tr>
      <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[0][name][]" value="<?php echo ($list[0][sub_button][4][name]); ?>"/>
         <input name="sub_button[0][url][]" type="text" class="input" value="<?php echo ($list[0][sub_button][4][key]); echo ($list[0][sub_button][4][url]); ?>"/>
       </td>
              </tr>

       <tr>
          <td>
            <lable><b>主菜单：</b></lable><input type="text" name="parents[][name]" value="<?php echo ($list[1][name]); ?>"/>
            <input name="url[][url]" type="text" class="input" value="<?php echo ($list[1][key]); echo ($list[1][url]); ?>"/>
          </td>
        </tr>
        <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[1][name][]" value="<?php echo ($list[1][sub_button][0][name]); ?>"/>
         <input name="sub_button[1][url][]" type="text" class="input" value="<?php echo ($list[1][sub_button][0][key]); echo ($list[1][sub_button][0][url]); ?>"/>
       </td>
      </tr>
      <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[1][name][]" value="<?php echo ($list[1][sub_button][1][name]); ?>"/>
         <input name="sub_button[1][url][]" type="text" class="input" value="<?php echo ($list[1][sub_button][1][key]); echo ($list[1][sub_button][1][url]); ?>"/>
       </td>
              </tr>
      <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[1][name][]" value="<?php echo ($list[1][sub_button][2][name]); ?>"/>
         <input name="sub_button[1][url][]" type="text" class="input" value="<?php echo ($list[1][sub_button][2][key]); echo ($list[1][sub_button][2][url]); ?>"/>
       </td>
              </tr>
      <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[1][name][]" value="<?php echo ($list[1][sub_button][3][name]); ?>"/>
         <input name="sub_button[1][url][]" type="text" class="input" value="<?php echo ($list[1][sub_button][3][key]); echo ($list[1][sub_button][3][url]); ?>"/>
       </td>
              </tr>
      <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[1][name][]" value="<?php echo ($list[1][sub_button][4][name]); ?>"/>
         <input name="sub_button[1][url][]" type="text" class="input" value="<?php echo ($list[1][sub_button][4][key]); echo ($list[1][sub_button][4][url]); ?>"/>
       </td>
              </tr>


               <tr>
          <td>
            <lable><b>主菜单：</b></lable><input type="text" name="parents[][name]" value="<?php echo ($list[2][name]); ?>"/>
            <input name="url[][url]" type="text" class="input" value="<?php echo ($list[2][key]); echo ($list[2][url]); ?>"/>
          </td>
        </tr>
        <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[2][name][]" value="<?php echo ($list[2][sub_button][0][name]); ?>"/>
         <input name="sub_button[2][url][]" type="text" class="input" value="<?php echo ($list[2][sub_button][0][key]); echo ($list[2][sub_button][0][url]); ?>"/>
       </td>
      </tr>
      <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[2][name][]" value="<?php echo ($list[2][sub_button][1][name]); ?>"/>
         <input name="sub_button[2][url][]" type="text" class="input" value="<?php echo ($list[2][sub_button][1][key]); echo ($list[2][sub_button][1][url]); ?>"/>
       </td>
              </tr>
      <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[2][name][]" value="<?php echo ($list[2][sub_button][2][name]); ?>"/>
         <input name="sub_button[2][url][]" type="text" class="input" value="<?php echo ($list[2][sub_button][2][key]); echo ($list[2][sub_button][2][url]); ?>"/>
       </td>
              </tr>
      <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[2][name][]" value="<?php echo ($list[2][sub_button][3][name]); ?>"/>
         <input name="sub_button[2][url][]" type="text" class="input" value="<?php echo ($list[2][sub_button][3][key]); echo ($list[2][sub_button][3][url]); ?>"/>
       </td>
              </tr>
      <tr>
       <td>
         <lable>子菜单：</lable><input type="text" name="sub_button[2][name][]" value="<?php echo ($list[2][sub_button][4][name]); ?>"/>
         <input name="sub_button[2][url][]" type="text" class="input" value="<?php echo ($list[2][sub_button][4][key]); echo ($list[2][sub_button][4][url]); ?>"/>
       </td>
              </tr>

     
      </table>
   <div class="btn">
      <input type="submit" value="保存" class="button" />
      <a href="javascript:;" class="delete"><input type="button"  class="button" value="删除菜单"/></a>
  </div>
  </form>
</div>
</div>
</div>
</body>
</html>