<?php

header("Content-type: text/html; charset=utf-8"); 
ini_set('display_errors', 1);

include "qyWechatApi.php";
include "twitterApi.php";

//推特授权设置
$settings = array(
    'oauth_access_token' => "2816968314-hg53VWGWR8FmjokKsLHoof1VqlCcmZNQ0mLdKdH",
    'oauth_access_token_secret' => "kLEb9QfXIG6m92lFtiA96XCQuccuC2Zw39yqaqjRjdoXG",
    'consumer_key' => "0SbBK7FVPZqW5B7iDkcaf1fqw",
    'consumer_secret' => "ZKNnXddY8bulVlFEG7GfhwTJxqxMMkzSMi9G1lBNHZJsyOdrcy"
);

//微信授权设置
$options = array(
        'token'=>'VIR6pVmxsGHnaeglFn',
        'encodingaeskey'=>'PIhgjdhDNKfAB6DEayTzhi5fSonIgxibqMIArOlimVZ',
        'appid'=>'wx0414d29fe5712e31',	
        'appsecret'=>'SgfnAwptpGyuva7kHa-lUfEFfb8ZfqeCgnKxHIZfJXLtqLxSA4Gx5juQjkSF_GP4'

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
   if($data=='推文' || $data=='110'){
        $msg=$twitter->getTwitter('leafrainy',10);
   }else{//发推
        $msg=$twitter->postTwitter($data);
   }
   
   $weObj->text($msg)->reply(); 
}else{
   $weObj->text("暂时仅支持文字!")->reply(); 
}



?>