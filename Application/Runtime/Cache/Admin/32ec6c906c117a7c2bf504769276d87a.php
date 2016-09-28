<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>系统登录</title>
<link href="/public/login/css/main.css" rel="stylesheet" type="text/css" />
<script src="/public/js/jquery-1.4.4.js"></script>
<script src="/public/js/jquery.form.js"></script>
<script src="/public/layer/layer.js"></script>
<script src="/public/js/public.js"></script>
<script type="text/javascript">

	$(document).ready(function() {
    $('#myform').ajaxForm(function(data) {
    	data = eval('['+data+']');
		if(data[0].result){
			window.location.href='/admin/index/index';
		}else{
			/**
				验证返回消息失败 
				1.清空 密码
				2.刷新验证码
			**/
			$("input[name='password']").val('');
			var captcha_img = $('#captcha').find('img');
			var verifyimg = captcha_img.attr("src");
			$("#img").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());  
			layer.msg(data[0].message,1,-1);
			$("#submit").val('登 录');
		}
     });
    $("#submit").click(function(){
    	$("#submit").val('正在登录......');
	});
	
    var captcha_img = $('#captcha').find('img');
	var verifyimg = captcha_img.attr("src");
	captcha_img.attr('title', '点击刷新');  
	captcha_img.click(function(){  
		if( verifyimg.indexOf('?')>0){  
			$(this).attr("src", verifyimg+'&random='+Math.random());  
		}else{  
			$(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());  
		}  
	});  
});
</script>
</head>
<body>

<form action="/admin/login/check_login" method="post" id="myform" name="myform">
<div class="login">
    <div class="box png">
		<div class="logo png"></div>
		<div class="input">
			<div class="log">
				<div class="name">
					<label>用户名</label><input type="text" class="text" id="value_1" placeholder="用户名" name="username" tabindex="1"/>
				</div>
				<div class="pwd">
					<label>密　码</label><input type="password" class="text" id="value_2" placeholder="密码" name="password" tabindex="2"/>
				</div>
				<div class="verify" id="captcha">
					<label>验证码</label><input type="text" class="text" id="value_3" placeholder="验证码" name="verify" tabindex="3"/>
					<img id="img" alt="验证码" src="<?php echo U('Admin/Login/verify',array());?>" title="点击刷新">
					<span id="info"></span>
					<input type="submit" class="submit" id="submit" tabindex="4" value="登录">
					<div class="check"></div>
				</div>
				<div class="tip"></div>
			</div>
		</div>
	</div>
    <div class="air-balloon ab-1 png"></div>
	<div class="air-balloon ab-2 png"></div>
    <div class="footer"></div>
</div>
</form>
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'Times New Roman' 'grey';">
	她是个小尾巴，我走到哪里她都要问到哪里。我厌烦，她却乐此不疲。可是，这个小尾巴却在那个下着大雨的深夜永远消失了…… 我的心情非常难过，内心充满了内疚和痛楚，我无法原谅自己的过错。
</div>
</body>
</html>