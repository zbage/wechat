<?php
//$filename = $_FILES["file"]["name"];
//$filename = iconv('utf-8','gb2312',$filename_utf8);
$filename = time().'.jpg';
if((($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg"))&&($_FILES["file"]["size"] < 500000)){
	if ($_FILES["file"]["error"] > 0){
		echo "error";
	}else{
		if(move_uploaded_file($_FILES["file"]["tmp_name"],"../../images/upload/".$filename)){
			echo $filename;
		}else{
			echo "文件无法移动";
		}
	}    
}else{
	echo '上传失败';
}
?>