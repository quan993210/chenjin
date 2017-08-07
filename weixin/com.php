<?php
/**
 * Created by PhpStorm.
 * User: xkq
 * Date: 2017/8/6 0006
 * Time: 22:16
 */
//http://tongwanjie.famishare.net/ChildrenDay/
set_include_path(dirname(dirname(__FILE__)));
include_once("/inc/init.php");
session_start();
global $db;
if (!$_SESSION['openid']) {                             //如果$_SESSION中没有openid，说明用户刚刚登陆，就执行getCode、getOpenId、getUserInfo获取他的信息
    $code = getCode();
    $access_token = getOpenId($code);
    $userInfo = getUserInfo();
    print_r($userInfo);
    if ($userInfo) {
/*        $userInfo = '{    "openid":" OPENID",  " nickname": NICKNAME,   "sex":"1",   "province":"PROVINCE"    "city":"CITY", "country":"COUNTRY",    "headimgurl":    "http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/46",
"privilege":[ "PRIVILEGE1" "PRIVILEGE2"     ], "unionid": "o6_bmasdasdsad6_2sgVt7hMZOPfL" } ';*/


        $sql = "SELECT * FROM " . PREFIX . "member WHERE openid = '{$userInfo['openid']}'";
        $member = $db->get_row($sql);
        if($member){
            $nickname    	= $userInfo['nickname'];
            $headimgurl    	= $userInfo['headimgurl'];
            $receive       = $member['receive']+1;
            $sql = "UPDATE member SET nickname = '{$nickname}',headimgurl = '{$headimgurl}',receive = '{$receive}' WHERE openid = '{$openid}'";
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
            $add_time	= now_time();
            $sql = "INSERT INTO member (username, nickname, openid, headimgurl, unionid, password, receive, ip, add_time) VALUES ('{$username}', '{$nickname}', '{$openid}', '{$headimgurl}', '{$unionid}', '{$password}', '{$receive}', '{$ip}', '{$add_time}')";
            $db->query($sql);
        }

        session('openid', $userInfo['openid']);         //写到$_SESSION中。微信缓存很坑爹，调试时请及时清除缓存再试。
    }
}


/*请求URL，返回 ACCESS_TOKEN*/
function get_access_token(){
    // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
    $data = json_decode($this->get_php_file("access_token.php"));
    if ($data->expire_time < time()) {
        // 如果是企业号用以下URL获取access_token
        // $url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=$this->appId&corpsecret=$this->appSecret";
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".APPSECRET;
        $res = json_decode($this->httpGet($url));
        $access_token = $res->access_token;
        if ($access_token) {
            $data->expire_time = time() + 7200;
            $data->access_token = $access_token;

            $this->set_php_file("access_token.php", json_encode($data));
        }
    } else {
        $access_token = $data->access_token;
    }

    return $access_token;
}

/**
 * @explain
 * 获取code,用于获取openid和access_token
 * @remark
 * code只能使用一次，当获取到之后code失效,再次获取需要重新进入
 * 不会弹出授权页面，适用于关注公众号后自定义菜单跳转等，如果不关注，那么只能获取openid
 **/
function getCode(){
    if (isset($_GET["code"])) {
        return $_GET["code"];
    } else {
        $str = "location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . APPID . "&redirect_uri=" . INDEX_URL . "&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
        header($str);
        exit;
    }
}

/**
 * @explain
 * 用于获取用户openid
 **/
function getOpenId($code){
    $access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . APPID . "&secret=" . APPSECRET . "&code=" . $code . "&grant_type=authorization_code";
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