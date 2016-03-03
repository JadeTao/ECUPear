<?php
//节点模式
function textMenuDecode($tree,$text){//目标程序功能：回复文字类型:$text
	if(!get_magic_quotes_gpc()){
		addslashes($text);
	}
	$return='$user->rapidReply(\''.$text."');".$tree->indent();
	return $return;
}

function newsMenuDecode($tree,$args){//目标程序功能:回复图文类型
	//$args->article[]为各个新闻的主体，包括title,description,picUrl,url四个属性
	$count=count($args->article);
	$return="\$user->userIO->outputMsgType='news';".$tree->indent();
	$return.="\$user->userIO->outputData['articleCount']=".$count.";".$tree->indent();
	for($i=0;$i<$count;$i++){
		$return.="\$user->userIO->outputData['article".($i+1)."']['title']='".$args->article[$i]->title."';".$tree->indent();
		$return.="\$user->userIO->outputData['article".($i+1)."']['description']='".$args->article[$i]->description."';".$tree->indent();
		$return.="\$user->userIO->outputData['article".($i+1)."']['picUrl']='".$args->article[$i]->pic_url."';".$tree->indent();
		$return.="\$user->userIO->outputData['article".($i+1)."']['url']='".$args->article[$i]->url."';".$tree->indent();
	}
	return $return;
}

function listMenuDecode($tree,$args){
	//目标程序功能:生成一个序列，用户每次回复将往后一步.$args->list_name为序列名,$args->step_num为总步数（从1开始）,$args['step'.n]为每一步的返回
	//用户的所有消息会被放在$user->data['list'][当前序列名]['step'.当前步数]中，当前步数保存在$user->data['list'][当前序列名]['stepNum']中
	//最后一步时，程序会将$user变量送入list/{$args->list_name}.php中的同名+ListMenu函数进行处理(函数需要用户自定义)
	$listName=$args->list_name;
	$listMax=$args->step_num;
	$return='include_once WX_ROOT.\'core/base.php\';'.$tree->indent();
	$return.='include WX_ROOT.\'list/'.$listName.'.php\';'.$tree->indent();
	$return.='$user->data[\'status\']=\'word\';'.$tree->indent();
	$return.='if(!isset($user->data[\'list\'][\''.$listName."']['stepNum'])){".$tree->indent('+');
	$return.='$user->data[\'list\'][\''.$listName."']['stepNum']='1';".$tree->indent();
	if($args->step1->attributes()->is_const=='false'){
		$return.='$user->rapidReply('.$args->step1.");".$tree->indent('-')." }else{ ".$tree->indent('+');
	}else{
		$return.='$user->rapidReply(\''.$args->step1."');".$tree->indent('-')." }else{ ".$tree->indent('+');
	}
	$return.='switch($user->data[\'list\'][\''.$listName."']['stepNum']){ ".$tree->indent('+');
	for($i='1';$i<=$listMax;$i++){
		$return.='case \''.$i.'\':'.$tree->indent('+').'$user->data[\'list\'][\''.$listName.'\'][\'step'.$i.'\']=$user->userIO->inputData[\'content\'];'.$tree->indent();
		if($i!=$listMax){
			if($args->{'step'.($i+1)}->attributes()->is_const=='false'){
				$return.='$user->rapidReply('.$args->{'step'.($i+1)}.');'.$tree->indent();
			}else{
				$return.='$user->rapidReply(\''.$args->{'step'.($i+1)}.'\');'.$tree->indent();
			}
		}
		$return.='$user->data[\'list\'][\''.$listName.'\'][\'stepNum\']=\''.($i+1).'\';'.$tree->indent();
		if($i==$listMax){
			$return.='$user->data[\'status\']=\'new\';'.$tree->indent();
			$return.='$obj=new '.$listName.';'.$tree->indent();
			$return.='$user=$obj->action($user,$user->data[\'list\'][\''.$listName.'\']);'.$tree->indent();
			$return.='unset($user->data[\'list\'][\''.$listName.'\']);'.$tree->indent();
		}
		$return.="break;".$tree->indent('-');
	}
	$return.="default:\$user->rapidReply(\$lang_list['error']);".$tree->indent('-');
	$return.='}'.$tree->indent('-').'}'.$tree->indent();
	
	return $return;
}

function funcMenuDecode($tree,$args){//目标程序功能:运行function/{$args->class_name}.php中的同名类的action函数，参数为$user和$args
	$isFirst=true;
	$return='include_once WX_ROOT.\'core/base.php\';'.$tree->indent();
	$return.='include WX_ROOT.\'function/'.$args->class_name.'.php\';'.$tree->indent();
	$return.='$obj=new '.$args->class_name.';'.$tree->indent();
	$return.='$user=$obj->action($user,array(';
	foreach($args->args as $value){
		if($isFirst){
			$return.='"'.$value.'"';
			$isFirst=false;
		}
		else $return.=',"'.$value.'"';
	}
	$return.='));'.$tree->indent();
	
	return $return;
}

//name:报名授权
//todo:db:用户信息表，项目信息表，用户授权表 
?>