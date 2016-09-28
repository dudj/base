<?php
namespace Home\Controller;
use Think\Controller;
/**
 *@FILENAME:Home\Controller;
 *@AUTHOR:dudongjiang;
 *@DATE:2016年9月20日;
 *@EFFORT:type:一张类别表my_classes中
 *名称是自动回复语类型：值包含三个：自动回复(3)、关键词回复(4)、被关注回复(5)
 *因此做判断 的时候需要使用int整型去做判断;
 *获取微信的一些信息
 **/
class WeixinController extends Controller
{
    /**
     *@FUNCNAME:index;
     *@AUTHOR:dudongjiang;
     *@DATE:2016年9月19日;
     *@EFFORT:设置授权的地址并且验证token;
     **/
	public function index()
	{
		$weObj = connect_wechat();
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		    //接收消息的类型
			$type = $weObj->getRev()->getRevType();
			switch($type){
				case $weObj::MSGTYPE_TEXT:
					// 文本
					$data['content'] = $weObj->getRev()->getRevContent();
					// 获取发送内容
					$data['fromusername'] = $weObj->getRev()->getRevFrom();
					// 获取发送者
					$tousername = $weObj->getRev()->getRevTo();
					//获取接受者
					$data['createtime'] = $weObj->getRev()->getRevCtime();
					// 获取发送时间
					$data['msgtype'] = $type;
					// 获取发送时间
					//关键词回复
					$text = $this->normalReply($data, $type);
					$text = trim($text);
					//判断关键词是否为数字或者数字字符串
					if(is_numeric(trim($data['content']))){
						$ad_list = $this->renews($text, $data['fromusername']);
						file_put_contents("/tmp/wechat0923.txt", var_export($ad_list,true),FILE_APPEND);
						$weObj->news($ad_list)->reply();
					}else{
						$weObj->text($text)->reply();
					}
					exit();
					break;
				case $weObj::MSGTYPE_EVENT:
					//事件
					$event = $weObj->getRev()->getRevEvent();
					$event['openid'] = $weObj->getRev()->getRevFrom();
					if($event['event'] == 'subscribe'){
                        //添加或者编辑用户信息
						$wxuser_mod = M('my_wechatusers');
						$wxuser_infor = $wxuser_mod->where("openid = '{$event['openid']}'")->find();
                        $member['openid'] = $event['openid'];
						$member['subscribe'] = 1;
						$member['subscribe_time'] = time();
						//没关注过
						if (!$wxuser_infor) {
                            $member['uphits'] = 1;
							$wxuser_mod->add($member);
						} else {
                            $member['uphits'] = $wxuser_infor['uphits'] + 1;
							$wxuser_mod->where("openid='{$event['openid']}'")->save($member);
						}
						// 关注后发关注消息开始
						$Message = M('my_wechatkeywords');
						$where = array(
							'type' => 5
						);
						$content = $Message->where($where)->find();
						$info = $content['response'];
						$info = str_replace("<br/>", "\n", $info);
						$weObj->text($info)->reply();
						exit();
						//关注消息结束
					}elseif($event['event'] == 'unsubscribe'){
						$wxuser_mod = M('my_wechatusers');
						$member['subscribe'] = 0;
						$member['unsubscribe_time'] = time();
						$wxuser_mod->where("openid = '{$event['openid']}'")->save($member);
					}elseif($event['event'] == 'CLICK'){// 点击菜单拉取消息
						if($event['key'] == 3){
							$weObj->image('vEV52sDd1-hE_HlPHXrk-xjaUkKNgodvqc30hIKswAU')->reply();
						}else{
							$res_data = M('my_wechatkeywords')->where('keyword = "'.$event['key'].'"')->find();
							if($res_data){
								$info = str_replace("<br/>", "\n", $res_data['response']);
								$weObj->text($info)->reply();
							}
						}
						exit();
					}elseif ($event['event'] == 'VIEW'){// 点击菜单跳转页面
						history($event['openid'], 2, $event['key']);
						exit();
					}elseif($event['event'] == 'SCAN'){
						//用户已关注时的事件推送 扫描时间
					}
					break;
				case $weObj::MSGTYPE_IMAGE:
					break;
				case $weObj::MSGTYPE_LOCATION:
					break;
				case $weObj::MSGTYPE_VOICE:
					break;
				default:
					$weObj->text("help info")->reply();
			}
		}else{
			$weObj->valid();
		}
	}
	
	/*
	* 关键词回复
	*/
	public function normalReply($data, $type)
	{
	    //记录用户回复的信息
		$this->savelast($data);
		// 查询回复
		$Message = M('my_wechatkeywords');
		$where['keyword'] = array(
			'like',
			'%' . $data['content'] . '%'
		);
		$info = $Message->where($where)->select();
		if(empty($info)){
			$where2 = array(
				'type' => 3
			);
			$info = $Message->where($where2)->select();
		}
		$i = 0;
		foreach($info as $val){
			$i++;
			$infor.= $val['response'] . "\n";
		}
		return $infor;
	}
	
	public function savelast($data, $type)
	{
		// 数据储存
		$usermsg = M('my_wechatrecord');
		$res = $usermsg->add(array(
			'fromusername' => $data['fromusername'],
			'content' => $data['content'],
			'createtime' => $data['createtime'],
			'msgtype' => $data['msgtype'],
			'replycontent' => '',
		));
	}
	
    /**
     *@FUNCNAME:renews;
     *@AUTHOR:dudongjiang;
     *@DATE:2016年9月23日;
     *@EFFORT:处理返回信息 这里keyword填写的是 数字或者数字字符串就会查找这里的数据;
     **/
	public function renews($id, $openid)
	{
		$my_wechatsingleimgreply = M('my_wechatsingleimgreply');
		$one = $my_wechatsingleimgreply->where("keyword=$id")->select();
		foreach($one as $key => $value){
			$ad_list[$key]['Title'] = $value['title'];
			$ad_list[$key]['Description'] = $value['digest'];
			$ad_list[$key]['PicUrl'] = "http://" . I('server.HTTP_HOST') . __ROOT__ . $value['img_url'];
			if(strstr($value['content_source_url'], "&")){
				$ad_list[$key]['Url'] = $value['content_source_url'] . "&openid=" . $openid;
			}else{
				$ad_list[$key]['Url'] = $value['content_source_url'] . "/openid/" . $openid;
			}
		}
		return $ad_list;
	}
}