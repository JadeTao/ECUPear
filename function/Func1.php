<?php
class Func1 implements iFunc{
	public function action($user,$args){
		$user->rapidReply($args[0].' '.$args[1]);
		return $user;
	}
}
?>