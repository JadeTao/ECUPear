<?php
//发送POST数据
//post类
class post{
	private $url;//目的地址url
	private $port;//目的端口
	private $path;//目的文件路径
	private $postMode;//数据模式，有数组array和字符串string两种，默认为array
	private $postData;//发送数据，数组型，key为变量名,value为变量
	private $recieveRowData;//返回的原始数据
	private $protocal;///协议，http or https,默认为http
	
	function __construct($url,$path,$protocal='http',$postMode='array',$port=80){
		$this->url=$url;
		$this->path=$path;
		$this->postMode=$postMode;
		$this->protocal=$protocal;
		if(!empty($port)){
			$this->port=$port;
		}else{
			$this->port=$protocal=='https'?443:80;
		}
	}
	
	public function resetPath($path,$protocal='http',$postMode='array',$port=80,$resetData=1){//重新设置目的文件路径，并决定是否清空数据，默认清空
		$this->path=$path;
		$this->port=$port;
		$this->postMode=$postMode;
		$this->protocal=$protocal;
		if($resetData){
			unset($this->postData);
			$this->postData=NULL;
		}
	}
	
	public function setPostData($key,$value){//往数组中加入一个post变量
		$this->postData[$key]=$value;
	}
	
	public function setPostString($string){//设置post的字符串
		$this->postData=$string;
	}
	
	public function send(){//发送数据并返回返回的原始数据
		if(empty($this->url)){//错误判断
			echo "Error(Class Post):URL empty.\n";
			return 0;
		}elseif(empty($this->port)){
			echo "Error(Class Post):PORT empty.\n";
			return 0;
		}elseif(empty($this->path)){
			echo "Error(Class Post):PATH empty.\n";
			return 0;
		}elseif(empty($this->protocal)){
			echo "Error(Class Post):protocal empty.\n";
		}elseif($this->protocal!='http'&&$this->protocal!='https'){
			echo "Error(Class Post):protocal must be http or https.\n";
		}else{//发送开始
			if($this->postMode=='array'){
				foreach($this->postData as $key=>$value)//post数据编码
				$values[]=$key.'='.urlencode($value);
				$dataString=implode("&",$values);
				$result='';
			}elseif($this->postMode=='string'){
				$dataString=$this->postData;
			}
			
			$postValue="POST ".$this->path." HTTP/1.1\r\n";
			$postValue.="Host: ".$this->url."\r\n";
			$postValue.="Referer: http://www.baidu.com/\r\n";
			$postValue.="Content-Type: application/x-www-form-urlencoded\r\n";
			$postValue.="Content-length: ".strlen($dataString)."\r\n";
			$postValue.="Connection: close\r\n\r\n";
			$postValue.=$dataString."\r\n";
			
			if($this->protocal=='http'){
				$url=$this->url;
			}else{
				$url='ssl://'.$this->url;
			}
			$fp=fsockopen($this->url,$this->port);//将返回内容放入$this->recieveRowData中
			fputs($fp,$postValue);
			$result='';
			while(!feof($fp)){
				$result.=fgets($fp,128);
			}
			fclose($fp);
			$this->recieveRowData=$result;
			
			return $result;
		}
	}
}
?>