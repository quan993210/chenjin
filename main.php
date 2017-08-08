<?php
/**
 * Created by PhpStorm.
 * User: xkq
 * Date: 2017/8/8 0008
 * Time: 19:56
 */
set_include_path(dirname(dirname(__FILE__)));
include_once("inc/init.php");
session_start();
$action = crequest("action");
$action = $action == '' ? 'main' : $action;

switch ($action)
{
    case "main":
        main();
        break;
    case "exchange":
        exchange();
        break;
    case "gift_list":
        gift_list();
        break;
}

function main(){
    global $db, $smarty;
//获取用户信息
    $openid = $_COOKIE['openid'];
    $sql = "SELECT * FROM member WHERE openid = '{$openid}'";
    $member = $db->get_row($sql);
    $smarty->assign('member', $member);

//获取礼品信息
    $sql 		= "SELECT * FROM gift ORDER BY id DESC LIMIT 3";
    $gift 		= $db->get_all($sql);
    $smarty->assign('gift', $gift);

//获取商家信息
    $sql 		= "SELECT * FROM merchant ORDER BY rank DESC";
    $merchant 		= $db->get_all($sql);
    $smarty->assign('merchant', $merchant);

    $smarty->display('index.html');
}

function exchange(){
    global $db, $smarty;
    $id = irequest('id');
    $sql = "SELECT * FROM gift WHERE id = '{$id}'";
    $gift = $db->get_row($sql);
    $smarty->assign('gift', $gift);
    $smarty->display('exchange.html');
}

function gift_list(){
    global $db, $smarty;
    $sql 		= "SELECT * FROM gift ORDER BY id DESC";
    $gift 		= $db->get_all($sql);
    $smarty->assign('gift', $gift);;
    $smarty->display('list.html');
}