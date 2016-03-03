<?php
class List1 implements iList{
	public function action($user,$data){
		$user->rapidReply($data['step1'].$data['step2']);
		return $user;
	}
}
?>