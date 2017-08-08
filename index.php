<?php
include_once("inc/init.php");
include_once("weixin/com.php");
$openid = $_COOKIE['openid'];
//用户点击进入是否有人邀请
if(isset($_GET['openid']) && !empty($_GET['openid'])){
    $p_openid = $_GET['openid'];
    $sql = "SELECT * FROM " . PREFIX . "invite WHERE p_openid = '{$p_openid}' and openid = '{$openid}'";
    $invite = $db->get_row($sql);
   if(!$invite){
       $sql = "SELECT * FROM " . PREFIX . "member WHERE openid = '{$p_openid}'";
       $member = $db->get_row($sql);
       $receive       = $member['receive']+1;
       $sql = "UPDATE member SET receive = '{$receive}' WHERE openid = '{$p_openid}'";
       $db->query($sql);
       $sql = "INSERT INTO invite (p_openid,openid,add_time) VALUES ('{$p_openid}', '{$openid}','{$add_time}')";
       $db->query($sql);
   }
}

//include_once("/inc/init.php");
href_locate('main.php??action=main&openid='.$openid);




