<?php
/**
 * Created by PhpStorm.
 * User: xkq
 * Date: 2017/8/8 0008
 * Time: 19:56
 */
set_include_path(dirname(dirname(__FILE__)));
include_once("inc/init.php");
if(!$_COOKIE['openid']){
    href_locate('http://tongwanjie.famishare.net/ChildrenDay/');
}
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
    case "receive":
        receive();
        break;
    case "exchangeList":
        exchangeList();
        break;

}

//首页
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
    $smarty->assign('receive',$_GET['receive']);
    $smarty->display('index.html');
}

//礼品列表
function gift_list(){
    global $db, $smarty;
    $sql 		= "SELECT * FROM gift ORDER BY id DESC";
    $gift 		= $db->get_all($sql);
    $smarty->assign('gift', $gift);
    $smarty->assign('signPackage',  $GLOBALS['signPackage']);
    $smarty->display('list.html');
}

//绑定用户手机号码
function update_member(){
    global $db, $smarty;
    $openid = $_POST['openid'];

    $name    	= $_POST['name'];
    $mobile     = $_POST['mobile'];
    $sql = "UPDATE member SET name = '{$name}',mobile = '{$mobile}' WHERE openid = '{$openid}'";
    $db->query($sql);
    //$url_to = "main.php?action=gift_list";
    url_locate('main.php?action=index', '提交成功，您可以领取宝宝币了！');
}

//金币领取
function receive(){
    global $db, $smarty;
    $openid = $_COOKIE['openid'];
    $merchant_id = $_GET['merchant_id'];
    $receive = $_GET['receive'];
    $sql = "SELECT * FROM member WHERE openid = '{$openid}'";
    $mermber 		= $db->get_row($sql);
    $sql 		= "SELECT * FROM merchant WHERE id='{$merchant_id}'";
    $merchant 		= $db->get_row($sql);
    $gold = intval($receive)*intval($merchant['gold']);
    $mermber['gold'] = $mermber['gold'] + $gold;
    $sql = "UPDATE member SET gold = '{$mermber['gold']}',receive = 0 WHERE openid = '{$openid}'";
    $db->query($sql);
    $addtime = now_time();
    $sql = "INSERT INTO receive (openid,nickname,merchant_id,merchant_name,gold,addtime) VALUES ('{$openid}', '{$mermber['nickname']}', '{$merchant['id']}', '{$merchant['name']}',{$gold},'{$addtime}')";
    $db->query($sql);
	echo json_encode($mermber['gold']);
    exit;
    //$smarty->assign('signPackage',  $GLOBALS['signPackage']);
    //url_locate('main.php?action=index&receive=1', '领取成功');
}

function exchange(){
    global $db, $smarty;
    $openid = $_COOKIE['openid'];
    $sql = "SELECT * FROM member WHERE openid = '{$openid}'";
    $member 		= $db->get_row($sql);

    $id = irequest('giftid');
    $sql = "SELECT * FROM gift WHERE id = '{$id}'";
    $gift = $db->get_row($sql);

    if($member['gold'] >= $gift['buy_gold']){
        $smarty->assign('exchange', 1);
        //兑换开始
        if(isset($_GET['doexchange']) && !empty($_GET['doexchange']) && $_GET['doexchange'] == 1){
            $sql = "SELECT * FROM exchange WHERE openid= '{$openid}' and gift_id = '{$id}'";
            $exchange = $db->get_row($sql);
            if($exchange && !empty($exchange)){
                url_locate('main.php?action=index', '您已兑换该礼品，请勿重复兑换！');
                exit;
            }
            $member['gold'] = $member['gold']-$gift['buy_gold'];
            $sql = "UPDATE member SET gold = '{$member['gold']}' WHERE openid = '{$member['openid']}'";
            $db->query($sql);
            // 添加兑换记录
            $addtime = now_time();
            $sql = "INSERT INTO exchange (openid,nickname,merchant_id,merchant_name,gift_id,gift_name,gold,addtime) VALUES ('{$openid}', '{$member['nickname']}', '{$gift['merchant_id']}', '{$gift['merchant_name']}','{$gift['id']}','{$gift['name']}',{$gift['buy_gold']},'{$addtime}')";
            $db->query($sql);
            href_locate('main.php?action=success');
        }
    }

    $smarty->assign('gift', $gift);
    $smarty->assign('signPackage',  $GLOBALS['signPackage']);
    $smarty->display('exchange.html');
}

function exchangeList(){
    global $db, $smarty;
    $openid = $_COOKIE['openid'];
    $sql = "SELECT * FROM exchange WHERE openid = '{$openid}'";
    $exchangeList 		= $db->get_all($sql);
    $smarty->assign('count', count($exchangeList));
    $smarty->assign('exchangeList', $exchangeList);
    $smarty->assign('signPackage',  $GLOBALS['signPackage']);
    $smarty->display('exchangeList.html');
}

//兑换成功
function success(){
    global $db, $smarty;
    $smarty->assign('signPackage',  $GLOBALS['signPackage']);
    $smarty->display('success.html');
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
    $APPID = APPID;
    $APPSECRET = APPSECRET;
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
    $APPID = APPID;
    $APPSECRET = APPSECRET;
    $data = json_decode(file_get_contents("access_token.json"));
    if ($data->expire_time < time()) {
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$APPID&secret=$APPSECRET";
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




