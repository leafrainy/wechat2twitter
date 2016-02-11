<?php

header("Content-type: text/html; charset=utf-8"); 
ini_set('display_errors', 1);

include "qyWechatApi.php";
include "twitterApi.php";

//推特授权设置
$settings = array(
    'oauth_access_token' => "xxx",
    'oauth_access_token_secret' => "xxx",
    'consumer_key' => "xxx",
    'consumer_secret' => "xxx"
);

//微信授权设置
$options = array(
        'token'=>'xxx',
        'encodingaeskey'=>'xxx',
        'appid'=>'xxx',	
        'appsecret'=>'xxx'

);

//实例化
$twitter = new twitterApi($settings);
$weObj = new Wechat($options);
$ret=$weObj->valid();

//获取消息
$from = $weObj->getRev()->getRevFrom();
$type = $weObj->getRevType();
$data = $weObj->getRevContent();


if($type=='text'){
   
   //获取最新10条推文
   if($data=='推文'){
        $msg=$twitter->getTwitter('leafrainy',10);
   }else{//发推
        $msg=$twitter->postTwitter($data);
   }
   
   $weObj->text($msg)->reply(); 
}else{
   $weObj->text("暂时仅支持文字!")->reply(); 
}



?>