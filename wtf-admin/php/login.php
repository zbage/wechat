<?php
require_once "./linkDB.php";

$username = $_POST["username"];
$password = $_POST["password"];
$is_username = mysql_query("SELECT COUNT(*) FROM admin WHERE username = '$username' LIMIT 1");
$is_username_in = mysql_fetch_array($is_username);
if($is_username_in[0]>0){	
	$key_row = mysql_query("SELECT * FROM admin WHERE username = '$username' LIMIT 1");
	$key = mysql_fetch_array($key_row);
	if($key["password"] == $password){
		//登录成功
		$aid = $key["ID"];
		//此时把$aid保存到session里面作为登录管理员的唯一标识
		session_start();
		$_SESSION["aid"] = $aid;
		echo 1;
	}else{
		echo 2;
	}
}else{
	echo 3;
}
?>