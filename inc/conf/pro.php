<?php
define('IN_APP', true);
//51bcaeab39143b6bbdbdbf37e76f23cb
//数据库信息配置
define("DB_HOST", 'localhost');
define("DB_NAME", 'sql_chenjin');
define("DB_USER", 'root');
define("DB_PASS", 'root');
define("PREFIX",  '');

//编码配置
define('CHAR_SET', 'utf-8');

//模板配置
define('TEMPLATE',      'smarty');
define('TEMP_PAGE', 	'temp/default');
define('TEMP_ADMIN',  	'temp/admin');
define('TEMP_COMPILE',	'temp/compiled');
define('TEMP_CACHE',	'temp/caches');
define('CACHE_TIME',	3600);
define('DEBUG_MODE',	1);
define('ADMIN_DIR', 	'admin/');

//路径配置
define('FILE_PATH', '/ChildrenDay');
define('URL_PATH', 'http://' . $_SERVER['HTTP_HOST'] . FILE_PATH);
define('ADMIN_TEMP_PATH', 'http://' . $_SERVER['HTTP_HOST'] . FILE_PATH . '/' . TEMP_ADMIN);

//网站名称
define('WEB_NAME', '南昌辰锦网络科技有限公司');
define('SYS_NAME', '辰锦网站后台管理');

//微信配置
define('APPID', 'wx8750e032a5a24386');
define('APPSECRET', 'cd4704397f1e7e16a34f1fb1a302ed24');
//微信回调地址，要跟公众平台的配置域名相同
define('INDEX_URL', 'http://tongwanjie.famishare.net/ChildrenDay/');
?>