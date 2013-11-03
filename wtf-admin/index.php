<?php
session_start();
if(isset($_SESSION["aid"])){
   echo "<script>window.location.href='./pannel.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>管理员登陆</title>
	<script src="./js/jquery.js" type="text/javascript"></script>
	<script src="./js/bootstrap.js" type="text/javascript"></script>
	<script src="./js/index.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="./css/layout.css"/>
	<link rel="stylesheet" type="text/css" href="./css/index.css"/>
</head>
<body>
  <div class="container">
    <form class="form-signin">
      <h2 class="form-signin-heading">登录后台管理界面</h2>
      <input type="text" id="username" class="input-block-level" placeholder="用户名">
      <input type="password" id="password" name="psw" class="input-block-level" placeholder="密码">
      <button class="btn btn-large btn-primary" type="submit" id="login_submit" href="javascript:void(0);">登录</button>
    </form>
  </div> <!-- /container -->
</body>
</html>
