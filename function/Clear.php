<?php
class Clear implements iFunc{
	public function action($user,$args){
		date_default_timezone_set('PRC');
		$user->rapidReply($this->refresh_cache($user));
		return $user;
	}
	
	private function refresh_cache($user){
		$refreshFlag=false;
		$result=$user->db->select('cache',array('id','cache','last_modified'),array('cache_name'=>'library'));
		$num=mysql_num_rows($result);
		if($num===0) $refreshFlag=true;
		else{
			$row=mysql_fetch_assoc($result);
			$time1=strtotime($row['last_modified']);
			$time2=strtotime(date("Y-m-d H:i:s"));
			if($time2-$time1>60) $refreshFlag=true;//更新图书馆时间
		}
		if($refreshFlag) //更新图书馆时间
		{
			$file=file_get_contents('http://lib.ecust.edu.cn:8081/gateseat/lrp.aspx');
			if($file)
			{
				if($num===0){
					$user->db->insert('cache',array('cache_name'=>'library','cache'=>$file,'last_modified'=>date("Y-m-d H:i:s")));
				}else{
					$user->db->update('cache',array('cache'=>$file,'last_modified'=>date("Y-m-d H:i:s")),array('cache_name'=>'library'));
				}
			}	
		}
		/*
		if($time2-$time1>60){//更新教室状态时间
			include 'jiaoshi.php';
			jiaoshi_init();
		}*/
		if($refreshFlag) return '更新成功';
		else return '更新失败,未到设置的间隔时间';
	}
	
	public function show_time(){//时钟校准
		date_default_timezone_set('PRC');
		return 'Current time(Beijing +8):'.date("Y-m-d H:i:s");
	}
}
?>