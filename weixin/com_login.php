<?php
/**
 * Created by PhpStorm.
 * User: xkq
 * Date: 2017/8/6 0006
 * Time: 22:16
 */
set_include_path(dirname(dirname(__FILE__)));
include_once("inc/init.php");
session_start();

if (!$_SESSION['openid']) {                             //如果$_SESSION中没有openid，说明用户刚刚登陆，就执行getCode、getOpenId、getUserInfo获取他的信息
    $code = getCode();
    $access_token = getOpenId($code);
    $userInfo = getUserInfo();
    if ($userInfo) {
        $userInfo = '{    "openid":" OPENID",  " nickname": NICKNAME,   "sex":"1",   "province":"PROVINCE"    "city":"CITY", "country":"COUNTRY",    "headimgurl":    "http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/46",
"privilege":[ "PRIVILEGE1" "PRIVILEGE2"     ], "unionid": "o6_bmasdasdsad6_2sgVt7hMZOPfL" } ';
        session('openid', $userInfo['openid']);         //写到$_SESSION中。微信缓存很坑爹，调试时请及时清除缓存再试。
    }
}
