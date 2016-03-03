<?php 
function menuMain($user){
	include WX_ROOT.'lang/lang_menu.php';
	$item=$user->menu->out();
	switch($item){
		case NULL:
			$user->rapidReply('查询菜单(输入相应数字以继续):
1.校园专区
2.校车班次
3.图书馆\空教室
4.常用校内电话\网站
5.天气\翻译
6.抢票\报名通道
7.显示功能介绍
8.给我们留言');
			break;
		case '0':
			$item=$user->menu->out();
			switch($item){
				case NULL:
					$user->rapidReply('这里是..?说不定是bug呢');
					break;
				case '1':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->rapidReply('目前尚未有信息发布');
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '2':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->rapidReply('目前尚未有信息发布');
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '3':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->userIO->outputMsgType='news';
							$user->userIO->outputData['articleCount']=3;
							$user->userIO->outputData['article1']['title']='『华理热点』我校大学生合唱团首次参演全国大艺展获声乐类全国二等奖';
							$user->userIO->outputData['article1']['description']='点击查看详细内容';
							$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsEp9UFzQ6AWlbBHHrhKl6ykfib5TAg61RXmc4NTmU0iaylet1L1FflibdM6eg7RvEItGdqy3wOPEwiaUQ/0';
							$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200917448&idx=1&sn=96d68e0dd0ab1359b060167fd8818465#rd';
							$user->userIO->outputData['article2']['title']='我校艺术教育论文首获大艺展高校艺术教育科研论文一等奖';
							$user->userIO->outputData['article2']['description']='点击查看详细内容';
							$user->userIO->outputData['article2']['picUrl']='';
							$user->userIO->outputData['article2']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200917448&idx=2&sn=de05e0731d3ec69fd7a2272b9be34da6#rd';
							$user->userIO->outputData['article3']['title']='我校参加上海青年绿色低碳志愿公益主题活动启动仪式';
							$user->userIO->outputData['article3']['description']='点击查看详细内容';
							$user->userIO->outputData['article3']['picUrl']='';
							$user->userIO->outputData['article3']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200917448&idx=3&sn=5bb6774353bc78ec6aa729c6c9f7ffab#rd';
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '4':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->userIO->outputMsgType='news';
							$user->userIO->outputData['articleCount']=4;
							$user->userIO->outputData['article1']['title']='新生常见问题Q&A——生活篇';
							$user->userIO->outputData['article1']['description']='点击查看详细内容';
							$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsHptyPIRUAdwaUqDCX6bLd2W1lvrMPT36jxNj3JiccPHeozncKO6vP1x5YSxOv7IA3gmx3GsgWCm6A/0';
							$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200920118&idx=1&sn=966b21a6f7e36ab5740a870f48aa76bf#rd';
							$user->userIO->outputData['article2']['title']='新生常见问题Q&A——学习篇';
							$user->userIO->outputData['article2']['description']='点击查看详细内容';
							$user->userIO->outputData['article2']['picUrl']='';
							$user->userIO->outputData['article2']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200920118&idx=2&sn=ee944870092cbb50fb04ed72ffb5790e#rd';
							$user->userIO->outputData['article3']['title']='新生常见问题Q&A——交通篇';
							$user->userIO->outputData['article3']['description']='点击查看详细内容';
							$user->userIO->outputData['article3']['picUrl']='';
							$user->userIO->outputData['article3']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200920118&idx=3&sn=f3ee181da3bcc0115511dd153d7d401d#rd';
							$user->userIO->outputData['article4']['title']='新生常见问题Q&A——军训篇';
							$user->userIO->outputData['article4']['description']='点击查看详细内容';
							$user->userIO->outputData['article4']['picUrl']='';
							$user->userIO->outputData['article4']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200920118&idx=4&sn=bf5f00fcfc8fbdd01f2a19f274537f53#rd';
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '5':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->rapidReply('点击链接进入微社区
http://m.wsq.qq.com/262050237');
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '6':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->userIO->outputMsgType='news';
							$user->userIO->outputData['articleCount']=4;
							$user->userIO->outputData['article1']['title']='图书馆开放时间';
							$user->userIO->outputData['article1']['description']='点击查看详细内容';
							$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsHqQibkClznvibcYOWmyDORZ0nyRdXxbxSv8Eic8ibS9A6EyMsmMlbfP8ib9vaYPbC0vic718WvsxElIOJg/0';
							$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200846840&idx=1&sn=246e9a4b63873dcc3739a304ddab1405#rd';
							$user->userIO->outputData['article2']['title']='书目查询';
							$user->userIO->outputData['article2']['description']='点击查看详细内容';
							$user->userIO->outputData['article2']['picUrl']='';
							$user->userIO->outputData['article2']['url']='http://202.120.96.42:8081/webpac/';
							$user->userIO->outputData['article3']['title']='徐汇图书馆空座查询';
							$user->userIO->outputData['article3']['description']='点击查看详细内容';
							$user->userIO->outputData['article3']['picUrl']='';
							$user->userIO->outputData['article3']['url']='http://lib.ecust.edu.cn:8081/Webgate/GateXH.aspx';
							$user->userIO->outputData['article4']['title']='奉贤图书馆空座查询';
							$user->userIO->outputData['article4']['description']='点击查看详细内容';
							$user->userIO->outputData['article4']['picUrl']='';
							$user->userIO->outputData['article4']['url']='http://lib.ecust.edu.cn:8081/gateseat/lrp.aspx';
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				default:$user->rapidReply($lang_menu['error']);
			}
			break;
		
		case '1':
			$item=$user->menu->out();
			switch($item){
				case NULL:
					$user->rapidReply('欢迎来到华理！小花梨是一个华理学生自己的信息服务平台，你可以从这上面看到许多华理的实时信息。看看你有什么需要的吧:(输入相应数字以继续)
11.【校园生活信息】
12.【建筑相关信息】
13.【校园地图】
14.【校级学生组织信息】
15.【社团信息】
16.【教室借用及活动审批流程】
17.【失物寻回方式一览】
18.【常用校内电话/网站】
19.【本学期校历】');
					break;
				case '1':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->rapidReply('您想查看哪方面的校园生活信息呢？:(输入相应数字以继续)
111.学生公寓
112.食堂
113.商业街
114.学习');
							break;
						case '1':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='学生公寓信息';
									$user->userIO->outputData['article1']['description']='附：公共浴室信息';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6ian9hQnicVUAwwibgGRGCHQsVwPTb0E30QNZvspQEfuSz48RtQjFASLa2g/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000093&itemidx=1&sign=f0cc65eacbdc16e2f07f9c1f6213682e#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '2':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='食堂信息';
									$user->userIO->outputData['article1']['description']='你不知道的食堂文化';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6ian9hQnicVUAwwibgGRGCHQsVwPTb0E30QNZvspQEfuSz48RtQjFASLa2g/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=10000095&idx=1&sn=672d49552b8adbb4725a0b673b399521#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '3':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='商业街信息';
									$user->userIO->outputData['article1']['description']='商业街信息';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6ian9hQnicVUAwwibgGRGCHQsVwPTb0E30QNZvspQEfuSz48RtQjFASLa2g/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000097&itemidx=1&sign=1c7ffcb5063c8563745cdc517729ba2e#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '4':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='学习信息';
									$user->userIO->outputData['article1']['description']='跟学习有关的一些信息';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6ian9hQnicVUAwwibgGRGCHQsVwPTb0E30QNZvspQEfuSz48RtQjFASLa2g/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000166&itemidx=1&sign=b6795134ecaf5bef81c594e422c9887c#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '2':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->rapidReply('您想查看哪些建筑的相关信息呢？:(输入相应数字以继续)
121.主教学楼
122.信息楼
123.大学生活动中心
124.图书馆
125.实验楼
126.校医院');
							break;
						case '1':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='主教学楼简介';
									$user->userIO->outputData['article1']['description']='主教学楼的相关介绍';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6iaib1qQG2oS4SGHDEDhNGI84OicG4MglXJEveaPeDNibzZU8qrDBRJFsZ7A/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000099&itemidx=1&sign=550e4043ab87e91f67dc7bf3c7be321e#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '2':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='信息楼简介';
									$user->userIO->outputData['article1']['description']='信息楼简介';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6iaib1qQG2oS4SGHDEDhNGI84OicG4MglXJEveaPeDNibzZU8qrDBRJFsZ7A/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=10000101&idx=1&sn=d1aae730023826bdec8c26f4ab8cbda1#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '3':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='大学生活动中心简介';
									$user->userIO->outputData['article1']['description']='大学生活动中心简介';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6iaib1qQG2oS4SGHDEDhNGI84OicG4MglXJEveaPeDNibzZU8qrDBRJFsZ7A/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000107&itemidx=1&sign=8b7746eef34935839f13ab42e92c4409#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '4':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='图书馆简介';
									$user->userIO->outputData['article1']['description']='图书馆中心简介';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6iaib1qQG2oS4SGHDEDhNGI84OicG4MglXJEveaPeDNibzZU8qrDBRJFsZ7A/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000109&itemidx=1&sign=e0cc865dfe1674ded7259a453cd9efef#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '5':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='实验楼简介';
									$user->userIO->outputData['article1']['description']='实验楼简介';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6iaib1qQG2oS4SGHDEDhNGI84OicG4MglXJEveaPeDNibzZU8qrDBRJFsZ7A/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000111&itemidx=1&sign=b79a4711519a153425a19c18a8a55576#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '6':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='校医院简介';
									$user->userIO->outputData['article1']['description']='值班时间  住院须知';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6iaib1qQG2oS4SGHDEDhNGI84OicG4MglXJEveaPeDNibzZU8qrDBRJFsZ7A/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000179&itemidx=1&sign=39818e7cb246dd3221b5883c32cc2caf#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '3':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->userIO->outputMsgType='news';
							$user->userIO->outputData['articleCount']=3;
							$user->userIO->outputData['article1']['title']='奉贤校区地图';
							$user->userIO->outputData['article1']['description']='点击“查看全文”获得全新华理电子版地图';
							$user->userIO->outputData['article1']['picUrl']='';
							$user->userIO->outputData['article1']['url']='http://xiaoban.ecust.edu.cn/picture/article/5/ec/cd/c8bb514b45509ddd441e926e77f8/2969f7db-e6de-461d-9fc6-9e6b307b8d96.jpg';
							$user->userIO->outputData['article2']['title']='徐汇校区地图';
							$user->userIO->outputData['article2']['description']='点击“查看全文”获得全新华理电子版地图';
							$user->userIO->outputData['article2']['picUrl']='';
							$user->userIO->outputData['article2']['url']='http://xiaoban.ecust.edu.cn/picture/article/5/ec/cd/c8bb514b45509ddd441e926e77f8/e5966dd0-cba6-4ada-8bf7-edaa2d8f1bc5.jpg';
							$user->userIO->outputData['article3']['title']='金山科技园地图';
							$user->userIO->outputData['article3']['description']='点击“查看全文”获得全新华理电子版地图';
							$user->userIO->outputData['article3']['picUrl']='';
							$user->userIO->outputData['article3']['url']='http://xiaoban.ecust.edu.cn/picture/article/5/ec/cd/c8bb514b45509ddd441e926e77f8/90f4aecb-f896-4a29-8b7b-0552483d8158.jpg';
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '4':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->rapidReply('我们学校有许多学生组织，你想了解哪个呢？:(输入相应数字以继续)
141.【“青春华理”媒体中心】
142.【学生会】
143.【学代会常委会】
144.【社团联合会】
145.【青年志愿者协会】');
							break;
						case '1':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=7;
									$user->userIO->outputData['article1']['title']='"青春华理"媒体中心';
									$user->userIO->outputData['article1']['description']='"青春华理"媒体中心';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsGn5OZX1tdeUPpC9kcfnkI3h8xSu3MWV6wMf9dc94D0Jlu1iaGlyWK40U1s2uqic29xUoXO2D32HoHA/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200810428&idx=1&sn=dc2cf84361383eecee0a250b43862787#rd';
									$user->userIO->outputData['article2']['title']='策划部';
									$user->userIO->outputData['article2']['description']='青春华理”媒体中心';
									$user->userIO->outputData['article2']['picUrl']='';
									$user->userIO->outputData['article2']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200810428&idx=2&sn=961d2c9687ac152d70f100bd4d97804c#rd';
									$user->userIO->outputData['article3']['title']='新媒体部';
									$user->userIO->outputData['article3']['description']='青春华理”媒体中心';
									$user->userIO->outputData['article3']['picUrl']='';
									$user->userIO->outputData['article3']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200810428&idx=3&sn=cc7944e360b85670e50ffea2a1c939b3#rd';
									$user->userIO->outputData['article4']['title']='网络媒体部';
									$user->userIO->outputData['article4']['description']='青春华理”媒体中心';
									$user->userIO->outputData['article4']['picUrl']='';
									$user->userIO->outputData['article4']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200810428&idx=4&sn=e9cdf9e37c977c5ad36b6bce1d25570e#rd';
									$user->userIO->outputData['article5']['title']='调研部';
									$user->userIO->outputData['article5']['description']='青春华理”媒体中心';
									$user->userIO->outputData['article5']['picUrl']='';
									$user->userIO->outputData['article5']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200810428&idx=5&sn=7757ffab7fb1c7fcc7af7b5fd42b46ba#rd';
									$user->userIO->outputData['article6']['title']='记者团';
									$user->userIO->outputData['article6']['description']='青春华理”媒体中心';
									$user->userIO->outputData['article6']['picUrl']='';
									$user->userIO->outputData['article6']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200810428&idx=6&sn=0c20234e836777adde14c5c31def77e8#rd';
									$user->userIO->outputData['article7']['title']='《华东理工青年》编辑部';
									$user->userIO->outputData['article7']['description']='青春华理”媒体中心';
									$user->userIO->outputData['article7']['picUrl']='';
									$user->userIO->outputData['article7']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200810428&idx=7&sn=77b1b4830ec4189eeef1b44993b4a913#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '2':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=8;
									$user->userIO->outputData['article1']['title']='学生会';
									$user->userIO->outputData['article1']['description']='学生会';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsEQz9ycTIKmQLR9pNreDA4eYTXxyPIt3JLxKCVn9DFEFVJzvwA5Hz6zNic01OmNSlUphoIhxLgD3JQ/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200786452&idx=1&sn=95d1978ca25d08a1fac2e99e91d80b0a#rd';
									$user->userIO->outputData['article2']['title']='办公室';
									$user->userIO->outputData['article2']['description']='学生会';
									$user->userIO->outputData['article2']['picUrl']='';
									$user->userIO->outputData['article2']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200786452&idx=2&sn=7c4e84362be05fdab3099db2d84f84f7#rd';
									$user->userIO->outputData['article3']['title']='公关中心';
									$user->userIO->outputData['article3']['description']='学生会';
									$user->userIO->outputData['article3']['picUrl']='';
									$user->userIO->outputData['article3']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200786452&idx=3&sn=f28a81bfa91391c28d6b4eecf578f071#rd';
									$user->userIO->outputData['article4']['title']='科创中心';
									$user->userIO->outputData['article4']['description']='学生会';
									$user->userIO->outputData['article4']['picUrl']='';
									$user->userIO->outputData['article4']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200786452&idx=4&sn=be272f10be9b3449b4065bffaa4c810b#rd';
									$user->userIO->outputData['article5']['title']='实践中心';
									$user->userIO->outputData['article5']['description']='学生会';
									$user->userIO->outputData['article5']['picUrl']='';
									$user->userIO->outputData['article5']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200786452&idx=5&sn=f63fea24a5b9bfd4055167798a2d91ff#rd';
									$user->userIO->outputData['article6']['title']='体育中心';
									$user->userIO->outputData['article6']['description']='学生会';
									$user->userIO->outputData['article6']['picUrl']='';
									$user->userIO->outputData['article6']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200786452&idx=6&sn=d8b9a4d6ece921843fa0614c01906c20#rd';
									$user->userIO->outputData['article7']['title']='文艺中心';
									$user->userIO->outputData['article7']['description']='学生会';
									$user->userIO->outputData['article7']['picUrl']='';
									$user->userIO->outputData['article7']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200786452&idx=7&sn=78028e4a187fab0394e20e6cd9b9b293#rd';
									$user->userIO->outputData['article8']['title']='信传中心';
									$user->userIO->outputData['article8']['description']='学生会';
									$user->userIO->outputData['article8']['picUrl']='';
									$user->userIO->outputData['article8']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200786452&idx=8&sn=a1399b8d0ebd14e076b914d7a6669731#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '3':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=5;
									$user->userIO->outputData['article1']['title']='学代会常委会';
									$user->userIO->outputData['article1']['description']='学代会常委会';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsGDmTXs4Me9LlBId7VibXtxWTOC3J9HZfwtTI6LO6qoicO3dn0k3Czmufe1RgHKSrvE2d7sznyAib7Xw/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200763161&idx=1&sn=bf64a12f74c0b541be00517343509262#rd';
									$user->userIO->outputData['article2']['title']='办公室';
									$user->userIO->outputData['article2']['description']='学代会常委会';
									$user->userIO->outputData['article2']['picUrl']='';
									$user->userIO->outputData['article2']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200763161&idx=2&sn=fb88baee3ab83dbdfde12efff18ff9b2#rd';
									$user->userIO->outputData['article3']['title']='绩效评定委员会';
									$user->userIO->outputData['article3']['description']='学代会常委会';
									$user->userIO->outputData['article3']['picUrl']='';
									$user->userIO->outputData['article3']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200763161&idx=3&sn=20122024fda23ae1c51eefdc91964b84#rd';
									$user->userIO->outputData['article4']['title']='专题实践委员会';
									$user->userIO->outputData['article4']['description']='学代会常委会';
									$user->userIO->outputData['article4']['picUrl']='';
									$user->userIO->outputData['article4']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200763161&idx=4&sn=0428663d46ed87e42d0ceb57e36e1c6e#rd';
									$user->userIO->outputData['article5']['title']='学生自治管理委员会';
									$user->userIO->outputData['article5']['description']='学代会常委会';
									$user->userIO->outputData['article5']['picUrl']='';
									$user->userIO->outputData['article5']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200763161&idx=5&sn=5096ef432a1d30ed8abd7bd7898697f0#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '4':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=6;
									$user->userIO->outputData['article1']['title']='社团联合会';
									$user->userIO->outputData['article1']['description']='社团联合会';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFjvP3EN1UnQCEOGiaq2WVkGqicaJDkjcBQZUCX9FJc4nIibOibzAhibQeicQYEUR1axwsdUWkP3p6KKia6A/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200762151&idx=1&sn=f8a25f4125867cf9aa85f5a79e508b70#rd';
									$user->userIO->outputData['article2']['title']='办公室';
									$user->userIO->outputData['article2']['description']='社团联合会';
									$user->userIO->outputData['article2']['picUrl']='';
									$user->userIO->outputData['article2']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200762151&idx=2&sn=4a91ba62a2c2e2f679963cf22e0bb65e#rd';
									$user->userIO->outputData['article3']['title']='财务管理中心';
									$user->userIO->outputData['article3']['description']='社团联合会';
									$user->userIO->outputData['article3']['picUrl']='';
									$user->userIO->outputData['article3']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200762151&idx=3&sn=a52627da6c13d41cab2c61fea88d25df#rd';
									$user->userIO->outputData['article4']['title']='人力资源中心';
									$user->userIO->outputData['article4']['description']='社团联合会';
									$user->userIO->outputData['article4']['picUrl']='';
									$user->userIO->outputData['article4']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200762151&idx=4&sn=852a41ece90025867108fe046b68bde7#rd';
									$user->userIO->outputData['article5']['title']='对外联络中心';
									$user->userIO->outputData['article5']['description']='社团联合会';
									$user->userIO->outputData['article5']['picUrl']='';
									$user->userIO->outputData['article5']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200762151&idx=5&sn=a646e501a7dd69e4df2c15f5a992a1ff#rd';
									$user->userIO->outputData['article6']['title']='信息宣传中心';
									$user->userIO->outputData['article6']['description']='社团联合会';
									$user->userIO->outputData['article6']['picUrl']='';
									$user->userIO->outputData['article6']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200762151&idx=6&sn=b02b32e4899135099cd6aeb62c1b4c5e#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '5':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=5;
									$user->userIO->outputData['article1']['title']='青年志愿者协会';
									$user->userIO->outputData['article1']['description']='青年志愿者协会';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFjvP3EN1UnQCEOGiaq2WVkG3MT6XCEluOhGvylQkvBGz4QwJ4MMU1jFCIwZc4vZGNf9b1PWUs6hyw/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200761788&idx=1&sn=a923042ed7dcf86c50f962eec08b1bc1#rd';
									$user->userIO->outputData['article2']['title']='办公室';
									$user->userIO->outputData['article2']['description']='青年志愿者协会';
									$user->userIO->outputData['article2']['picUrl']='';
									$user->userIO->outputData['article2']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200761788&idx=2&sn=98c5033e158141c187a692fb5c431214#rd';
									$user->userIO->outputData['article3']['title']='活动企划中心';
									$user->userIO->outputData['article3']['description']='青年志愿者协会';
									$user->userIO->outputData['article3']['picUrl']='';
									$user->userIO->outputData['article3']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200761788&idx=3&sn=124ff3d2c4c33168ad8e390861980ba3#rd';
									$user->userIO->outputData['article4']['title']='网络媒体中心';
									$user->userIO->outputData['article4']['description']='青年志愿者协会';
									$user->userIO->outputData['article4']['picUrl']='';
									$user->userIO->outputData['article4']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200761788&idx=4&sn=151461d4d66143e067cab871755f4485#rd';
									$user->userIO->outputData['article5']['title']='项目运营中心';
									$user->userIO->outputData['article5']['description']='青年志愿者协会';
									$user->userIO->outputData['article5']['picUrl']='';
									$user->userIO->outputData['article5']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200761788&idx=5&sn=61b4b7a0cd228fed3150d31beba70d71#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '5':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->rapidReply('社团信息：(输入相应数字以继续)
151.【SO DANCE街舞社】	
152.【微笑益GO】
153.【MBA商务管理协会】
154.【计算机信息交流协会CIC】
155.【清风飞扬】
156.【花艺协会】
157.【纵横协会】
158.【华理吉他社】
159.【Ibounce极限社】
1510.【华理正能量社】
1511.【模拟联合国协会】');
							break;
						case '1':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='SO DANCE街舞社简介';
									$user->userIO->outputData['article1']['description']='SO DANCE街舞社简介';
									$user->userIO->outputData['article1']['picUrl']='	http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsGrgDexDychzNiahJcdgSzLLxJpIyrI0Qg1yAx4icrapnsTGLoRYOKXHyic4iaOIzATI9FNxS5gyXwESA/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200867823&idx=1&sn=ea10464245d29b16937244d48508437d#rd';
									break;
								case '0':
									$item=$user->menu->out();
									switch($item){
										case NULL:
											$user->userIO->outputMsgType='news';
											$user->userIO->outputData['articleCount']=1;
											$user->userIO->outputData['article1']['title']='华理正能量社简介';
											$user->userIO->outputData['article1']['description']='华理正能量社简介';
											$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsEBEuHQLoRDMU1Jvfico7Wq21sic5nXXlmgb7eFdW9JMgsq0JAlT4gcXjSKqMnm9wYgqNTBbOUmRU8w/0';
											$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200870317&idx=1&sn=b38846542d45962ca303c26b74415b63#rd';
											break;
										default:$user->rapidReply($lang_menu['error']);
									}
									break;
								
								case '1':
									$item=$user->menu->out();
									switch($item){
										case NULL:
											$user->userIO->outputMsgType='news';
											$user->userIO->outputData['articleCount']=1;
											$user->userIO->outputData['article1']['title']='模拟联合国协会简介';
											$user->userIO->outputData['article1']['description']='模拟联合国协会简介';
											$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsEBEuHQLoRDMU1Jvfico7Wq2JttARHd0j6mPJCCzrRHrAf8e6DK4Hl226JTZx1ChRWleibibnEGTdM3w/0';
											$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200870357&idx=1&sn=2ba4c00428ccac201503e394cabbc1c4#rd';
											break;
										default:$user->rapidReply($lang_menu['error']);
									}
									break;
								
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '2':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='微笑益GO简介简介';
									$user->userIO->outputData['article1']['description']='微笑益GO简介简介';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsEJ0ROYEjo5h66ibiaewvK2GOemYAjLAM6icXoRsibjfv4ibzLpGIzcqqac0xetNV5icPVA5vS9wCo5nEbQ/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200867411&idx=1&sn=68c168d3d616034386db5f03dc380dc8#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '3':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='MBA商务管理协会简介';
									$user->userIO->outputData['article1']['description']='MBA商务管理协会简介';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsEBEuHQLoRDMU1Jvfico7Wq2m390kTw8vmhwfbWmibXJyRX9tCicxftHcddria9F8eGvia2gZ85aicEDSNA/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200867440&idx=1&sn=31b48db6f7686d701f61c6a900917b3c#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '4':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='计算机信息交流协会CIC简介';
									$user->userIO->outputData['article1']['description']='计算机信息交流协会CIC简介';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsEBEuHQLoRDMU1Jvfico7Wq2ibt5IgA7p0twM4wNicUd1TmCm8xyxH6r57tAmWlOZ0iaSfnbQcB1XpXWA/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200870378&idx=1&sn=c6de695539f71709ae54edb9ea67e058#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '5':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='清风飞扬简介';
									$user->userIO->outputData['article1']['description']='清风飞扬简介';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsEBEuHQLoRDMU1Jvfico7Wq2TaSvczDhXrma9U1uHLBYqfLnXX9tkvQkyicDjvwpZZAATPfwe5zGnAQ/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200867483&idx=1&sn=5042bb466f4dd4685cab727b03e960c0#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '6':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='花艺协会简介';
									$user->userIO->outputData['article1']['description']='花艺协会简介';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsEBEuHQLoRDMU1Jvfico7Wq2WlNmzvibKialRarrYvk3OCzMViaBwAEalIZwjiayCQ3NJJgrmzibW6ZFGtw/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200867855&idx=1&sn=0a23b08c9448a55b8ff1014e9776cc9a#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '7':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='纵横协会简介';
									$user->userIO->outputData['article1']['description']='纵横协会简介';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsEBEuHQLoRDMU1Jvfico7Wq24wJQF0nHDRQd4z6pszKV9FQu7aW3lsuCTKmTPZ01Hjxiaa22rll8ESQ/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200870338&idx=1&sn=78c4a47884622ffbfa491444ed2231d7#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '8':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='华理吉他社简介';
									$user->userIO->outputData['article1']['description']='华理吉他社简介';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsEBEuHQLoRDMU1Jvfico7Wq2gFJoVuNkHkadiaG0du3d9SO9KbcMFxWF52e16owYaFgiaPoqRfyCAVVQ/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200867903&idx=1&sn=7e83d4130ff94cd361e3234ec2e15bf9#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '9':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='Ibounce极限社简介';
									$user->userIO->outputData['article1']['description']='Ibounce极限社简介';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsEBEuHQLoRDMU1Jvfico7Wq2qfoLfB8aOVLpF9P1cq4YoRBro6wOEUtDibEKyWPzNJqKxKpliaUB19oQ/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200867347&idx=1&sn=9bc6995f3ab6f90ded7dce7d90bc13f2#rd';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '6':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->rapidReply('161.七彩亭介绍
162.活动摆摊流程
163.教室借用流程
164.宣传品张贴悬挂审批流程
165.宿舍楼宣传栏传单张贴规则');
							break;
						case '1':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='七彩亭介绍';
									$user->userIO->outputData['article1']['description']='七彩亭介绍';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6ia0bzRib7bZVF3mlz3Af3icLpNOavbSibgzw4UMoy1LAwL90PeBqWudt0fg/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000263&itemidx=1&sign=d3c0f540e49e259a4bcb4adc46210431#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '2':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='活动摆摊流程';
									$user->userIO->outputData['article1']['description']='活动摆摊流程';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6ia17nSCLsC8BicrSaXSqpuUibqpA5JwTYjKhMo9IGLVUstnhLgNLMX2ZHA/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000261&itemidx=1&sign=a3cd0a510363c7b90f789356e883fbda#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '3':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='教室借用流程';
									$user->userIO->outputData['article1']['description']='教室借用流程';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6ia7CNSqaklVzvn7emcSeVOzC80XaOicIrDzZYNibicHcHu5oofowORiaqnRA/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000265&itemidx=1&sign=fcb6383fc556e7c88eb7fb28de46bbbd#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '4':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='宣传品张贴悬挂审批流程';
									$user->userIO->outputData['article1']['description']='宣传品张贴悬挂审批流程';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6iavvFibBn3nKo8QQ6gicLG6cyh5EzEqkRzNLJURdLQ4Yj0WZzcVltAy4bg/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000258&itemidx=1&sign=cf1dd9ad64adb8022005abad2770fa83#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '5':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->userIO->outputMsgType='news';
									$user->userIO->outputData['articleCount']=1;
									$user->userIO->outputData['article1']['title']='宿舍楼宣传栏传单张贴规则';
									$user->userIO->outputData['article1']['description']='宿舍楼宣传栏传单张贴规则';
									$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6ia85P01UV6xD833UMYaT2VPUmAVCjq5xmPtSnpuuvwFSAh7936nib6oUA/0';
									$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000267&itemidx=1&sign=4423a4516335f28ffe6802a0cb21b05d#wechat_redirect';
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '7':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->userIO->outputMsgType='news';
							$user->userIO->outputData['articleCount']=1;
							$user->userIO->outputData['article1']['title']='失物寻回方式一览';
							$user->userIO->outputData['article1']['description']='失物寻回方式一览';
							$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFF5pq4s7fgwu5vdgtclib6iaicVFoibbKIOJdAKb07icCMwECWDbbwJEskk3dLqSib9tMM2xnUH5UONnww/0?tp=webp&wxfrom=5';
							$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/mp/appmsg/show?__biz=MjM5ODcwMDgyMQ==&appmsgid=10000269&itemidx=1&sign=c9a11a6482a54b1e2eff00ee024b4ab6#wechat_redirect';
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '8':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->rapidReply('您要查询电话还是网站？:(输入相应数字以继续)
41.电话
42.网站');
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '9':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->userIO->outputMsgType='news';
							$user->userIO->outputData['articleCount']=2;
							$user->userIO->outputData['article1']['title']='2014年下半年校历';
							$user->userIO->outputData['article1']['description']='';
							$user->userIO->outputData['article1']['picUrl']='';
							$user->userIO->outputData['article1']['url']='http://syl8501632191.gotoip4.com/wx/rp/xiaoli.jpg';
							$user->userIO->outputData['article2']['title']='2015年上半年校历';
							$user->userIO->outputData['article2']['description']='';
							$user->userIO->outputData['article2']['picUrl']='';
							$user->userIO->outputData['article2']['url']='http://jwc.ecust.edu.cn/picture/article/75/28/78/70a28b644b1eb1807334a9ed9403/24533bb7-ab3e-4af8-a76b-d03727db8a00.jpg';
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				default:$user->rapidReply($lang_menu['error']);
			}
			break;
		
		case '2':
			$item=$user->menu->out();
			switch($item){
				case NULL:
					$user->userIO->outputMsgType='news';
					$user->userIO->outputData['articleCount']=3;
					$user->userIO->outputData['article1']['title']='常规学生班车班次（附上下车地点及售退换票方式）';
					$user->userIO->outputData['article1']['description']='点击查看详细内容';
					$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsF9QENGZicSBCoPuMSBI0mSzyCfwyE4XArCzFZarS2Ic2cIcJAB1NdcNY5eDlwlxjDvr6dA5voFic2g/0';
					$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200824818&idx=1&sn=309ac20b9210b2389a6141e62441f6ce#rd';
					$user->userIO->outputData['article2']['title']='常规教职工班车班次';
					$user->userIO->outputData['article2']['description']='点击查看详细内容';
					$user->userIO->outputData['article2']['picUrl']='';
					$user->userIO->outputData['article2']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200824818&idx=2&sn=7d0606f9dc28b2141f6cef880ed6a541#rd';
					$user->userIO->outputData['article3']['title']='寒假校车安排';
					$user->userIO->outputData['article3']['description']='点击查看详细内容';
					$user->userIO->outputData['article3']['picUrl']='';
					$user->userIO->outputData['article3']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200824818&idx=4&sn=e1284dbd79a0186496d51f11fcfcc7c7#rd';
					break;
				default:$user->rapidReply($lang_menu['error']);
			}
			break;
		
		case '3':
			$item=$user->menu->out();
			switch($item){
				case NULL:
					$user->rapidReply('您要查询什么信息呢？:(输入相应数字以继续)
31.图书馆
32.空教室');
					break;
				case '1':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->userIO->outputMsgType='news';
							$user->userIO->outputData['articleCount']=4;
							$user->userIO->outputData['article1']['title']='图书馆开放时间';
							$user->userIO->outputData['article1']['description']='点击查看详细内容';
							$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsHqQibkClznvibcYOWmyDORZ0nyRdXxbxSv8Eic8ibS9A6EyMsmMlbfP8ib9vaYPbC0vic718WvsxElIOJg/0';
							$user->userIO->outputData['article1']['url']='http://mp.weixin.qq.com/s?__biz=MjM5ODcwMDgyMQ==&mid=200846840&idx=1&sn=246e9a4b63873dcc3739a304ddab1405#rd';
							$user->userIO->outputData['article2']['title']='书目查询';
							$user->userIO->outputData['article2']['description']='点击查看详细内容';
							$user->userIO->outputData['article2']['picUrl']='';
							$user->userIO->outputData['article2']['url']='http://202.120.96.42:8081/webpac/';
							$user->userIO->outputData['article3']['title']='徐汇图书馆空座查询';
							$user->userIO->outputData['article3']['description']='点击查看详细内容';
							$user->userIO->outputData['article3']['picUrl']='';
							$user->userIO->outputData['article3']['url']='http://lib.ecust.edu.cn:8081/Webgate/GateXH.aspx';
							$user->userIO->outputData['article4']['title']='奉贤图书馆空座查询';
							$user->userIO->outputData['article4']['description']='点击查看详细内容';
							$user->userIO->outputData['article4']['picUrl']='';
							$user->userIO->outputData['article4']['url']='http://lib.ecust.edu.cn:8081/gateseat/lrp.aspx';
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '2':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->userIO->outputMsgType='news';
							$user->userIO->outputData['articleCount']=3;
							$user->userIO->outputData['article1']['title']='空教室查询系统';
							$user->userIO->outputData['article1']['description']='';
							$user->userIO->outputData['article1']['picUrl']='http://mmbiz.qpic.cn/mmbiz/iavLhlvhwTsFhkBjiaTzciblXSBialhoe04iaT1wyiaWMhziaO6eciaEFO32HnNmYxicB3ZicKw7hHQuqEKBWMpzTO0Tw6Sw/640?tp=webp';
							$user->userIO->outputData['article1']['url']='';
							$user->userIO->outputData['article2']['title']='徐汇校区空教室查询';
							$user->userIO->outputData['article2']['description']='点击查看详细内容';
							$user->userIO->outputData['article2']['picUrl']='';
							$user->userIO->outputData['article2']['url']='http://bbs.ecust.edu.cn/page/WechatXHLSlemUdWueZhdbstwUdhesXa/xhjs.html';
							$user->userIO->outputData['article3']['title']='奉贤校区空教室查询';
							$user->userIO->outputData['article3']['description']='点击查看详细内容';
							$user->userIO->outputData['article3']['picUrl']='';
							$user->userIO->outputData['article3']['url']='http://bbs.ecust.edu.cn/page/WechatXHLSlemUdWueZhdbstwUdhesXa/fxjs.html';
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				default:$user->rapidReply($lang_menu['error']);
			}
			break;
		
		case '4':
			$item=$user->menu->out();
			switch($item){
				case NULL:
					$user->rapidReply('您要查询电话还是网站？:(输入相应数字以继续)
41.电话
42.网站');
					break;
				case '1':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->rapidReply('您要查询什么类型的电话呢？:(输入相应数字以继续)
411:选课及考务电话。
412:教务相关各类电话。
413:生活后勤类电话。');
							break;
						case '1':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									include_once WX_ROOT.'core/base.php';
									include WX_ROOT.'function/Telephone.php';
									$obj=new Telephone;
									$user=$obj->action($user,array("1"));
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '2':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									include_once WX_ROOT.'core/base.php';
									include WX_ROOT.'function/Telephone.php';
									$obj=new Telephone;
									$user=$obj->action($user,array("2"));
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '3':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->rapidReply('您所查询的电话如下:
奉贤校区管委会:33612037
校医院值班电话:33612123
保卫处值班电话:33612041
财务处:33612216
物业报修:33612440
网络报修:33612232
后勤保障处:33612004
宿管办:33612312
送水:33612294
学生班车失物(或紧急事件):64682782/64287377
教职工班车失物:64252424
寝室报修:37524232
食堂一楼投诉，高师傅:18917100145
食堂二、三楼投诉，张主任:13917390030
教室借用登记E135:33612155
教室维修登记A102旁:33612440
多媒体教室中央控制室B105:33612159
奉贤校区1～4号学生公寓门岗:33612061
奉贤校区5～8号学生公寓门岗:33612058
奉贤校区9～12号学生公寓门岗:33612062
奉贤校区13～16号学生公寓门岗:33612056
奉贤校区17～20号学生公寓门岗:33612057');
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '2':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->rapidReply('您要查询哪一类的网站呢？:(输入相应数字以继续)
421.教务类
422.体育类
423.就业类');
							break;
						case '1':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->rapidReply('教务处
http://jwc.ecust.edu.cn
公共查询(课程表及考试表)
http://202.120.108.14/ecustedu/K_StudentQuery/K_Default.aspx
学生选课平台
http://202.120.108.14/ecustedu/StudentDefault.aspx
短学期选课平台
http://202.120.108.14/EcustEdu3thTerm/StudentDefault.aspx
短学期、创新学分查询
http://59.78.108.81/dxq/index.php
学生评教系统
http://202.120.108.13/pingce/');
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '2':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->rapidReply('体育选课
http://59.78.92.38:82/index.html
查询早锻炼
http://59.78.92.38:8888/sportscore/');
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						case '3':
							$item=$user->menu->out();
							switch($item){
								case NULL:
									$user->rapidReply('就业信息网http://career.ecust.edu.cn/  
勤工助学指导中心http://59.78.108.73/qb/');
									break;
								default:$user->rapidReply($lang_menu['error']);
							}
							break;
						
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				default:$user->rapidReply($lang_menu['error']);
			}
			break;
		
		case '5':
			$item=$user->menu->out();
			switch($item){
				case NULL:
					$user->rapidReply('您要查询什么信息呢？:(输入相应数字以继续)
51.天气
52.翻译');
					break;
				case '1':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							$user->rapidReply('★ 奉贤天气
2015-03-07
白天：多云
最高10℃
夜间：阴
最低6℃
气压：1024 hPa
风向：东北风
风力：2级
湿度：62%
降水概率：10%
紫外线强度：中等
日照时数：6小时
日出：06:13
日落：17:56
穿衣指南
天冷穿棉衣外出
保暖打底裤防寒
穿上冬靴出门
穿羊毛衫保暖

03月08日 (周日)
白天：小雨
夜间：小雨
7～11℃
东风微风
');
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '2':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							include_once WX_ROOT.'core/base.php';
							include WX_ROOT.'list/Translate.php';
							$user->data['status']='word';
							if(!isset($user->data['list']['Translate']['stepNum'])){
								$user->data['list']['Translate']['stepNum']='1';
								$user->rapidReply('请输入您要翻译的内容');
							 }else{ 
								switch($user->data['list']['Translate']['stepNum']){ 
									case '1':
										$user->data['list']['Translate']['step1']=$user->userIO->inputData['content'];
										$user->data['list']['Translate']['stepNum']='2';
										$user->data['status']='new';
										$obj=new Translate;
										$user=$obj->action($user,$user->data['list']['Translate']);
										unset($user->data['list']['Translate']);
										break;
									default:$user->rapidReply($lang_list['error']);
								}
							}
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				default:$user->rapidReply($lang_menu['error']);
			}
			break;
		
		case '6':
			$item=$user->menu->out();
			switch($item){
				case NULL:
					$user->rapidReply('回复对应数字进行抢票或报名：
61.心动|冻—毕业季音乐会');
					break;
				case '1':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							include_once WX_ROOT.'core/base.php';
							include WX_ROOT.'list/concert.php';
							$user->data['status']='word';
							if(!isset($user->data['list']['concert']['stepNum'])){
								$user->data['list']['concert']['stepNum']='1';
								$user->rapidReply('生活家之旅:
请输入 学号 姓名每个信息之间空一格，例：10100000 小梨 完成报名。
						');
							 }else{ 
								switch($user->data['list']['concert']['stepNum']){ 
									case '1':
										$user->data['list']['concert']['step1']=$user->userIO->inputData['content'];
										$user->data['list']['concert']['stepNum']='2';
										$user->data['status']='new';
										$obj=new concert;
										$user=$obj->action($user,$user->data['list']['concert']);
										unset($user->data['list']['concert']);
										break;
									default:$user->rapidReply($lang_list['error']);
								}
							}
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				default:$user->rapidReply($lang_menu['error']);
			}
			break;
		
		case '7':
			$item=$user->menu->out();
			switch($item){
				case NULL:
					$user->rapidReply('小花梨是一个由华理学生自主运营的校园信息分享平台，请回复相应数字以获得功能介绍:
71:校园专区
72:校车班次
73:图书馆/天气/翻译/空教室
74:常用电话/网址
75:更新
76:留言');
					break;
				case '1':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							include_once WX_ROOT.'core/base.php';
							include WX_ROOT.'function/Help.php';
							$obj=new Help;
							$user=$obj->action($user,array("校园专区"));
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '2':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							include_once WX_ROOT.'core/base.php';
							include WX_ROOT.'function/Help.php';
							$obj=new Help;
							$user=$obj->action($user,array("校车班次"));
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '3':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							include_once WX_ROOT.'core/base.php';
							include WX_ROOT.'function/Help.php';
							$obj=new Help;
							$user=$obj->action($user,array("图书馆1"));
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '4':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							include_once WX_ROOT.'core/base.php';
							include WX_ROOT.'function/Help.php';
							$obj=new Help;
							$user=$obj->action($user,array("电话"));
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '5':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							include_once WX_ROOT.'core/base.php';
							include WX_ROOT.'function/Help.php';
							$obj=new Help;
							$user=$obj->action($user,array("更新"));
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				case '6':
					$item=$user->menu->out();
					switch($item){
						case NULL:
							include_once WX_ROOT.'core/base.php';
							include WX_ROOT.'function/Help.php';
							$obj=new Help;
							$user=$obj->action($user,array("留言"));
							break;
						default:$user->rapidReply($lang_menu['error']);
					}
					break;
				
				default:$user->rapidReply($lang_menu['error']);
			}
			break;
		
		case '8':
			$item=$user->menu->out();
			switch($item){
				case NULL:
					include_once WX_ROOT.'core/base.php';
					include WX_ROOT.'list/Advice.php';
					$user->data['status']='word';
					if(!isset($user->data['list']['Advice']['stepNum'])){
						$user->data['list']['Advice']['stepNum']='1';
						$user->rapidReply('[爱心]若有问题想咨询小梨或对小梨有任何建议，请回复：留言+您想说的内容。小梨会尽快回复你哒~么么哒！
[爱心]若对华理校园的各个方面有任何意见，请回复：意见+您想说的内容。小梨会通过华理自管与相关职能部门老师取得联系以尽快解决您的困扰！');
					 }else{ 
						switch($user->data['list']['Advice']['stepNum']){ 
							case '1':
								$user->data['list']['Advice']['step1']=$user->userIO->inputData['content'];
								$user->data['list']['Advice']['stepNum']='2';
								$user->data['status']='new';
								$obj=new Advice;
								$user=$obj->action($user,$user->data['list']['Advice']);
								unset($user->data['list']['Advice']);
								break;
							default:$user->rapidReply($lang_list['error']);
						}
					}
					break;
				default:$user->rapidReply($lang_menu['error']);
			}
			break;
		
		default:$user->rapidReply($lang_menu['error']);
	}
	return $user; 
}?>