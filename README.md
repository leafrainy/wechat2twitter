# wechat2twitter
## 功能说明
1.微信回复关键词看最近的推文

2.微信回复除关键词之外的文字发布推文

## 首先感谢
1.微信api 原作者@dodgepudding  地址:https://github.com/dodgepudding/wechat-php-sdk

2.twitter api 原作者@J7mbo   地址:https://github.com/J7mbo/twitter-api-php 

## 依赖
1.微信企业公众号

2.在twitter开放平台申请一只app获取key

3.PHP环境>=5.3

## 配置说明

1.下载后修改index.php中的微信授权和twitter授权参数
  
  关于企业微信应用的设置和twitter应用的设置请参考官方文档
  
  注意：微信使用的是回调模式

2.获取最近的推文设置
  
  修改index.php约41行 $msg=$twitter->getTwitter('leafrainy',10); leafrainy为你的账号，10为你想要的最近的推文数量

  修改index.php约40行 if($data=='推文'){ 获取最新推文的关键词，我这里是‘推文’二字，你可以修改成任意想要的

## 使用说明

1.获取最新的几条推文

微信回复在【配置说明】中设置的关键词即可

2.发布推文

微信回复除关键词外的其他文字即可

发布成功标识：推文成功:+你所发布的推文
发布失败标识: 推文失败:+twitter的失败消息

## TODO
1.增加删除推文的功能【必要】
2.增加管理后台【必要】
3.增加日志功能，除记录发布状态外还包括发布内容【一般+】
4.增加图文推文的功能，目前仅支持文字【一般-】

