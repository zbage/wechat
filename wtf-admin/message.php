<?php
require_once './php/linkDB.php';
session_start();
if(!isset($_SESSION["aid"])){
  echo "<script>window.location.href='./index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf8">
  <title>管理自定义菜单</title>
  <script src="./js/jquery.js" type="text/javascript"></script>
  <script src="./js/bootstrap.js" type="text/javascript"></script>
  <script src="./js/message.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="./css/layout.css"/>
</head>

<body name="a" style="font-size:15pt;">
  <div id="main">
    <table class="table table-hover table-bordered" id="feedList">
      <thead><tr><td>用户代码</td><td>留言时间</td><td>内容</td></tr></thead>
      <tbody>
<?php 
$sql = mysql_query("SELECT * FROM message ORDER BY ID DESC LIMIT 50");
while($row = mysql_fetch_array($sql)){
  $ID = $row['ID'];
  $content = $row['content'];
  $user = $row['user'];
  $time = $row['time'];
  echo '<tr name="feed'.$ID.'"><td>'.$user."</td><td>".$time.'</td><td>'.$content.'</td></tr>';
}
?>
      </tbody>
    </table>
  </div>

  <!-- Modal -->
  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">回复留言</h3>
    </div>
    <div class="modal-body">
      <p id="msg"></p>
      <p>回复框:</p>
      <textarea style="width:90%;height:200px;margin:auto;"></textarea>
    </div>
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">关闭</button>
      <button class="btn btn-primary" id="send_reply">发送</button>
    </div>
  </div>
</body>
