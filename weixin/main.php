<?php
/**
 * Created by PhpStorm.
 * User: xkq
 * Date: 2017/8/8 0008
 * Time: 19:56
 */
set_include_path(dirname(dirname(__FILE__)));
include_once("/inc/init.php");
session_start();

global $db, $smarty;
//获取用户信息

$sql = "SELECT * FROM " . PREFIX . "member WHERE openid = '{$openid}'";
$member = $db->get_row($sql);
$smarty->assign('member', $member);

//获取礼品信息
$sql 		= "SELECT * FROM " . PREFIX . "gift ORDER BY id DESC LIMIT 3";
$gift 		= $db->get_all($sql);
$smarty->assign('gift', $gift);

//获取商家信息
$sql 		= "SELECT * FROM " . PREFIX . "merchant ORDER BY rank DESC";
$merchant 		= $db->get_all($sql);
$smarty->assign('merchant', $merchant);

$smarty->display('index.html');
