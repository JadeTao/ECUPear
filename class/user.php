<?php
define('TABLE_USER','user');//用户表名称
define('IS_CHECK',false);//是否进行正确性检查以确保sql符合预期
define('EXP_TIME',4096);//用户会话过期时间(s)

class user{
	public $userName;//用户名
	public $userIO;//该用户输入输出类
	public $data=array();//可存储数据 status状态 menu当前菜单 word用户输入文字（文本内容不加入菜单）
	public $menu;//菜单类
	public $db;
	
	/*************************************************************************************/
	/********************************  构造函数  ******************************************/
	/*************************************************************************************/
	function __construct($userIO){
		if($userIO===NULL){
			exit('Error!UserIO hasn\'t been set.');
		}
		$this->userIO=$userIO;
		$this->userName=$userIO->userName;
		
		if($this->load()===false) $this->data['status']='new';

		if($this->userIO->inputMsgType=='text'){//输入为文字
			if(($this->data['status']=='menu'||$this->data['status']=='new')&&$this->is_menu($this->userIO->inputData['content'])){//菜单模式
				$this->data['status']='menu';
				$this->data['menu']=$this->userIO->inputData['content'];//用户输入整个菜单(模式1)
				//$this->data['menu'].=$this->userIO->inputData['content'];//用户输入下一级菜单(模式2)
			}elseif($this->data['status']!='word') $this->data['status']='new';
		}
		if(isset($this->data['menu'])){
			$this->menu=new menu($this->data['menu']);
		}else{
			$this->menu=new menu('');
		}
	}
	
	
	/*************************************************************************************/
	/********************************  快速回复  ******************************************/
	/*************************************************************************************/
	public function rapidReply($str){//快速设置文字类回复
		$this->userIO->outputMsgType='text';
		$this->userIO->outputData['content']=$str;
	}
	
	
	/*************************************************************************************/
	/*******************************  数据操作  *******************************************/
	/*************************************************************************************/
	public function refresh(){//重置当前用户
		unset($this->data);
		unset($this->menu);
		$this->data['status']='new';
	}
	
	public function refreshMenu(){
		$this->menu->refresh();
		$this->data['status']='menu';
	}
	
	public function destroy(){//清除所有数据
		$this->db->update(TABLE_USER,array('data'=>'null','last_modified'=>'null'),array('wechat_id'=>(string)$this->userName));
		unset($this->data);	
	}
	
	public function save(){//保存data变量
		if($this->data!==NULL){
			$datastr=json_encode($this->data);
			$this->db->update(TABLE_USER,array('data'=>(string)$datastr,'last_modified'=>(string)date('Y-m-d H:i:s')),array('wechat_id'=>(string)$this->userName));
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	private function load(){
		//初始化数据库连接
		$db=new connDB(
			$global_config['Database']['DBHost'],
			$global_config['Database']['DBUser'],
			$global_config['Database']['DBPassword'],
			$global_config['Database']['DBName'],
			$global_config['Database']['DBPre']
		);
		$db->isCheck=IS_CHECK;
		$this->db=$db;
		$result=$db->select(TABLE_USER,array('data','last_modified'),array('wechat_id'=>(string)$this->userName));
		if(mysql_num_rows($result)===0){
			//初始化用户
			$db->insert(TABLE_USER,array('wechat_id'=>(string)$this->userName));
			return false;
		}else{
			$row=mysql_fetch_assoc($result);
			if($row['data']==null) return false;
			
			if(time()-strtotime($row['last_modified'])>EXP_TIME){
				//超过过期时间
				return false;
			}else{
				//载入数据
				$this->data=json_decode($row['data'],true);
				return true;
			}
		}	
	}
	
	
	/*************************************************************************************/
	/***************************************  其它  **************************************/
	/*************************************************************************************/
	private function is_menu($str){//判定是否是菜单表达式
		if(!isset($str[0])){
			return 0;
		}
		if($str[0]>='0'&&$str[0]<='9'){
			return TRUE;
		}
		else return FALSE;
	}
}
?>