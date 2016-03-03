<?php
function event_index($user){
	require WX_ROOT.'lang/lang_index.php';

	switch($user->userIO->inputData['event']){
		case 'subscribe':$user->rapidReply($lang_event_index['subscribe']);break;
		case 'unsubscribe':$user->rapidReply($lang_event_index['unsubscribe']);break;
		case 'CLICK':{
			include_once WX_ROOT.'menu/menu.php';
			$user->data['menu']=$user->userIO->inputData['eventKey'];
			$user->menu=new menu($user->data['menu']);
			$user=menuMain($user);
			break;
		}
		default:$user->rapidReply($lang_event_index['default']);
	}
	return $user;
}
?>