<?php
class Help implements iFunc{
	public function action($user,$args){
		$str=$args[0];
		
		switch($str)
		{
			case 'first091283912038':$text='哈喽！终于等来你啦~小花梨是一个华理学生自己的信息服务平台，无论你是新生还是学长学姐，小花梨都会360度无死角地在你的校园生活，学习，工作中提供最贴心的服务和帮助！
回复"菜单"直接打开服务列表开始你的体验吧！记得推荐给身边好友哦！';break;
			//case 'first091283912038':$text='哈喽！小花梨特别开设了万门大学分享会童哲讲座现场互动平台！如需参与现场互动请直接回复你想说的话。';break;
			case '':
			$text='Hey，我是小梨！我可以为你提供以下服务
1.校车班次
2.教职工班车班次
3.图书馆空位情况
4.常用电话
5.更新图书馆空位信息
6.显示功能帮助
7.给我们留言
回复相应的数字就可以使用这项服务了';break;
			
			case '校车':
			$text='校车查询服务中小梨会告诉你该日所有校车班次';break;
	
			case '教职工班车':;
			case '教职工':
			$text='教职工查询服务小梨会告诉你该日所有教职工班车班次';break;
	
			case '图书馆':
			$text='图书馆查询服务中小梨会告诉你图书馆各楼层的空位信息，
不过，如果小梨给你的座位信息不够及时的话，可以回复5来实现实时更新哦。';break;
	
			case '更新':
			$text='更新命令可以更新图书馆空座信息及可用于自习的具体教室信息。该功能需要在回复【3】进行具体的查询后才能生效。回复数字【5】即可更新！';break;
			
			case '留言':
			$text='…………都可以回复【8】给小梨留言哦。';break;
			
			case '电话':
			$text='小梨知道学校很多地方的电话还有常用到的网址（晨跑、选课、课程中心）哦，尽快来问我！回复数字【4】进入查询吧！';break;
	
			case '帮助':
			$text='调用帮助的帮助最没意思了= =
试试别的吧';break;
	
			case '校园专区':
			$text='校园专区中会包含校园生活信息（宿舍、食堂、商业街、学习）、建筑相关信息（主教学楼、信息楼、大活、图书馆、实验楼、校医院）、校园地图、校级学生组织信息、部分社团信息、教室借用及活动审批流程及失物寻回方式等各类信息。回复数字【1】就可以查阅各种资料啦！';break;
			
			case '校车班次':
			$text='校车班次查询服务中小梨会告诉你教职工班车时刻表、学生班车时刻表以及售/退/换票时间。回复数字【2】进入查询吧！';break;
			
			case '图书馆1':
			$text='四项功能具体为：查询图书馆空余座位数量、查询任意城市天气、即时翻译、查询可用于自习的具体教室。回复数字【3】进入查询吧！';break;
	
			default:$text='现在还没有这项帮助哦，或者检查一下是不是哪里打错了?';break;
		}
		
		$user->rapidReply($text);
		return $user;
	}
}
?>