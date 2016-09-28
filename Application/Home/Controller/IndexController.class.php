<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){
        $weObj = wechat_connect();
        $share = $weObj->getSignature();
        $this->share = $share;
        $this->display();
    }

    public function apilist(){
    	$result = $this->getall("select * from `my_api2` order by `id` desc");
    	$this->assign('result',$result);
    	$this->display();
    }
}