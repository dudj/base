<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
</head>
<body>
您好
</body>
<script type="text/javascript">
wx.config({
    debug: true,
    appId: '<?php echo $share["appId"];?>',
    timestamp: <?php echo $share["timestamp"];?>,
    nonceStr: '<?php echo $share["nonceStr"];?>',
    signature: '<?php echo $share["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
      'checkJsApi',
      'onMenuShareTimeline',
      'onMenuShareAppMessage',
      'onMenuShareQQ',
      'onMenuShareWeibo',
      'openLocation',
      'getLocation',
      'scanQRCode'
    ]
  });
wx.ready(function () {
          // 在这里调用 API
          var shareData = {
              title: "我参与了抽花签游戏，玫瑰是我的命运签！" ,
              desc:"本游戏是依托《红楼梦》第六十三回中的花名签酒令设计，共三十八只！参与本游戏，摇取属于你的花名签吧！",
          };
          wx.onMenuShareAppMessage(shareData);
          wx.onMenuShareTimeline(shareData);
          wx.onMenuShareQQ(shareData);
          wx.onMenuShareWeibo(shareData);
         });  
</script>
</html>