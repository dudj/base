<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function __construct(){
        parent::__construct();
    }

     /**
	获取一条数据
    */
    public function getone($sql){
    	$result = M()->query($sql);
    	return $result[0];
    }

    /**
	获取多条数据
    */
    public function getall($sql){
    	$result = M()->query($sql);
    	return $result;
    }

}