<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        $this->display();
    }

    public function check_login(){
    	$arr = $_POST;
    	if($arr['username'] == '' || $arr['password'] == '' || $arr['verify'] == ''){
    		$data = array('result'=>false,'data'=>'','message'=>'请填写完整信息!');
    		echo json_encode($data);exit;
    	}
    	if(!check_verify($arr["verify"])){
    	    $data = array('result'=>false,'data'=>'','message'=>'验证码填写有误!');
    	    exit(json_encode($data));
    	}
    	$data = M('admin')->alias('a')->field('a.*,g.`levelstr`,g.`all`,g.`id` as groupid')->join('`group` as g on g.id=a.groupid')->where(array('a.username'=>$arr['username'],'a.password'=>md5_($arr['password'])))->find();
        writelog("sql执行：",M()->getLastSql());
    	if($data){
    		$_SESSION['user_name'] = $data['username'];//用户名
            $_SESSION['levelstr'] = $data['levelstr'];//用户权限id
            $_SESSION['all'] = $data['all'];//是否查看全部
            $_SESSION['id'] = $data['id'];//用户id
            $_SESSION['adminid'] = $data['id'];//用户id
            $_SESSION['groupid'] = $data['groupid'];//分组id
    		$data = array('result'=>true,'data'=>$data,'message'=>'登录成功');
    		echo json_encode($data);
    	}else{
    		$data = array('result'=>false,'data'=>'','message'=>'用户名或密码错误!');
    		echo json_encode($data);
    	}
    }
    public function logout(){
		session_destroy();
	}
	public function updatepassword(){
        $id = $_SESSION['id'];
        $arr = array('password'=>md5_($_POST['newpass']));
        M('admin')->where(array('id'=>$id))->save($arr);
        echo '修改成功';
	}
    
    /**
     *@FUNCNAME:verify;
     *@AUTHOR:dudongjiang;
     *@DATE:2016年9月22日;
     *@EFFORT:验证码;
     **/
	public function verify(){
	    //清除缓存
	    ob_end_clean();
	    $verify = new \Think\Verify();
	    $verify->entry();
	}
}