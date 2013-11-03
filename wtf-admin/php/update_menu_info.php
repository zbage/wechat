<?php
require_once 'linkDB.php';
if(isset($_POST["type"])&&isset($_POST["content"])&&isset($_POST["btn"])){
	$btn = $_POST["btn"];
	$type = $_POST["type"];
	$content = $_POST["content"];
	if(mysql_query("UPDATE button SET type = '$type',content = '$content' WHERE button = $btn")){
		echo 1;
	}else{
		echo 2;
	}
}