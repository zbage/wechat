$(document).ready(function(){
	$("#login_submit").bind("click",function(event){
		event.preventDefault();
		login();
	});
});
function login(){
	var username = $("#username").val().replace(/\s/g, '');
	var password = $("#password").val();
	$.ajax({
		type: "POST",
		url: "./php/login.php",  
		data: "&username="+username+"&password="+password,
		success: 
		function(returnKey){
			if(returnKey == 1){
				window.location.href = './pannel.php';
			}else{
				alert("登录失败");
			}
		}
	});
}