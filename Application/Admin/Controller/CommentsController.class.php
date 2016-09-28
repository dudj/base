<?php
namespace Admin\Controller;
use Think\Controller;
//$$$$评论管理-comments$$$$
class CommentsController extends BaseController {
    //####评论列表-index####
    public function index(){
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
            $where = 'where `comments`.`adminid`='.$_SESSION['adminid'].' and ';
        }
        
        if(!empty($starttime)){
            $starttime = strtotime($starttime);
            $where .="`comments`.`createtime` >='".$starttime."' and";
        }
        if(!empty($endtime)){
            $endtime = strtotime($endtime);
            $where .=" `comments`.`createtime` <='".$endtime."' and";
        }
        if($_POST['user_infoid'] <> ''){$where .= " `comments`.`user_infoid` = ".$_POST['user_infoid']." and ";}if($_POST['shop_infoid'] <> ''){$where .= " `comments`.`shop_infoid` = ".$_POST['shop_infoid']." and ";}
        $where = trim($where,' and');
    	$sql = "select `comments`.`id`,`comments`.`content`,`comments`.`commentsimg`,`comments`.`grade`,`comments`.`createtime`,`comments`.`updatetime`,`user_info`.`nick_name`,`user_info`.`user_account`,`shop_info`.`shop_name` from `comments`  left join `user_info` on `user_info`.`user_id` = `comments`.`user_infoid` left join `shop_info` on `shop_info`.`shop_id` = `comments`.`shop_infoid` ".$where." order by `comments`.`".$sort."` ".$order;
    	$result = $this->pagelist_($sql,$_POST);
        //导出逻辑
        if($_POST['daochu']){
            $this->export_xls('comments',array('ID','评论内容','评论图片','评论级别','创建时间','更新时间'),$result['rows']);
            $res = array('result'=>true,'data'=>'','message'=>'');
            echo json_encode($res);exit;
        }
        //导出逻辑结束
    	echo json_encode($result);
    }
    //
    public function add(){
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
        if(!empty($info)){foreach ($info as $key => $value) {if($value['key']){$_POST['commentsimg'] .= '/upload/'.$value['savepath'].$value['savename'].',';}}$_POST['commentsimg'] = trim($_POST['commentsimg'],',');}
        $_POST['createtime'] = time();
        $_POST['updatetime'] = time();
        $_POST['adminid'] = $_SESSION['id'];
        $comments = M('comments');
        $comments->add($_POST);
        echo 'success';
    }
    //
    public function update(){
        $id = $_GET['id']; 
        $comments = M('comments');
        $where['id'] = $id;
        $result = $comments->where($where)->find();
        

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
        $_POST['updatetime'] = time();
        if(!empty($info)){foreach ($info as $key => $value) {if($value['key']){$_POST['commentsimg'] .= '/upload/'.$value['savepath'].$value['savename'].',';}}$_POST['commentsimg'] = trim($_POST['commentsimg'],',');}
    	$comments = M('comments');
        $where['id'] = $id;
        $comments->where($where)->save($_POST);
        echo 'success';
    }
    public function xiangqing(){
        $id = $_GET['id']; 
        $comments = M('comments');
        $where['id'] = $id;
        $result = $comments->where($where)->find();
        $this->assign('result',$result);
        $this->display();
    }
    //@@@@评论列表删除-del@@@@
    public function del(){
    	$id = $_GET['id'];
    	$comments = M('comments');
        $comments->delete($id);
        echo 'success';
    }
    public function delall(){
    	$idlist = $_POST['idlist'];
    	$comments = M('comments');
        $where['id'] = array('in',$idlist);
        $comments->where($where)->delete();
    }
}