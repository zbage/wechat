<?php
require_once './wtf-admin/php/linkDB.php';

$ID = $_GET["id"];
$btn = $ID%100;
$index = floor($ID/100);
$sql = mysql_query("SELECT * FROM button WHERE button = '$btn'");
$btn_info = mysql_fetch_array($sql);
eval('$contents = array('.$btn_info["content"].');');
$content = $contents[$index];
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $content[0];?></title>
	<meta charset="utf8">
</head>
<body style="margin:5%;font-size:40pt;">
	<?php 
	echo '<h1>'.$content[0].'</h1>';
	echo '<img src="'.$content[2].'" style="width:90%;margin:auto"/>';
	echo $content[1];
	?>
</body>
</html>
