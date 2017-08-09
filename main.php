<?php
/**
 * Created by PhpStorm.
 * User: xkq
 * Date: 2017/8/8 0008
 * Time: 19:56
 */
set_include_path(dirname(dirname(__FILE__)));
include_once("inc/init.php");

$signPackage = GetSignPackage();
$GLOBALS['signPackage'] =$signPackage;
session_start();
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
    $smarty->assign('gift', $gift);
    $smarty->assign('signPackage',  $GLOBALS['signPackage']);
    $smarty->display('list.html');
}

function success(){
    global $db, $smarty;
    $smarty->display('success.html');
}
function update_member(){
    global $db, $smarty;
    $openid = irequest('openid');
    $name    	= crequest('name');
    $mobile = irequest('mobile');
    $sql = "UPDATE member SET name = '{$name}',mobile = '{$mobile}' WHERE openid = '{$openid}'";
    $db->query($sql);
    $url_to = "index.php";
    url_locate($url_to, '添加成功');
}

function httpGet($url) {
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURL_SSLVERSION_SSL, 2);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    $res = curl_exec($curl);
    curl_close($curl);
    return $res;
}

function getSignPackage() {
    $APPID = 'wx8750e032a5a24386';
    $APPSECRET = 'cd4704397f1e7e16a34f1fb1a302ed24';
    $jsapiTicket = getJsApiTicket();
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $timestamp = time();
    $nonceStr = createNonceStr();

    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

    $signature = sha1($string);

    $signPackage = array(
        "appId"     => $APPID,
        "nonceStr"  => $nonceStr,
        "timestamp" => $timestamp,
        "url"       => $url,
        "signature" => $signature,
        "rawString" => $string
    );
    return $signPackage;
}

function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
        $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
}

function getJsApiTicket() {
    // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode(file_get_contents("jsapi_ticket.json"));
    if ($data->expire_time < time()) {
        $accessToken = getAccessToken();
        $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
        $res = json_decode(httpGet($url));
        $ticket = $res->ticket;
        if ($ticket) {
            $data->expire_time = time() + 7000;
            $data->jsapi_ticket = $ticket;
            $fp = fopen("jsapi_ticket.json", "w");
            fwrite($fp, json_encode($data));
            fclose($fp);
        }
    } else {
        $ticket = $data->jsapi_ticket;
    }
    return $ticket;
}

function getAccessToken() {
    $APPID = 'wx8750e032a5a24386';
    $APPSECRET = 'cd4704397f1e7e16a34f1fb1a302ed24';
    $data = json_decode(file_get_contents("access_token.json"));
    if ($data->expire_time < time()) {
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$APPID}&secret={$APPSECRET}";
        $res = json_decode(httpGet($url));
        $access_token = $res->access_token;
        if ($access_token) {
            $data->expire_time = time() + 7000;
            $data->access_token = $access_token;
            $fp = fopen("access_token.json", "w");
            fwrite($fp, json_encode($data));
            fclose($fp);
        }
    } else {
        $access_token = $data->access_token;
    }
    return $access_token;
}




