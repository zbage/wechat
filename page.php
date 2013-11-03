<?php
require_once './wtf-admin/php/linkDB.php';

$ID = $_GET["id"];
$btn = $ID%100;
$index = floor($ID/100);
$sql = mysql_query("SELECT * FROM button WHERE button = '$btn'");
$btn_info = mysql_fetch_array($sql);
eval('$contents = array('.$btn_info["content"].');');
$content = $contents[$index];
$time = $btn_info["time"];
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $content[0];?></title>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<style>
		body{
			background-color: #f7f2ed;
			font-family: "黑体"!important;
		}
		div *{
			font-size: 17px!important;
			TEXT-INDENT: 2em!important;
			line-height: 25px!important;
			text-align: justify!important;
			font-family: "黑体"!important;
		}
		div span{
			background-color:#f7f2ed!important;
		}
		div img{
			margin-left:-2em!important;
			width: 280px!important;
			margin:auto!important;
		}
	</style>
</head>
<body style="margin:5%;">
	<?php 
	echo '<p style="text-align:left;font-size: 22px;font-weight: bold;margin-bottom: 10px;">'.$content[0].'</p>';
	echo '<p style="font-size: 13px;font-weight: bold;color: #aaaaaa;">'.$time.'</p>';
	echo '<img src="'.$content[2].'" style="width: 280px;margin:auto"/>';
	echo '<div>'.$content[1].'</div>';
	?>
</body>
</html>
