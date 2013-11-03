<?php
require_once "./linkDB.php";
$content = $_POST["content"];
$user = $_POST["user"];
if(mysql_query("INSERT INTO message (content,user) VALUES ('$content','$user')")){
	echo 1;
}else{
	echo 2;
}
?>