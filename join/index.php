<?php
set_include_path('D:\wwwroot\chenjin\wwwroot');
include_once("inc/init.php");

$sql = "SELECT * FROM article WHERE cid = '19' ORDER BY order_num DESC";
$job = $db->get_all($sql);

$smarty->assign('job', $job);

$page_title = '加入我们 - ' . WEB_NAME;
$smarty->assign('page_title', $page_title);

$smarty->assign('menu', 'join');
$smarty->display('join/index.html');


