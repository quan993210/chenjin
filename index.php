<?php
/**
 * Created by PhpStorm.
 * User: xkq
 * Date: 2017/8/9 0009
 * Time: 22:22
 */
include_once("inc/init.php");

global $db;
//cookie记录邀请人id
if(isset($_GET['openid']) && !empty($_GET['openid'])){
    setcookie("p_openid",$_GET['openid']);
}

$code = getCode();
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
    $openid = $userInfo['openid'];
//存在邀请人id记录邀请关系并增加邀请人领取宝宝币次数
    if(isset($_COOKIE['p_openid']) && !empty($_COOKIE['p_openid'])){
        $p_openid = $_COOKIE['p_openid'];
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
            print_r($openid);
            print_r($sql);
            $db->query($sql);
            exit;
        }
        setcookie("p_openid",'');
    }
    href_locate('main.php?action=index');
}



/**
 * @explain
 * 获取code,用于获取openid和access_token
 * @remark
 * code只能使用一次，当获取到之后code失效,再次获取需要重新进入
 * 不会弹出授权页面，适用于关注公众号后自定义菜单跳转等，如果不关注，那么只能获取openid
 **/
function getCode(){
    $APPID = APPID;
    $APPSECRET = APPSECRET;
    $INDEX_URL = INDEX_URL;
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
    $APPID = APPID;
    $APPSECRET = APPSECRET;
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
    $APPID = APPID;
    $APPSECRET = APPSECRET;
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
