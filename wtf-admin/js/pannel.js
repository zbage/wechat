$(document).ready(function(){
	$("#menu").bind("click",function(){
		window.location.href = "./menu.php";
	});
	$("#content").bind("click",function(){
		window.location.href = "./content.php";
	});
	$("#message").bind("click",function(){
		window.location.href = "./message.php";
	});
});