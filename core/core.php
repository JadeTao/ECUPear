<?php
//核心生成模块
if (!defined('WX_ROOT')) {
    define('WX_ROOT', dirname(dirname(__FILE__)) . '/');
}
require WX_ROOT.'core/mods.php';

//菜单树核心生成模块
//需要传入一个经过xml编码的数组构成的树
//节点规则:
//每个节点为一个对象，mod子节点的文字节点为一个变量，会将该节点的value节点传入core/mods.php中的相应名称+MenuDecode中进行编译
//用户菜单为空时进入返回部分，否则进入子菜单
//children节点为全部的子菜单，为node数组节点，每个元素的index属性为菜单的索引值
//返回部分将分别被编译为将值放入$user->userIO->outputMsgType和$user->userIO->outputData数组中的php代码
//树将会被编译为菜单结构的php代码
class treeMenu{
	private $strMenu;//目标程序
	private $indent;//缩进字符
	private $indentState;//缩进状态
	
	function __construct($strXml,$indent="\t"){
		$this->indent=$indent;//设置缩进字符为制表符
		$this->indentState=0;
		if($strXml!==NULL){
			$treeObj=simplexml_load_string($strXml,'SimpleXMLElement', LIBXML_NOCDATA );
			$this->treeDecode($treeObj);
			$this->saveCode($strXml);
		}
	}
	
	private function treeDecode($treeObj){
		$this->strMenu="<?php ".$this->indent();	
		$this->strMenu.="function menuMain(\$user){".$this->indent('+');//开始编译
		$this->strMenu.="include WX_ROOT.'lang/lang_menu.php';".$this->indent();
		$this->nodeDecode($treeObj);
		$this->strMenu.="return \$user; ".$this->indent('-')."}?>";
		file_put_contents('menu/menu.php',$this->strMenu);
	}
	
	private function nodeDecode($node){
		$this->strMenu.="\$item=\$user->menu->out();".$this->indent()."switch(\$item){".$this->indent('+')."case NULL:".$this->indent('+');
		//返回部分
		if($node->mod==''){
			print_r($node);
			exit('Error, mod is required');
		}
		$this->strMenu.=call_user_func($node->mod.'MenuDecode',$this,$node->value);
		$this->strMenu.="break;".$this->indent('-');
		//子树部分
		if(isset($node->children)&&is_object($node->children->node)){
			foreach($node->children->node as $value){
				$this->strMenu.="case '".$value->attributes()->index."':".$this->indent('+');
				$this->nodeDecode($value);
				$this->strMenu.="break;".$this->indent('-').$this->indent();
			}
		}else if(isset($node->children)){
			$value=$node->children->node;
			$this->strMenu.="case '".$value->attributes()->index."':".$this->indent('+');
			$this->nodeDecode($value);
			$this->strMenu.="break;".$this->indent('-').$this->indent();
		}
		$this->strMenu.="default:\$user->rapidReply(\$lang_menu['error']);".$this->indent('-');
		$this->strMenu.='}'.$this->indent();
	}
	
	private function saveCode($code){
		$text='<?php /*'.$code.'*/ ?>';
		file_put_contents('menu/origin_code.php',$text);
	}
	
	public function loadCode(){
		$text=file_get_contents('menu/origin_code.php');
		$text=substr($text,8,-5);
		return $text;
	}
	
	public function indent($change=NULL){
		//插入缩进
		
		//缩进状态变化
		if($change==='+') $this->indentState++;
		else if($change==='-') $this->indentState--;
		if($this->indentState<0) $this->indentState=0;
		
		//构造缩进字符串
		$ret="\n";
		for($i=0;$i<$this->indentState;$i++){
			$ret.=$this->indent;
		}
		return $ret;
	}
}
?>