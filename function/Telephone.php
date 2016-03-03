<?php
class Telephone implements iFunc{
	public function action($user,$args){
		$sql='select mingchen,phone from dianhua where shuxing=';
		switch($args[0]){
			case '1':$sql.="'考务选课安排'";$result=$user->db->query($sql);$text='您所查询的电话如下:';$row=mysql_fetch_array($result);
				while($row!=NULL){
					$text.="\n".$row['mingchen'].':'.$row['phone'];
					$row=mysql_fetch_array($result);
				}
				break;
			case '2':$sql.="'教务课程查询'";$result=$user->db->query($sql);$text='您所查询的电话如下:';$row=mysql_fetch_array($result);
				while($row!=NULL){
					$text.="\n".$row['mingchen'].':'.$row['phone'];
					$row=mysql_fetch_array($result);
				}
				break;
			case '3':$sql.="'生活后勤'";$result=$user->db->query($sql);$text='您所查询的电话如下:';$row=mysql_fetch_array($result);
				while($row!=NULL){
					$text.="\n".$row['mingchen'].':'.$row['phone'];
					$row=mysql_fetch_array($result);
				}
				break;
			default:$text='请输入阿拉伯数字(不带其它空格或符号)';
		}
		$user->rapidReply($text);
		return $user;
	}
}
?>