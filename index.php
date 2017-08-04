<?php

include_once("inc/init.php");


$cases = get_case(1, 10, 1);
$smarty->assign('cases', $cases);

$brand = get_ads(29, 0);
$num = count($brand);

for ($i = 0; $i < $num; $i++)
{
	if ($i < 10)
		$brand1[] = $brand[$i];
	elseif ($i > 9 && $i < 20)
		$brand2[] = $brand[$i];	
	else 
		$brand3[] = $brand[$i];	
}
$smarty->assign('brand1', $brand1);
$smarty->assign('brand2', $brand2);
$smarty->assign('brand3', $brand3);

$article1= array();
$article2= array();
$article = get_article(16, 1, 10);
$num = count($article);

for ($i = 0; $i < $num; $i++)
{
	if ($i < 5)
		$article1[] = $article[$i];
	else
		$article2[] = $article[$i];	
}
$smarty->assign('article1', $article1);
$smarty->assign('article2', $article2);

$about = get_article(18, 1, 10, 1);
$smarty->assign('about', $about);

$page_title = WEB_NAME;
$smarty->assign('page_title', $page_title);

$smarty->assign('menu', 'index');
$smarty->display('index.html');
