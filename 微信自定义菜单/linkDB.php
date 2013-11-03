<?php
    //php环境编码
    header("Content-Type:text/html;charset=utf-8");

    //链接数据库
    $link = mysql_connect("58.49.94.84","qqhbweixincom","Pszv5vjNA7");
    if(!$link)  
    {  
       echo "mysql connect failed";
    }	

    //设置数据库编码	
    mysql_query("set names utf8");
    
    //选择数据库
    mysql_select_db("qqhbweixincom",$link);                            
?>