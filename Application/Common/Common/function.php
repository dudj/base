<?php  
use Vendor\Wechat\Wechat;
function md5_($str) {
	return md5('*&'.$str.'^%$');
}

function check_login(){
	if (empty($_SESSION['user_name'])) {
		header('location:/admin/login');
	}
}

//判断权限
function checklevel($id){
	if (in_array($id, explode(',', $_SESSION['levelstr'])) || $_SESSION['levelstr'] == 'all') {
		return true;
	} else {
		return false;
	}
	
}


//将数字转换成大写字母
function numtostr($num){
	$arr = array(0=>'A',1=>'B',2=>'C',3=>'D',4=>'E',5=>'F',6=>'G',7=>'H',8=>'I',9=>'J',10=>'K',11=>'L',12=>'M',13=>'N',14=>'O',15=>'P',16=>'Q',17=>'R',18=>'S',19=>'T',20=>'U',21=>'V',22=>'W',23=>'X',24=>'Y',25=>'Z');
	return $arr[$num];
}

function deldir($directory){
	if(is_dir($directory)) {
		if($dir_handle=@opendir($directory)) {
			while(false!==($filename=readdir($dir_handle))) {
				$file=$directory."/".$filename;
				if($filename!="." && $filename!="..") {
					if(is_dir($file)) {
						deldir($file);
					}
					else {
						unlink($file);
					}
				}
			}
			closedir($dir_handle);

		}
		return rmdir($directory);
	}
}


//搜索关键字标红
function returnred($key,$content){
	return str_replace($key,'<font color="red">'.$key.'</font>',$content);
}



function SendMail($server,$sendmail,$password,$address,$title,$message){
	$mail=new \Org\Wzf\PHPMailer();
	// 设置PHPMailer使用SMTP服务器发送Email
	$mail->IsSMTP();
	// 设置邮件的字符编码，若不指定，则为'UTF-8'
	$mail->CharSet='UTF-8';
	// 添加收件人地址，可以多次使用来添加多个收件人
	$mail->AddAddress($address);
	// 设置邮件正文
	$mail->Body=$message;
	// 设置邮件头的From字段。
	$mail->From=$sendmail;
	// 设置发件人名字
	$mail->FromName='积分系统';
	// 设置邮件标题
	$mail->Subject=$title;
	// 设置SMTP服务器。
	$mail->Host=$server;
	// 设置为“需要验证”
	$mail->SMTPAuth=true;
	// 设置用户名和密码。
	$mail->Username=$sendmail;
	$mail->Password=$password;
	// 发送邮件。
	//return($mail->Send());
	$mail->Send();
}

	function array_to_json($data){
	foreach ( $data as $key => $value ) { 
        $data[$key] = urlencode ( $value ); 
    }     
		echo urldecode ( json_encode ( $data ) );
	}
	function check_phone($str){
		if(preg_match("/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/",$str)){
			return 1;
		}else{
			return 0;
		}
	}

	
	function addlog($arr,$name,$description){
		error_log ($description.':'.date('Y-m-d H:i:s').'----'.var_export($arr,true).'
			',3,"./log/".date('Y-m-d')."-".$name.".php");
	}

	//获取两个经纬度距离
	function getdistance($lng1,$lat1,$lng2,$lat2){
		//将角度转为狐度
		$radLat1=deg2rad($lat1);//deg2rad()函数将角度转换为弧度
		$radLat2=deg2rad($lat2);
		$radLng1=deg2rad($lng1);
		$radLng2=deg2rad($lng2);
		$a=$radLat1-$radLat2;
		$b=$radLng1-$radLng2;
		$s=2*asin(sqrt(pow(sin($a/2),2)+cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)))*6378.137*1000;
		return $s;
	}

	function j_encode($data){
		addlog($data,'api-'.ACTION_NAME,'返回参数：');
		$data = json_encode($data);
		echo $data;exit;
	}

	/**
	接口解密
	机密算法  token*159357-13579
	*/
	function md6($str){
		return (intval($str)+13579)/159357;
	}


	/**
	验证参数
	*/
	function check_param($arr){
		foreach ($arr as $key => $value) {
			if (empty($_REQUEST["$value"])) {
				$result = array('result'=>'0','message'=>'缺少参数'.$value,'data'=>'');
				echo json_encode($result);exit;
			}
		}
	}

	/**
	验证参数
	*/
	function check_param2($arr){
		foreach ($arr as $key => $value) {
			if (empty($_REQUEST["$value"])) {
				echo '<div style="padding-top:100px;text-align:center;font-size:55px;">访问的页面不存在 <a href="javascript:history.go(-1);">返回</a></div>';exit;
			}
		}
	}
	/**
	根据地址获取经纬度
	*/


	function getLatLong($add){
    	//转换 返回
    	 $url = 'http://api.map.baidu.com/geocoder?address='.$add.'&output=xml&coord_type=wgs84&src=sanshiliuji';
    	 $result = file_get_contents($url);
	    if($result){
			$arr = json_decode(json_encode(simplexml_load_string($result)),true);
        }
        if($arr['result']['location']['lat']){
            $data['lat'] = $arr['result']['location']['lat'];
            $data['lng'] = $arr['result']['location']['lng'];
        }else {
        	$data['lat'] = 0;
            $data['lng'] = 0;
        }
        return $data;
    }
    /**
     *@FUNCNAME:wechat_connect
     *@AUTHOR:dudongjiang;
     *@DATE:2016年9月19日;
     *@EFFORT:连接微信;
     **/
     function wechat_connect(){
         $options = array(
            'token' => C('TOKEN'), // 填写你设定的key
    		'appid' => C('APPID'),
    		'appsecret' => C('APPSECRET'),
         );
         $connect = new Wechat($options);
         return $connect;
     }
     /**
      *@FUNCNAME:check_url;
      *@AUTHOR:dudongjiang;
      *@DATE:2016年9月19日;
      *@EFFORT:检查变量是否匹配一个url;
      **/
      
     function check_url($url) {
         if (!preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is', $url)) {
             return false;
         }
         return true;
     }
     /**
      *@FUNCNAME:writelog;
      *@AUTHOR:dudongjiang;
      *@DATE:2016年9月21日;
      *@EFFORT:打印日志;
      **/
     function writelog($header,$content=""){
         $string = "";
         if(empty($content)){
             return FALSE;
         }else if(is_array($content)){
             foreach ($content as $key=>$val){
                 if(is_array($val))
                 {
                     foreach ($val as $k=>$v){
                         $string .= $k."=>".$v."<br/>";
                     }
                 }
                 else
                 {
                     $string .= $key."=>".$val."<br/>";
                 }
             }
         }
         if(is_array($content))
             $content = $string;
         $dir=getcwd().DIRECTORY_SEPARATOR.'logs'.DIRECTORY_SEPARATOR;
         if(!is_dir($dir)){
             if(!mkdir($dir)){
                 return false;
             }
         }
         $filename=$dir.DIRECTORY_SEPARATOR.date("Ymd",time()).'.log.php';
         $logs=include $filename;
         if($logs && !is_array($logs)){
             unlink($filename);
             return false;
         }
         $logs[]=array("time"=>date("Y-m-d H:i:s"),"content"=>$header.$content);
         $str="<?php \r\n return ".var_export($logs, true).";";
         if(!$fp=@fopen($filename,"wb")){
             return false;
         }
         if(!fwrite($fp, $str))return false;
         fclose($fp);
         return true;
     }
     /**
      *@FUNCNAME:check_verify;
      *@AUTHOR:dudongjiang;
      *@DATE:2016年9月22日;
      *@EFFORT:验证验证码是否正确;
      **/
     function check_verify($code, $id = ""){
         $verify = new \Think\Verify();
         return $verify->check($code, $id);
     }
?>	