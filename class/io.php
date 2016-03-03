<?php
//输入输出处理库

class io {//处理输入输出

	private $modeTest=FALSE;//测试模式开关

	public $userName;//用户ID
	public $localName;//公众平台ID
	
	//输入变量
	public $inputCreateTime;//接收时间
	public $inputMsgType;//信息类型
	public $inputData=array();//数组，根据不同的信息类型有不同的形式

	//输出变量
	private $outputCreateTime;//发送时间
	public $outputMsgType;//信息类型
	public $outputData=array();//数组，根据不同的信息类型有不同的形式
		
	function __construct($isTest){//构造函数开始,处理输入信息
		if($isTest===TRUE){
			$this->modeTest=TRUE;
		}else{
			$this->modeTest=FALSE;
		}
		
		$HTTP_RAW_POST_DATA=file_get_contents("php://input");
		if(empty($HTTP_RAW_POST_DATA)){
			exit();
		}
	
		if (!empty($HTTP_RAW_POST_DATA)&&$this->modeTest===FALSE){
			$postStr = $HTTP_RAW_POST_DATA;//获得接收信息
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);//将接收信息转换为一个类
			
			//构造变量
			$this->userName = $postObj->FromUserName;
            $this->localName = $postObj->ToUserName;
			$this->inputMsgType = trim($postObj->MsgType);
            $this->inputCreateTime = trim($postObj->CreateTime);
			
			switch($this->inputMsgType){//构造data数组
				case 'text':
					$this->inputData['msgId']=$postObj->MsgId;
					$this->inputData['content']=trim($postObj->Content);
					break;
				case 'image':
					$this->inputData['msgId']=$postObj->MsgId;
					$this->inputData['picUrl']=trim($postObj->PicUrl);
					break;
				case 'location':
					$this->inputData['msgId']=$postObj->MsgId;
					$this->inputData['loc_X']=$postObj->Location_X;
					$this->inputData['loc_Y']=$postObj->Location_Y;
					$this->inputData['scale']=$postObj->Scale;
					$this->inputData['label']=trim($postObj->Label);
					break;
				case 'link':
					$this->inputData['msgId']=$postObj->MsgId;
					$this->inputData['title']=trim($postObj->Title);
					$this->inputData['description']=trim($postObj->Description);
					$this->inputData['url']=trim($postObj->Url);
					break;
				case 'event':
					$this->inputData['event']=trim($postObj->Event);
					$this->inputData['eventKey']=trim($postObj->EventKey);
					break;
				default:exit('Wrong Incoming MsgType.');
			}
		}elseif($this->modeTest===TRUE){//测试模式
			date_default_timezone_set('Asia/Shanghai'); 
			$this->userName = $_REQUEST['user_name'];
            $this->localName = 'testHost';
			$this->inputMsgType = 'text';
            $this->inputCreateTime = time();
			$this->inputData['msgId']= -1;
			$this->inputData['content']= $_REQUEST['content'];
		}
	}//构造函数结束,输入处理结束
	
	public function outputTest(){//测试输出
		if($this->modeTest===TRUE){
			echo nl2br($this->outputData['content']);
		}
	}
	
	public function output(){//根据输出变量中保存的信息回复
		date_default_timezone_set('Asia/Shanghai'); 
		$this->outputCreateTime = time();
		$return =  "<xml><ToUserName><![CDATA[".$this->userName."]]></ToUserName><FromUserName><![CDATA[".$this->localName."]]></FromUserName><CreateTime>".$this->outputCreateTime."</CreateTime><MsgType><![CDATA[".$this->outputMsgType."]]></MsgType>";
		switch($this->outputMsgType){
			case 'text':
				$return.="<Content><![CDATA[".$this->outputData['content']."]]></Content>";
				break;
			case 'music':
				$return.="<Music>";
				$return.="<Title><![CDATA[".$this->outputData['title']."]]></Title>";
				$return.="<Description><![CDATA[".$this->outputData['description']."]]></Description>";
				$return.="<MusicUrl><![CDATA[".$this->outputData['musicUrl']."]]></MusicUrl>";
				$return.="<HQMusicUrl><![CDATA[".$this->outputData['musicUrlHQ']."]]></HQMusicUrl>";
				$return.="</Music>";
				break;
			case 'news':
				if($this->outputData['articleCount']>10){
					exit('Article Count Overflows.');
				}
				$return.="<ArticleCount>".$this->outputData['articleCount']."</ArticleCount>";
				$return.="<Articles>";
				for($i=1;$i<=$this->outputData['articleCount'];$i++){
					$return.="<item>";
					$return.="<Title><![CDATA[".$this->outputData['article'.$i]['title']."]]></Title>";
					$return.="<Description><![CDATA[".$this->outputData['article'.$i]['description']."]]></Description>";
					$return.="<PicUrl><![CDATA[".$this->outputData['article'.$i]['picUrl']."]]></PicUrl>";
					$return.="<Url><![CDATA[".$this->outputData['article'.$i]['url']."]]></Url>";
					$return.="</item>";
				}
				$return.="</Articles>";
				break;
			default:exit('Wrong Outcoming MsgType.');
		}
		$return.="</xml>";
		echo $return;
		exit;
	}
}
?>