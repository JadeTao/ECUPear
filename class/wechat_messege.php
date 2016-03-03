<?php
//微信官网的互动（获取access token等）
if(!defined('WECHAT_TABLE_ACCESS_TOKEN')) define('WECHAT_TABLE_ACCESS_TOKEN','access_token');

class wechatMessege{
	private $access_token;
	private $appID;
	private $appsecret;
	
	function __construct($appID,$appsecret){//更新access_token
		$this->appID=$appID;
		$this->appsecret=$appsecret;
		include_once 'dblink.php';
		$conn=new connDB();
		$result=$conn->select(WECHAT_TABLE_ACCESS_TOKEN,array('token','last_modified','expires_time'));
		unset($conn);
		if($result===false) exit('DBLink ERROR');
		$isFirst=mysql_num_rows($result)==0?true:false;
		if($isFirst){
			$this->getAccessToken('new');
		}else{
			$row=mysql_fetch_assoc($result);
			$dtime=$row['expires_time']-120;
			$dtime=$dtime>0?$dtime:0;
			if((strtotime($row['last_modified'])+$dtime)<time()){
				//超时
				$this->getAccessToken('update');
			}else{
				$this->access_token=$row['token'];
			}
		}
	}
	
	private function getAccessToken($method){//更新ACCESS_TOKEN
		$conn=new connDB();
		$foo=file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$this->appID.'&secret='.$this->appsecret);
		$bar=json_decode($foo,TRUE);
		if(!isset($bar['access_token'])) exit('Error '.$bar['errcode'].':'.$bar['errmsg'].'.');
		$this->access_token=$bar['access_token'];
		if($method=='new') $result=$conn->insert(WECHAT_TABLE_ACCESS_TOKEN,array('token'=>$bar['access_token'],'last_modified'=>date('Y-m-d H:i:s',time()),'expires_time'=>$bar['expires_in']));
		else $result=$conn->update(WECHAT_TABLE_ACCESS_TOKEN,array('token'=>$bar['access_token'],'last_modified'=>date('Y-m-d H:i:s',time()),'expires_time'=>$bar['expires_in']));
		return $result;
	}
	
	public function createMenu($jsonStr){//根据输入的json创建微信菜单
		include_once 'post.php';//需要post信息
		$postCreateMenu=new post('api.weixin.qq.com','/cgi-bin/menu/create?access_token='.$this->access_token,'https','string');
		$postCreateMenu->setPostString($jsonStr);
		$result=$postCreateMenu->send();
		$return=json_decode($result,TRUE);
		return $return['errmsg'];
	}
	
	public function deleteMenu(){//删除菜单
		$result=file_get_contents('https://api.weixin.qq.com/cgi-bin/menu/delete?access_token='.$this->access_token);
		$return=json_decode($result,TRUE);
		if($return['errcode']==0){
			return 1;
		}else{
			return 0;
		}
	}
}
?>