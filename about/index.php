<?php
set_include_path('D:\wwwroot\chenjin\wwwroot');
include_once("inc/init.php");

$sql = "SELECT * FROM article WHERE id = '47'";
$about = $db->get_row($sql);
//$about = get_article(17, 1, 10, 1);
$smarty->assign('about', $about);

//广告
$pos = 33;
$ad1 = get_ads($pos, 1);
$smarty->assign('ad1', $ad1);

$pos = 34;
$ad2 = get_ads($pos, 1);
$smarty->assign('ad2', $ad2);

$pos = 35;
$ad3 = get_ads($pos, 1);
$smarty->assign('ad3', $ad3);

$pos = 36;
$ad4 = get_ads($pos, 1);
$smarty->assign('ad4', $ad4);

$pos = 37;
$ad5 = get_ads($pos, 1);
$smarty->assign('ad5', $ad5);

$pos = 38;
$ad6 = get_ads($pos, 1);
$smarty->assign('ad6', $ad6);

$page_title = '关于我们 - ' . WEB_NAME;
$smarty->assign('page_title', $page_title);

$smarty->assign('menu', 'about');
$smarty->display('about/index.html');
