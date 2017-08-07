<?php

include_once("weixin/com.php");

//获取用户信息
$openid = $_SESSION['openid'];
$sql = "SELECT * FROM " . PREFIX . "member WHERE openid = '{$openid}'";
$member = $db->get_row($sql);
$smarty->assign('member', $member);

//获取礼品信息
$smarty->assign('gift', $gift);

$smarty->display('index.html');
