<?php
session_start();
if(!isset($_SESSION["aid"])){
  echo "<script>window.location.href='./index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>管理自定义菜单</title>
  <script src="./js/jquery.js" type="text/javascript"></script>
  <script src="./js/jquery.form.js" type="text/javascript"></script>
  <script src="./js/bootstrap.js" type="text/javascript"></script>
  <script src="./js/menu.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"/>
  <!-- <link rel="stylesheet" type="text/css" href="./css/layout.css"/> -->
  <link rel="stylesheet" type="text/css" href="./css/menu.css"/>
  <script type="text/javascript" src="../ueditor/ueditor.config.js"></script>
  <script type="text/javascript" src="../ueditor/ueditor.all.js"></script>
</head>

<body name="a">
  <div id="main">
    <h2>管理自定义菜单</h2>
    <div id="menu_list">
      <ul id="myTab" class="nav nav-tabs">
        <li class="disabled"><a data-toggle="tab">自定义菜单</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">   百 利 鑫    <b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a href="#dropdown1" onclick="menu_manage('11');" data-toggle="tab">八面来风</a></li>
          <li><a href="#dropdown1" onclick="menu_manage('12');" data-toggle="tab">早参 晚参</a></li>
          <li><a href="#dropdown1" onclick="menu_manage('13');" data-toggle="tab">周策略</a></li>
          <li><a href="#dropdown1" onclick="menu_manage('14');" data-toggle="tab">两融内参</a></li>
          <li><a href="#dropdown1" onclick="menu_manage('15');" data-toggle="tab">期货内参</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">  金融产品 <b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a href="#dropdown1" onclick="menu_manage('21');" data-toggle="tab">货币类</a></li>
          <li><a href="#dropdown1" onclick="menu_manage('22');" data-toggle="tab">债券类</a></li>
          <li><a href="#dropdown1" onclick="menu_manage('23');" data-toggle="tab">权益类</a></li>
          <li><a href="#dropdown1" onclick="menu_manage('24');" data-toggle="tab">海外类</a></li>
          <li><a href="#dropdown1" onclick="menu_manage('25');" data-toggle="tab">其它</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">   特别推荐    <b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a href="#dropdown1" onclick="menu_manage('31');" data-toggle="tab">王牌投顾专栏</a></li>
          <li><a href="#dropdown1" onclick="menu_manage('32');" data-toggle="tab">热点新闻</a></li>
          <li><a href="#dropdown1" onclick="menu_manage('33');" data-toggle="tab">生活百味</a></li>
          <li><a href="#dropdown1" onclick="menu_manage('34');" data-toggle="tab">互动抽奖</a></li>
          <li><a href="#dropdown1" onclick="menu_manage('35');" data-toggle="tab">给小鑫留言</a></li>
          </ul>
        </li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="dropdown1">
          <h2>选择对应的子按钮进行编辑</h2>
          <p>可回复内容为 文字,音乐,图文消息</P>
          <div id="manage_pannel">
            <div id="type_switch" class="btn-group" data-toggle="buttons-radio">
              <button id="text" type="button" class="btn btn-primary">文本</button>
              <button id="news" type="button" class="btn btn-primary">图文</button>
              <button id="music" type="button" class="btn btn-primary disabled">音乐</button>
            </div>
          </div>
          <div id="home" class="content_area" style="display:block;">
            <p>公众平台消息接口为开发者提供与用户进行消息交互的能力。对于成功接入消息接口的公众账号，当用户发消息给公众号，微信公众平台服务器会使用http请求对接入的网址进行消息推送，第三方服务器可通过响应包回复特定结构，从而达到回复消息的目的。</p>
          </div>
          <div id="text-content" class="content_area" name="#">
            <p>文本消息(600字以内)</p>
            <textarea></textarea>
            <button class="btn btn-success" id="submit_text">提交修改</button>
          </div>
          <div id="news-content" class="content_area accordion">
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                  图文消息-1
                </a>
              </div>
              <div id="collapseOne" class="accordion-body collapse in">
                <div class="accordion-inner">
                  <p>标题</p>
                  <input type="text">
                  <p>图片上传</p>
                  <input type="file" class="file">
                  <p>文本描述</p>
                  <textarea></textarea>
                  <p>URL地址:</p>
                  <input type="text"><br />
                  <button class="btn btn-success submit_news">提交修改</button>
                </div>
              </div>
            </div>
          </div>
        </div>
            </div>
    </div>
  </div>
</body>
</html>
