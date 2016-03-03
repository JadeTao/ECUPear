<?php
//管理面板接口,生成菜单等
define('USER_NAME','admin');//用户名
define('PASSWORD','123456');//密码

if(isset($_POST['user_name'])&&isset($_POST['pswd'])){
	if($_POST['user_name']!=USER_NAME||$_POST['pswd']!=PASSWORD) msg('1001','用户名或密码错误');
}else msg('1002','请输入用户名或密码');

if(!isset($_GET['mod'])) msg('1003','请输入使用模式');
$return=array();
switch($_GET['mod']){
	case 'load_menu':$return=load_menu();break;//载入菜单
	case 'set_menu':$return=set_menu();break;//设置菜单
	default:msg('1004','不存在的使用模式');
}
msg('0001',$return);

function msg($code,$msg){
	//返回数据
	$return['code']=$code;
	$return['msg']=$msg;
	exit(json_encode($return));
}

function set_menu(){
	if(!isset($_POST['data'])) msg('1005','请提供输入数据');
	include_once('core/core.php');
	$tree=new treeMenu($_POST['data']);
	return '修改成功';
}

function load_menu(){
	include_once('core/core.php');
	$tree=new treeMenu(NULL);
	return $tree->loadCode();
}

/*
require('core/core.php');
$json='{"mod":"text","value":"1:hehe","1":{"mod":"list","value":{"0":{"0":"list1","1":"2"},"1":{"1":"问题1","2":"问题2","3":"输入完成"}}},"2":{"mod":"text","value":"123"}}';
$tree=new treeMenu($json);
*/
?>