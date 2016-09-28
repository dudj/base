<?php
namespace Admin\Controller;
use Think\Controller;
//$$$$订单管理-orders$$$$
class OrdersController extends BaseController {
    //####订单管理-index####
    public function index(){
        $c2 = $this->getclass(2,'pay_way');
        $this->assign('c2',$c2);$c6 = $this->getclass(6,'status');
        $this->assign('c6',$c6);
        $this->display();
    }


    public function list_page(){
        //导出逻辑
        if($_POST['daochu']){
            $_POST['page'] = 1;
            $_POST['rows'] = 99999999;
        }
        $sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
        $order = isset($_POST['order']) ? $_POST['order'] : 'desc';
        //导出逻辑结束
        $starttime = $_POST['starttime'];
        $endtime = $_POST['endtime'];
        if($_SESSION['all'] == 1){
            $where = 'where 1=1 and ';
        }else{
            $where = 'where `orders`.`adminid`='.$_SESSION['adminid'].' and ';
        }
        
        if(!empty($starttime)){
            $starttime = strtotime($starttime);
            $where .=" UNIX_TIMESTAMP(`orders`.`createtime`)>='".$starttime."' and";
        }
        if(!empty($endtime)){
            $endtime = strtotime($endtime);
            $where .=" UNIX_TIMESTAMP(`orders`.`createtime`)<='".$endtime."' and";
        }
        if($_POST['user_infoid'] <> ''){$where .= " `orders`.`user_infoid` = ".$_POST['user_infoid']." and ";}if($_POST['shop_infoid'] <> ''){$where .= " `orders`.`shop_infoid` = ".$_POST['shop_infoid']." and ";}if($_POST['user_picsid'] <> ''){$where .= " `orders`.`user_picsid` = ".$_POST['user_picsid']." and ";}if($_POST['pay_way'] <> ''){$where .= " `orders`.`pay_way` = ".$_POST['pay_way']." and ";}if($_POST['status'] <> ''){$where .= " `orders`.`status` = ".$_POST['status']." and ";}
        $where = trim($where,' and');
    	$sql = "select `orders`.`id`,`orders`.`orderNumber`,`orders`.`pay_way`,`orders`.`status`,`orders`.`money`,`orders`.`prepay_id`,`orders`.`user_name`,`orders`.`user_address`,`orders`.`tele_phone`,`orders`.`createtime`,`orders`.`updatetime` from `orders`  left join `user_info` on `user_info`.`id` = `orders`.`user_infoid` left join `shop_info` on `shop_info`.`id` = `orders`.`shop_infoid` left join `user_pics` on `user_pics`.`id` = `orders`.`user_picsid` ".$where." order by `orders`.`".$sort."` ".$order;
    	$result = $this->pagelist_($sql,$_POST);

        

        foreach ($result['rows'] as $key => $value) {$result['rows'][$key]['pay_way'] = $this->getclassname($value['pay_way']);$result['rows'][$key]['status'] = $this->getclassname($value['status']);}

        //导出逻辑
        if($_POST['daochu']){
            $this->export_xls('orders',array('ID','订单号','支付方式','订单状态','支付金额','微信签名','收货人','收货地址','联系方式','创建时间','更新时间'),$result['rows']);
            $res = array('result'=>true,'data'=>'','message'=>'');
            echo json_encode($res);exit;
        }
        //导出逻辑结束
    	echo json_encode($result);
    }


    

    

    //@@@@订单管理添加-add@@@@
    public function add(){
        $c2 = $this->getclass(2,'pay_way');
        $this->assign('c2',$c2);$c6 = $this->getclass(6,'status');
        $this->assign('c6',$c6);
        $this->display();
    }

    public function saveadd(){
        //上传
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;
        $upload->rootPath = './upload/';
        $upload->savePath = '';
        $upload->saveName = array('uniqid','');//uniqid函数生成一个唯一的字符串序列。
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
        $upload->autoSub = true;
        $upload->subName = array('date','Ymd');
        $info = $upload->upload();
        if(!is_array($info)){
            exit($info);
        }
        

        $_POST['createtime'] = date('Y-m-d H:i:s',time());
        $_POST['updatetime'] = date('Y-m-d H:i:s',time());
        $_POST['adminid'] = $_SESSION['id'];
        $orders = M('orders');
        $orders->add($_POST);
        echo 'success';
    }
    //@@@@订单管理修改-update@@@@
    public function update(){
        $id = $_GET['id']; 
        $orders = M('orders');
        $where['id'] = $id;
        $result = $orders->where($where)->find();
        $c2 = $this->getclass(2,'pay_way',$result['pay_way']);
        $this->assign('c2',$c2);$c6 = $this->getclass(6,'status',$result['status']);
        $this->assign('c6',$c6);

    	$this->assign('result',$result);
        $this->display();
    }

    public function saveupdate(){
    	$id = $_POST['id'];
    	unset($_POST['id']);
        //上传
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;
        $upload->rootPath = './upload/';
        $upload->savePath = '';
        $upload->saveName = array('uniqid','');//uniqid函数生成一个唯一的字符串序列。
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
        $upload->autoSub = true;
        $upload->subName = array('date','Ymd');
        $info = $upload->upload();
        if(!is_array($info)){
            exit($info);
        }
        $_POST['updatetime'] =date('Y-m-d H:i:s',time());
        
    	$orders = M('orders');
        $where['id'] = $id;
        $orders->where($where)->save($_POST);
        echo 'success';
    }
    
    public function xiangqing(){
        $id = $_GET['id']; 
        $orders = M('orders');
        $where['id'] = $id;
        $result = $orders->where($where)->find();
        $c2 = $this->getclass(2,'pay_way',$result['pay_way']);
        $this->assign('c2',$c2);$c6 = $this->getclass(6,'status',$result['status']);
        $this->assign('c6',$c6);
        $this->assign('result',$result);
        $this->display();
    }
    //@@@@订单管理删除-del@@@@
    public function del(){
    	$id = $_GET['id'];
    	$orders = M('orders');
        $orders->delete($id);
        echo 'success';
    }
    //
    public function delall(){
    	$idlist = $_POST['idlist'];
    	$orders = M('orders');
        $where['id'] = array('in',$idlist);
        $orders->where($where)->delete();
    }

}