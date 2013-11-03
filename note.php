<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="UTF-8">
<title>留言板</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
<style>
html,body{
	width:100%;!important;
	padding:none!important;
	font-size:10pt;
	
}
#bg{
	height:363px;
	background:url(./images/blue1.png) no-repeat;
}
#u{
	margin:60px 0 50px 60px;
	width:175px;
	height:225px;
	resize:none;
}
button{
	position:absolute;
	width:50px;
	top:295px;
	left:75px;
}
</style>
<script type="text/javascript" src="./wtf-admin/js/jquery.js"></script>
<script src="./wtf-admin/js/bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./wtf-admin/css/bootstrap.min.css"/>
<script type="text/javascript">
	$(document).ready(function(){
		$("button").bind("click",function(){
			var user = "<?php echo $_GET["flag"];?>";
			var content = $("textarea").val();
			$.ajax({
				type:"post",
				url:"./wtf-admin/php/submit_note.php",
				data:"&content="+content+"&user="+user,
				success:
				function(returnKey){
					if(returnKey == 1){
						alert("您已经成功发送留言!");
						$("textarea").val("");
					}else{
						alert("发送失败!请重新尝试.");
					}
				}
			});
		});
	});
</script>
</head>
<body>
	<div id="bg">
		<textarea id="u" rows="10" placeholder="说点什么吧"></textarea>
		<button class="btn btn-primary btn-mini">发送</button>
	</div>
</div> 

</body>
</html>