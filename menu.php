<?php
header("Content-type: text/html; charset=utf-8");
define("ACCESS_TOKEN", "2jvkitO8iT6QKVawVgnDnZLpYrmlcexi1ad6DJHRiGTZGrGHVCSbukDGfxmHwiWlfPey4tzLNLAT6jnHJSgtctrdpKRyhrKs4FmgCYw3PPZfpDrOY57I2qvClCHs51KiYs-Ag6ecmd6rRZ_-mzK19A");

//创建菜单
function createMenu($data){
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".ACCESS_TOKEN);
 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
 curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $tmpInfo = curl_exec($ch);
 if (curl_errno($ch)) {
  return curl_error($ch);
 }
 curl_close($ch);
 return $tmpInfo;
}
//获取菜单
function getMenu(){
 return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".ACCESS_TOKEN);
}
//删除菜单
function deleteMenu(){
 return file_get_contents("https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".ACCESS_TOKEN);
}
 
 
$data = '{
     "button":[
     {
           "name":"百利鑫",
           "sub_button":[
            {
               "type":"click",
               "name":"八面来风",
               "key":"wt1001"
            },
            {
               "type":"click",
               "name":"早参 晚参",
               "key":"wt1002"
            },
            {
               "type":"click",
               "name":"周策略",
               "key":"wt1003"
            },
            {
               "type":"click",
               "name":"两融内参",
               "key":"wt1004"
            },
            {
               "type":"click",
               "name":"期货内参",
               "key":"wt1005"
            }]
       },
      {
           "name":"金融产品",
           "sub_button":[
            {
               "type":"click",
               "name":"货币类",
               "key":"wt2001"
            },
            {
               "type":"click",
               "name":"债券类",
               "key":"wt2002"
            },
            {
               "type":"click",
               "name":"权益类",
               "key":"wt2003"
            },
            {
               "type":"click",
               "name":"海外类",
               "key":"wt2004"
            },
            {
               "type":"click",
               "name":"其它",
               "key":"wt2005"
            }]
       },
      {
           "name":"特别推荐",
           "sub_button":[
            {
               "type":"click",
               "name":"王牌投顾专栏",
               "key":"wt3001"
            },
            {
               "type":"click",
               "name":"热点新闻",
               "key":"wt3002"
            },
            {
               "type":"click",
               "name":"生活百味",
               "key":"wt3003"
            },
            {
               "type":"click",
               "name":"互动抽奖",
               "key":"wt3004"
            },
            {
               "type":"click",
               "name":"给小鑫留言",
               "key":"wt3005"
            }]
       }]
 }';
 

echo createMenu($data);
echo getMenu();
//echo deleteMenu();
?>