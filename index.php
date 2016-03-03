<?php
require 'config.php'

define("IN_INDEX",TRUE);
if (!defined('WX_ROOT')) {
    define('WX_ROOT', dirname(__FILE__) . '/');
}
if($global_config['Wechat']['FirstLock']){
	$wechatObj = new wechatCallbackapiTest();
	exit();
}

require WX_ROOT.'class/dblink.php';
require WX_ROOT.'class/io.php' ;
require WX_ROOT.'class/menu.php';
require WX_ROOT.'class/user.php';
require WX_ROOT.'lang/lang_index.php';

$userIO=new io(false);//新建用户输入输出类
$user=new user($userIO);//新建用户，包含io类和菜单类

switch($userIO->inputMsgType){//处理输入的类型
	case 'text':include WX_ROOT.'text_index.php';$user=text_index($user);break;
	case 'event':include WX_ROOT.'event_index.php';$user=event_index($user);break;
	default:$user->rapidReply($lang_index['inputTypeWrong']);
}

$user->save();

$user->userIO->output();//返回数据
//-------------------程序结束------------------------//

//用于TOKEN认证
class wechatCallbackapiTest
{
	function __construct(){
		$this->valid();
	}
	
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = $global_config['Wechat']['Token'];
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr,SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>