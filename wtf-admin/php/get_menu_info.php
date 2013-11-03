<?php
require_once 'linkDB.php';

$btn = $_POST["btn"];

$sql = mysql_query("SELECT * FROM button WHERE button = '$btn'");
if($button_attr = mysql_fetch_array($sql)){
	$type = $button_attr["type"]; 
	$content = $button_attr["content"]; 
	if($type == 'text'){
		$temp_array = array($type,$content);
	}else if($type == 'news'){
		eval('$msg_array = array('.$content.');');
		$temp_array = array($type,$msg_array);
	}
	echo json_encode($temp_array);
}else{
	echo 2;
}
?>