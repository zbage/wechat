<?php
session_start();
if(!isset($_SESSION["aid"])){
  echo "<script>window.location.href='./index.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8">
  <title>管理员控制面板</title>
  <script src="./js/jquery.js" type="text/javascript"></script>
  <script src="./js/bootstrap.js" type="text/javascript"></script>
  <script src="./js/pannel.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="./css/layout.css"/>
  <link rel="stylesheet" type="text/css" href="./css/pannel.css"/>
</head>

<body>
  <div id="main">
    <h2>管理员控制面板</h2>
    <div class="pannel_option click" id="menu">
      菜单
    </div>
    <div class="pannel_option click" id="content">
      内容
    </div>
    <div class="pannel_option click" id="message">
      留言
    </div>
  </div>
</body>
</html>
