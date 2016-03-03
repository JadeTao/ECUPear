<?php
//处理菜单命令
//menu类定义
class menu
{
	private $items=array();//命令数组
	private $num;//当前菜单层次

	function __construct($str=""){
		$this->items=str_split($str);//将字符串化为数组
		$this->num=0;
	}

	function __destruct(){
		unset($this->items);
		unset($this->num);
	}

	function out(){//取出当前菜单选项
		if(!isset($this->items[$this->num])){
			return NULL;
		}
		$menu=$this->items[$this->num];
		while(($menu<'0'||$menu>'9')&&$menu!==NULL){
			$this->num++;
			if(isset($this->items[$this->num])){
				$menu=$this->items[$this->num];
			}else return NULL;
		}
		if($menu===NULL){
			return NULL;
		}
		$this->num++;
		return (string)$menu;
	}
	
	function refresh(){
		unset($this->items);
		$this->num=0;
	}
}

?>