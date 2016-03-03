<?php
class Weather implements iList{
	public function action($user,$data){
		$json=file_get_contents("http://www.360api.net/wapi.php?action=weather&appkey=appkey&keyword=".$data['step1']);
		$data1= json_decode($json);
	
		$contentStr = $data1->data;
	
		$text=str_replace('{br}',"\n",$contentStr);
		
		$user->rapidReply($text);
		return $user;
	}
}

function weatherDefault(){
	$json=file_get_contents("http://www.360api.net/wapi.php?action=weather&appkey=appkey&keyword=奉贤");
	$data= json_decode($json);

	$contentStr = $data->data;

	return str_replace('{br}',"\n",$contentStr);
}
?>