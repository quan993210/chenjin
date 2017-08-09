<?php
/**
 * Created by PhpStorm.
 * User: xkq
 * Date: 2017/8/6 0006
 * Time: 22:16
 */
//http://tongwanjie.famishare.net/ChildrenDay/
set_include_path(dirname(dirname(__FILE__)));
session_start();

global $db;
if(!$_GET['code']){
    $code = getCode();
}else{
    $code = $_GET['code'];
}
$access_token = getOpenId($code);
$userInfo = getUserInfo($access_token);
if ($userInfo) {
    $sql = "SELECT * FROM member WHERE openid = '{$userInfo['openid']}'";
    $member = $db->get_row($sql);
    if($member){
        $nickname    	= $userInfo['nickname'];
        $headimgurl    	= $userInfo['headimgurl'];
        $time = strtotime(date('Y-m-d 00:00:00',time()));
        //最后登录时间小于当天0点时间，可视为当天第一次登录
        if($member['last_time'] < $time){
            $member['receive']       = $member['receive']+1;
        }
        $last_time = time();
        $sql = "UPDATE member SET nickname = '{$nickname}',headimgurl = '{$headimgurl}',receive = '{$member['receive']}',last_time = '{$last_time}' WHERE openid = '{$member['openid']}'";
        $db->query($sql);

    }else{
        $username    	= "wx_".time();
        $nickname    	= $userInfo['nickname'];
        $openid    	= $userInfo['openid'];
        $headimgurl    	= $userInfo['headimgurl'];
        $unionid    	= $userInfo['unionid'];
        $password    	= md5(123456);
        $receive       = 1;
        $ip    	= real_ip();
        $last_time = time();
        $add_time	= now_time();
        $sql = "INSERT INTO member (username, nickname, openid, headimgurl, unionid, password, receive, ip, last_time, add_time) VALUES ('{$username}', '{$nickname}', '{$openid}', '{$headimgurl}', '{$unionid}', '{$password}', '{$receive}', '{$ip}', '{$last_time}','{$add_time}')";
        $db->query($sql);
    }
    setcookie("openid",$userInfo['openid']);
}



/**
 * @explain
 * 获取code,用于获取openid和access_token
 * @remark
 * code只能使用一次，当获取到之后code失效,再次获取需要重新进入
 * 不会弹出授权页面，适用于关注公众号后自定义菜单跳转等，如果不关注，那么只能获取openid
 **/
function getCode(){
    $APPID = 'wx8750e032a5a24386';
    $APPSECRET = 'cd4704397f1e7e16a34f1fb1a302ed24';
    $INDEX_URL = 'http://tongwanjie.famishare.net/ChildrenDay/';
    if (isset($_GET["code"])) {
        return $_GET["code"];
    } else {
        $str = "location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $APPID . "&redirect_uri=" . $INDEX_URL . "&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
        header($str);
        exit;
    }
}

/**
 * @explain
 * 用于获取用户openid
 **/
function getOpenId($code){
    $APPID = 'wx8750e032a5a24386';
    $APPSECRET = 'cd4704397f1e7e16a34f1fb1a302ed24';
    $access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $APPID . "&secret=" . $APPSECRET . "&code=" . $code . "&grant_type=authorization_code";
    $access_token_json = https_request($access_token_url);
    $access_token_array = json_decode($access_token_json, TRUE);
    return $access_token_array;
}

/**
 * @explain
 * 通过code获取用户openid以及用户的微信号信息
 * @return
 * @remark
 * 获取到用户的openid之后可以判断用户是否有数据，可以直接跳过获取access_token,也可以继续获取access_token
 * access_token每日获取次数是有限制的，access_token有时间限制，可以存储到数据库7200s. 7200s后access_token失效
 **/
function getUserInfo($access_token){
    $APPID = 'wx8750e032a5a24386';
    $APPSECRET = 'cd4704397f1e7e16a34f1fb1a302ed24';
    $userinfo_url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token['access_token'] ."&openid=" . $access_token['openid']."&lang=zh_CN";
    $userinfo_json = https_request($userinfo_url);
    $userinfo_array = json_decode($userinfo_json, TRUE);
    return $userinfo_array;
}

/**
 * @explain
 * 发送http请求，并返回数据
 **/
function https_request($url, $data = null)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
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


