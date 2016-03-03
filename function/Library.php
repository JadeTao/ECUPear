<?php
class Library implements iFunc{
	public function action($user,$args){
		$result=$user->db->select('cache',array('cache','last_modified'),array('cache_name'=>'library'));
		$assoc=mysql_fetch_assoc($result);
		$source=$assoc['cache'];
		$text="图书馆剩余座位:
1楼：".$this->tsgGetNum($source,1)."个;
2楼：".$this->tsgGetNum($source,2)."个;
3楼：".$this->tsgGetNum($source,3)."个;
4楼：".$this->tsgGetNum($source,4)."个;
5楼：".$this->tsgGetNum($source,5)."个;";
		$time=$assoc['last_modified'];
		$text.="查询时间:".$time."
数据来源自http://lib.ecust.edu.cn:8081/gateseat/lrp.aspx
可能并不是当前时间的信息，请注意识别
如发现时间间隔较长，可回复数字5更新图书馆空位信息后再回复3查询";
		$user->rapidReply($text);
		return $user;
	}
	
	private function tsgGetNum($source,$flour){	
		$target='<span id="Label'.$flour.'f2"><b><font color="#CC0000" size="6">';
		$length=strlen($target);
		$startPos=strpos($source,$target)+$length;
		$endPos=strpos($source,'</font>',$startPos);
		$length_num=$endPos-$startPos;
		$result=substr($source,$startPos,$length_num);
		return $result;
	}
}
?>