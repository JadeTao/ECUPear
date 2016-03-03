<?php
class Advice implements iList{
	public function action($user,$data){
		date_default_timezone_set('PRC');
		$Arg=$data['step1'];
		if($Arg==NULL){
			return '请用正确格式输入留言哦,重新进入菜单一次吧';
		}
		$time=date("Y-m-d H:i:s");
		$user->db->insert('advice',array('wechat_id'=>(string)$user->userName,'advice'=>(string)$Arg,'time'=>(string)$time));	
		$user->rapidReply('提交完成');
		return $user;
	}
}
?>