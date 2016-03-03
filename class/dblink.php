<?php
//该类为数据库连接的抽象，包含了数据库的几个基本操作，并对一些敏感操作进行了保护，用于低层
if(!defined('WX_ROOT'))define('WX_ROOT',dirname(dirname(__FILE__)).'/');

class connDB{
	public $isCheck;//检查设置，默认为FALSE,设为TRUE时将对insert和update行为的结果进行正确性检查
	private $conn;//数据库连接
	private $dbpre;//表前缀
	
	function __construct($dbhost,$dbuser,$dbpw,$dbname,$dbpre=''){
		//构造函数
		if(empty($dbhost))exit('DBLink error: Empty DBHost. ');//判断输入不能为空
		if(empty($dbuser))exit('DBLink error: Empty DBUser. ');
		if(empty($dbpw))exit('DBLink error: Empty DBPassword. ');
		if(empty($dbname))exit('DBLink error: Empty DBName. ');
		if(empty($dbpre)){
			$this->dbpre='';
		}else{
			$this->dbpre=$dbpre;
		}
		
		$this->isCheck=FALSE;
		
		$conn=@mysql_connect($dbhost,$dbuser,$dbpw);//连接数据库服务器
		if(!$conn)exit('DBserver: Link error or overtime.');
		$this->conn=$conn;
		if(!@mysql_select_db($dbname))exit('DBLink '.$dbname.': Link error or overtime. ');//连接数据库
		mysql_query('set names utf8');//设置数据库字符集为utf8
	}
	
	function __destruct(){
		//析构函数
		mysql_close($this->conn);
	}
	
	public function checkSQL($str){
		//检查sql注入攻击，返回经过检查的字符串
		$str=mysql_real_escape_string($str);
		return $str;
	}
	
	public function select($TName,$items='*',$restrict=''){
		//数据查询
		//example sql: select $items[0],$items[1]... from $TName [where $restrict]
		//$item应为数组型变量
		if(empty($TName))exit('Class connDB::select(): Empty TableName. ');
		$TName=DB_PRE.$TName;

		//生成所选列序列
		$item=' ';
		if(is_array($items)){
			foreach($items as $key=>$value){
				if($item!==' ')$item.=',';
				$item.=$value;
			}
			$item.=' ';
		}elseif($items==='*'){
			$item=' * ';
		}else exit('Class connDB::select(): Var items should be an array or \'*\'. ');
		$item=$this->checkSQL($item);
		
		//加上限制语句
		if(is_array($restrict)){
			$itemR=' ';
			foreach($restrict as $key => $value){
				if($itemR!==' ') $itemR.=' and ';
				if(is_string($value)) $itemR.=$this->checkSQL($key).'=\''.$this->checkSQL($value).'\'';
				else $itemR.=$this->checkSQL($key).'='.$this->checkSQL($value);
			}
			$restrict=$itemR.' ';
			unset($itemR);
		}
		if($restrict!=='') $restrict=' WHERE '.$restrict.' ';
		
		//生成查询语句
		$query='SELECT'.$item.'FROM '.$TName.$restrict;
		$result=mysql_query($query) or die("Operation Fails:".mysql_error());
		
		return $result;
	}
	
	public function insert($TName,$items=NULL){
		//数据插入,item应为assoc
		//example sql: insert into $TName ($items[0].key,$items[1].key...) values ($items[0].value,items[1].value...)
		if(empty($TName))exit('Class connDB::update(): Empty TableName. ');
		$TName=DB_PRE.$TName;
		
		//生成影响序列
		if(is_array($items)){
			$keys=' (';
			$values=' (';
			foreach($items as $key=>$value){
				if($keys!==' (')$keys.=',';else $key1st=$key;
				if($values!==' (')$values.=',';
				
				$keys.=$this->checkSQL($key);
				if(is_string($value))$values.='"'.$this->checkSQL($value).'"';
				else $values.=$this->checkSQL($value);
			}
			$keys.=') ';
			$values.=') ';
		}else exit('Class connDB::insert(): Var items should be an array. ');
		
		//生成查询语句
		$query='INSERT INTO '.$TName.$keys.'VALUES'.$values;
		$result=mysql_query($query) or die("Operation Fails:".mysql_error());
		
		//进行正确性检查
		if($this->isCheck){
			$result1=$this->select($TName,array($key1st),$items);
			if(mysql_num_rows($result1)===0){
				//插入失败
				exit('Class connDB::insert(): Insert error. Check that the restriction is correct. ');
			}
		}

		return $result;
	}
	
	public function update($TName,$items=NULL,$restrict='',$multiple=FALSE){
		//数据更新
		//example sql: update $TName set $item[0].key=$item[0].value,$item[1].key=$item[1].value... [where $restrict]
		//multiple==FALSE时将会进行检查，若影响条目大于1将不会执行语句
		if(empty($TName))exit('Class connDB::update(): Empty TableName. ');
		$TName=DB_PRE.$TName;
		
		//判断影响条目数
		if($multiple===FALSE){
			$itemsSelect=array_keys($items);
			$itemSelect=array();
			$itemSelect[0]=$itemsSelect[0];
			$resSelect=$this->select($TName,$itemSelect,$restrict);
			if(mysql_num_rows($resSelect)>1)exit('Class connDB::update(): Function will effect multiple rows while var multiple is FALSE. ');
		}
		
		//生成影响序列
		$item=' ';
		if(is_array($items)){
			foreach($items as $key=>$value){
				if($item!==' ')$item.=','; else $key1st=$key;
				if(is_string($value))$item.=$this->checkSQL($key).'="'.$this->checkSQL($value).'"';
				else $item.=$this->checkSQL($key).'='.$this->checkSQL($value);
			}
		}else exit('Class connDB::update(): Var items should be an array. ');
		
		//加上限制语句
		if(is_array($restrict)){
			$itemR=' ';
			foreach($restrict as $key => $value){
				if($itemR!==' ') $itemR.=' and ';
				if(is_string($value)) $itemR.=$this->checkSQL($key).'=\''.$this->checkSQL($value).'\'';
				else $itemR.=$this->checkSQL($key).'='.$this->checkSQL($value);
			}
			$restrict=$itemR.' ';
			unset($itemR);
		}
		if($restrict!=='') $restrict=' WHERE '.$restrict.' ';
		
		//生成查询语句
		$query='UPDATE '.$TName.' SET'.$item.$restrict;
		$result=mysql_query($query) or die("Operation Fails:".mysql_error());
		
		if($this->isCheck){
			//生成限制语句
			$result1=$this->select($TName,array($key1st),$items);
			if(mysql_num_rows($result1)===0){
				//插入失败
				exit('Class connDB::update(): Insert error. Please try again later. ');
			}
		}
		
		return $result;
	}
	
	public function delete($TName,$restrict='',$multiple=FALSE){
		//数据删除
		//example sql: delete from $TName [where $restrict]
		//multiple==FALSE时将会进行检查，若影响条目大于1将不会执行语句
		if(empty($TName))exit('Class connDB::delete(): Empty TableName. ');
		$TName=DB_PRE.$TName;
		
		//判断影响条目数
		if($multiple===FALSE){
			$resSelect=$this->select($TName,'*',$restrict);
			if(mysql_num_rows($resSelect)>1)exit('Class connDB::delete(): Function will effect multiple rows while var multiple is FALSE. ');
		}
		
		//加上限制语句
		if(is_array($restrict)){
			$itemR=' ';
			foreach($restrict as $key => $value){
				if($itemR!==' ') $itemR.=' and ';
				if(is_string($value)) $itemR.=$this->checkSQL($key).'=\''.$this->checkSQL($value).'\'';
				else $itemR.=$this->checkSQL($key).'='.$this->checkSQL($value);
			}
			$restrict=$itemR.' ';
			unset($itemR);
		}
		if($restrict!=='') $restrict=' WHERE '.$restrict.' ';
		
		//生成查询语句
		$query='DELETE FROM '.$TName.$restrict;
		$result=mysql_query($query) or die("Operation Fails:".mysql_error());
		return $result;
	}
	
	public function query($sql){
		//不进行检查，直接进行查询(不推荐)
		$result=mysql_query($sql);
		return $result;
	}
}
?>