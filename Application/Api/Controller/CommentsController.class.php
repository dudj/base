<?php
namespace Api\Controller;
/**
 *@FILENAME:CommentsController;
 *@AUTHOR:dudongjiang;
 *@DATE:2016年9月26日;
 *@EFFORT:评论信息接口;
 **/
class CommentsController extends BaseController{
    /**
     *@FUNCNAME:commentshop;
     *@AUTHOR:dudongjiang;
     *@DATE:2016年9月26日;
     *@EFFORT:处理评论内容传递的是json数据;
     **/
    public function commentShop(){
        //获取POST提交的数据
        $dataArr = $_POST;
        //处理数据
        $user_id = intval($dataArr['user_id']);
        $shop_id = intval($dataArr['shop_id']);
        if(!$user_id){
            $this->Rerror('用户信息没有提交！');
        }
        if(!$shop_id){
            $this->Rerror('商家信息没有提交！');
        }
        $imgArr = $this->uploadPic();
        $commentsimg = implode(',',$imgArr['imgPath']);
        if(!$dataArr['content']){
            $this->Rerror('评论内容不能为空！');
        }
        $data['user_infoid'] = $user_id;
        $data['shop_infoid'] = $shop_id;
        $data['commentsimg'] = $commentsimg;
        $data['createtime'] = $dataArr['createtime'];
        $data["grade"] = $dataArr["grade"];
        $data["content"] = $dataArr["content"];
        $comments = M("comments");
        if(!$comments->create($data)){
            $this->Rerror($comments->getError());
        }else {
            $result = $comments->add();
            if($result){
                /**
                 * 用户评论成功之后
                 * 1.评论次数+1
                 * 2.求评论评分的平均数
                 */
                $ldres= self::shopInfoChange($data); 
                if($ldres){
                    $this->Rsuccess("评论成功",array('id'=>$result));
                }else{
                    $this->Rerror($ldres);
                }
            }else{
                $this->Rerror($comments->getError());
            }
        }
    }
    /**
     *@FUNCNAME:shop_info_change;
     *@AUTHOR:dudongjiang;
     *@DATE:2016年9月26日;
     *@EFFORT:
     *      评论次数+1
     *      求评论评分的平均数;
     **/
    protected function shopInfoChange($data){
        $shop_info = M("shop_info");
        $result = $shop_info->where("shop_id=%d",$data["shop_infoid"])->find();
        //评论个数加 1
        $dataArr['appraise_count'] = $result['appraise_count'] + 1;
        //将 本次评论的评分与之前的评分相加
        $dataArr['scores'] = $result["scores"] + $data["grade"];
        //求出平均数  四舍五入 
        $dataArr['appraise_score'] = round($dataArr['scores']/$dataArr['appraise_count']);
        //保存更新的数据
        if(!$shop_info->create($dataArr)){
            return $shop_info->getError();
        }else{
            $dbinfo = $shop_info->where("shop_id=%d",$data['shop_infoid'])->save();
            if($dbinfo){
                return true;
            }else{
                return $shop_info->getError();
            }
        }
    }
    /**
     *@FUNCNAME:shopCommentList;
     *@AUTHOR:dudongjiang;
     *@DATE:2016年9月26日;
     *@EFFORT:
     *  Param:通过商家id和分页数获取商家评论信息;
     *
     *  评论人的头像，
     *  名字，
     *  评论的星级，
     *  评论内容，
     *  评论图片，
     *  评论时间
     **/
    public function shopCommentList(){
        writelog("post请求数据:",$_POST);
        //获取商家id
        $shop_id = I('post.shop_id','','intval');
        //获取每页显示数据数 默认为10条
        $pagesize = I('post.pagesize','','intval')?I('post.pagesize','','intval'):10;
        //获取当前页的数据  没有默认第一页
        $page = I('post.page','','intval')?I('post.page','','intval'):1;
        if($shop_id<=0){
            $this->Rerror('商家id不能为空！');
        }
        $count = M("`comments`")->alias('c')->
                field('c.`id`,c.`grade`,c.`content`,c.`commentsimg`,c.`createtime`,u.`nick_name`,u.`user_pic`')->
                join("LEFT JOIN `user_info` u on c.user_infoid = u.user_id")->
                where("shop_infoid=%d",$shop_id)->count();
        $pageMax = ceil($count/$pagesize);
        if($page>$pageMax){
            $this->Rsuccess("不存在商家评论信息",null);
        }
        //sql查询商户唯一评论信息 和 评论人员的信息
        $lists = M("`comments`")->alias('c')->
                field('c.`id`,c.`grade`,c.`content`,c.`commentsimg`,c.`createtime`,u.`nick_name`,u.`user_pic`')->
                join("LEFT JOIN `user_info` u on c.user_infoid = u.user_id")->
                where("shop_infoid=%d",$shop_id)->
                order("c.`createtime` desc")->
                limit(($page-1)*$pagesize,$pagesize)->
                select();
        if(!is_array($lists)){
            $this->Rsuccess("没有评论信息！",null);
        }else{
            $this->Rsuccess("列表信息",$lists);
        }
    }
}
