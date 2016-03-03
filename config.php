<?php
$global_config=array();
//数据库配置
$global_config['Database']['DBHost']='localhost';
$global_config['Database']['DBUser']='root';
$global_config['Database']['DBPassword']='123456';
$global_config['Database']['DBName']='xhl';
$global_config['Database']['DBPre']='';//表前缀

//微信公众平台接口配置
$global_config['Wechat']['FirstLock']=false;//Token认证时设为true，以后设为false
$global_config['Wechat']['Token']='test';//Token，用于初始认证
$global_config['Wechat']['AppID']='testID';//AppID，用于与微信交互
$global_config['Wechat']['AppSecret']='testSecret';//AppSecret，用于与微信交互

//管理员安全设置
$global_config['Admin']['Password']='123456';//管理员密码