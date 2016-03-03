<?php session_start() ?>
<html>
<head>
<meta charset="utf-8"  />
</head>
<body>
<?php if(isset($_SESSION['user'])) ?>
<form method="post">
	<p>
		<input type="submit" name="logout" id="submit" value="登出" />
	</p>
</form>
<form method="post">
	<p>
		<input type="submit" name="updateMenu" id="submit" value="更新菜单" />
	</p>
</form>
<?php }else{?>
<form method="post">
  <p>
	<label for="psw">管理员密码</label>
	<input name="psw" type="password" id="psw" />
	<input type="submit" name="login" id="submit" value="登录" />
  </p>
</form>
<?php }?>

<div>
<form method="post">
  <p>
    <label for="text">模拟文字信息</label>
    <input name="content" type="text" id="content" />
  </p>
  <p>
    <label for="user">模拟用户ID</label>
    <input name="user_name" type="text" id="user_name" value="11111111" />
  </p>
  <p>
    <input type="submit" name="submit" id="submit" value="提交" />
  </p>
</form>
</div>
<hr />
<?php
require 'config.php'

if(isset($_POST['submit'])){
	define("IN_INDEX",TRUE);
	if (!defined('WX_ROOT')) {
    	define('WX_ROOT', dirname(__FILE__) . '/');
	}

	require WX_ROOT.'class/dblink.php';
	require WX_ROOT.'class/io.php' ;
	require WX_ROOT.'class/menu.php';
	require WX_ROOT.'class/user.php';
	require WX_ROOT.'lang/lang_index.php';
	
	$userIO=new io(TRUE);//新建用户输入输出类	
	$user=new user($userIO);//新建用户，包含io类和菜单类

	switch($userIO->inputMsgType){//处理输入的类型
		case 'text':include WX_ROOT.'text_index.php';$user=text_index($user);break;
		case 'event':include WX_ROOT.'event_index.php';$user=event_index($user);break;
		default:$user->rapidReply($lang_index['inputTypeWrong']);
	}

	$user->save();

	$user->userIO->outputTest();//返回数据
}

if(isset($_POST['login'])){
	if($_POST['password']==$global_config['Admin']['Password']){
		$_SESSION['user']='admin';
	}
}

if(isset($_POST['logout'])){
	session_destroy();
}

if(isset($_POST['updateMenu'])&&isset($_SESSION['user'])){
	include_once 'class/wechat_messege.php';
	$wechat=new wechatMessege($global_config['Wechat']['AppID'],$global_config['Wechat']['AppSecret']);
	$return=$wechat->createMenu('
	{
		"button": [
			{
				"name": "花梨资讯",
				"sub_button": [
					{
						"type": "click",
						"name": "校园专区",
						"key": "1"
					},
					{
						"type": "click",
						"name": "信息预告",
						"key": "01"
					},
					{
						"type": "view",
						"name": "考务教务",
						"url": "http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200966062&idx=1&sn=55c73928101e2cc97af20bd7d95661cf#rd"
					},
					{
						"type": "click",
						"name": "华理热点",
						"key": "03"
					},
					{
						"type": "click",
						"name": "新生资讯",
						"key": "04"
					}
				]
			},
			{
				"name": "花梨查询",
				"sub_button": [
					{
						"type": "click",
						"name": "图书馆",
						"key": "06"
					},
					{
						"type": "click",
						"name": "空教室",
						"key": "34"
					},
					{
						"type": "click",
						"name": "校车班次",
						"key": "2"
					},
					{
						"type": "click",
						"name": "天气情况",
						"key": "32"
					},
					{
						"type": "click",
						"name": "翻译功能",
						"key": "33"
					}
				]
			},
			{
				"name": "花梨应用",
				"sub_button": [
					{
						"type": "click",
						"name": "留言",
						"key": "8"
					},
					{
						"type": "view",
						"name": "微社区",
						"url": "http://m.wsq.qq.com/262050237"
					},
					{
						"type": "click",
						"name": "投票抢票",
						"key": "6"
					},
					{
						"type": "click",
						"name": "报名通道",
						"key": "6"
					}
				]
			}
		]
	}');
	echo $return;
}
?>
</body>
</html>