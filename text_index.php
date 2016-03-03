<?php
function text_index($user){
	require WX_ROOT.'lang/lang_index.php';

	switch($user->userIO->inputData['content']){
		case '菜单':
			include WX_ROOT.'menu/menu.php';
			$user->refreshMenu();
			$user=menuMain($user);
			break;
		case '帮助':
			$user->rapidReply($lang_text_index['help']);
			$user->refresh();
			break;
		case '重置':
			$user->refresh();
			$user->rapidReply($lang_text_index['refresh']);
			break;
		default:
			if($user->data['status']=='new'){
				$user->rapidReply($lang_text_index['default']);
			}else{
				include 'menu/menu.php';
				$user->data['status']='menu';
				$user=menuMain($user);
			}
	}
	return $user;
}
?>