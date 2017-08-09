<?php
/**
 * Created by PhpStorm.
 * User: xkq
 * Date: 2017/8/8 0008
 * Time: 19:56
 */
set_include_path(dirname(dirname(__FILE__)));
include_once("inc/init.php");
include_once("weixin/com.php");
$signPackage = GetSignPackage();
$GLOBALS['signPackage'] =$signPackage;
session_start();
$openid = $_COOKIE['openid'];
//用户点击进入是否有人邀请
if(isset($_GET['openid']) && !empty($_GET['openid'])){
    $p_openid = $_GET['openid'];
    $sql = "SELECT * FROM invite WHERE p_openid = '{$p_openid}' and openid = '{$openid}'";
    $invite = $db->get_row($sql);
    if(!$invite){
        $sql = "SELECT * FROM member WHERE openid = '{$p_openid}'";
        $member = $db->get_row($sql);
        $receive       = $member['receive']+1;
        $sql = "UPDATE member SET receive = '{$receive}' WHERE openid = '{$p_openid}'";
        $db->query($sql);
        $add_time	= time();
        $sql = "INSERT INTO invite (p_openid,openid,addtime) VALUES ('{$p_openid}', '{$openid}','{$add_time}')";
        $db->query($sql);
    }
}

$action = crequest("action");
$action = $action == '' ? 'index' : $action;

switch ($action)
{
    case "index":
        index();
        break;
    case "exchange":
        exchange();
        break;
    case "gift_list":
        gift_list();
        break;
    case "success":
        success();
        break;
    case "update_member":
        update_member();
        break;
}

function index(){
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
    $smarty->assign('signPackage',  $GLOBALS['signPackage']);
    $smarty->display('index.html');
}

/*function exchange(){
    global $db, $smarty;
    $id = irequest('id');
    $sql = "SELECT * FROM gift WHERE id = '{$id}'";
    $gift = $db->get_row($sql);
    $smarty->assign('gift', $gift);
    $smarty->display('exchange.html');
}*/

function gift_list(){
    global $db, $smarty;
    $sql 		= "SELECT * FROM gift ORDER BY id DESC";
    $gift 		= $db->get_all($sql);
    $smarty->assign('gift', $gift);
    $smarty->assign('signPackage',  $GLOBALS['signPackage']);
    $smarty->display('list.html');
}

function success(){
    global $db, $smarty;
    $smarty->display('success.html');
}
function update_member(){

}




