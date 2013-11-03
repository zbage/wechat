<?php
/**
  * wechat php test
  */
//link database
require_once "linkDB.php";
//require_once "WTgame.php";
//define your token
define("TOKEN", "flame");
$wechatObj = new wechat();
$wechatObj->responseMsg();
//$wechatObj->valid();

class wechat
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg(){
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $type = $postObj->MsgType;
			$fromUsername = $postObj->FromUserName;
			$toUsername = $postObj->ToUserName;
			$time = time();
			$textTpl = "<xml>
					<ToUserName><![CDATA[%s]]></ToUserName>
					<FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime>
					<MsgType><![CDATA[%s]]></MsgType>
					<Content><![CDATA[%s]]></Content>
					<FuncFlag>0</FuncFlag>
					</xml>";  
			switch($type){
				case 'text': 
					$contentStr = $this->textMsg($postObj);
					break;
				case 'event': 
					echo $this->resEvent($postObj);
					return;
			}
			$msgType = "text";
			$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
			echo $resultStr;	
        }else {
        	echo "";
        	exit;
        }
    }
	private function textMsg($postObj){
		$keyword = trim($postObj->Content);
		/* if (preg_match("/^注册[:：]/u",$keyword)) { //兼容gb2312,utf-8 
			$name = preg_replace("/^注册[:：]/u",'',$keyword);
			if(!preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+/u",$name)){
				return $name.'不符合要求,包含了非法字符!';
			}
			if(utf8_strlen($name)>12||utf8_strlen($name)<3){
				return $name.'注册名长度不符合要求!(3-12)';
			}
			$keyword = "注册";
		} */
		$player = $postObj->FromUserName;           
		switch($keyword){
			case 'hello':
			case '你好':
				$contentStr = '欢迎来到新媒体广告联盟!';
				break;
			case 'help':
			case '帮助':
				$contentStr = '这里是帮助信息';
				break;
			case '随机':
			case 'random':
				$contentStr = rand(0,100);
				break;
			/* case '注册':
				$contentStr = registerGame($player,$name);
				break;
			case '查询属性':
			case '属性':
				$contentStr =  attribute($player);
				break;
			case '战斗':
				$contentStr = fight($player);
				break; */
			default:
				$contentStr = "因为无法匹配,所以我只知道你对我说了".$keyword;
		}
		return $contentStr;
	}
	//按钮回复
	private function resEvent($postObj){
		function menuEvent($key,$from,$to){
			//判断是哪个按钮
			switch($key){
				case 'wt1001':$btn = '11';break;
				case 'wt1002':$btn = '12';break;
				case 'wt1003':$btn = '13';break;
				case 'wt1004':$btn = '14';break;
				case 'wt1005':$btn = '15';break;
				case 'wt2001':$btn = '21';break;
				case 'wt2002':$btn = '22';break;
				case 'wt2003':$btn = '23';break;
				case 'wt2004':$btn = '24';break;
				case 'wt2005':$btn = '25';break;
				case 'wt3001':$btn = '31';break;
				case 'wt3002':$btn = '32';break;
				case 'wt3003':$btn = '33';break;
				case 'wt3004':$btn = '34';break;
				case 'wt3005':$btn = '35';break;
			}
			$sql = mysql_query("SELECT * FROM button WHERE button = '$btn'");
			$button_attr = mysql_fetch_array($sql);
			$type = $button_attr["type"]; 
			$content = $button_attr["content"]; 
			if($type == 'text'){
				if($btn == '35'){
					$content = '给小鑫留言请点击:http://www.qqhbweixin.com/note.php?flag='.$from;
				}
				$str = '<xml>
					<ToUserName><![CDATA['.$from.']]></ToUserName>
					<FromUserName><![CDATA['.$to.']]></FromUserName>
					<CreateTime>'.time().'</CreateTime>
					<MsgType><![CDATA[text]]></MsgType>
					<Content><![CDATA['.$content.']]></Content>
					<FuncFlag>0</FuncFlag>
					</xml>'; 
				return $str;
			}else if($type == 'news'){
				 eval('$msg_array = array('.$content.');');
				 $str = '<xml>
						<ToUserName><![CDATA['.$from.']]></ToUserName>
						<FromUserName><![CDATA['.$to.']]></FromUserName>
						<CreateTime>'.time().'</CreateTime>
						<MsgType><![CDATA[news]]></MsgType>
						<ArticleCount>'.$msg_array[0].'</ArticleCount>
						<Articles>';
				for($i = 1;$i <= $msg_array[0];$i++){
					$str .= '<item>
							 <Title><![CDATA['.$msg_array[$i][0].']]></Title> 
							 <Description><![CDATA['.$msg_array[$i][4].']]></Description>
							 <PicUrl><![CDATA['.$msg_array[$i][2].']]></PicUrl>
							 <Url><![CDATA['.$msg_array[$i][3].']]></Url>
							 </item>';
				}
				$str .= '</Articles></xml>';
				return $str; 
			}
		}
		
		
		$event = $postObj->Event;
		$key = $postObj->EventKey;
		$fromUsername = $postObj->FromUserName;
		$toUsername = $postObj->ToUserName;
		$time = time();
		switch($event){
			case 'subscribe':
				$contentStr = '欢迎订阅新媒体广告联盟!回复:"你好","帮助","随机"查看消息';
				break;
			case 'CLICK':
				$contentStr = menuEvent($key,$fromUsername,$toUsername);
				echo $contentStr;
				return;
		}
		return $contentStr;
		
		
	}
	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];	
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}


?>