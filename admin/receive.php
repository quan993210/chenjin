<?php

set_include_path(dirname(dirname(__FILE__)));
include_once("inc/init.php");
require("inc/lib_common.php");
global $db, $smarty;
//搜索条件
$keyword 	= crequest('keyword');
if($keyword){
	$con = "WHERE nickname LIKE '%{$keyword}%'";
}

$smarty->assign('keyword'    ,   $keyword);
//排序字段
$order 	 	= 'ORDER BY id DESC';

//列表信息
$now_page 	= irequest('page');
$now_page 	= $now_page == 0 ? 1 : $now_page;
$page_size 	= 30;
$start    	= ($now_page - 1) * $page_size;
$sql 		= "SELECT * FROM receive {$con} {$order} LIMIT {$start}, {$page_size}";
$arr 		= $db->get_all($sql);

$sql 		= "SELECT COUNT(id) FROM receive {$con}";
$total 		= $db->get_one($sql);
$page     	= new page(array('total'=>$total, 'page_size'=>$page_size));

$smarty->assign('receive_list',$arr);
$smarty->assign('pageshow',$page->show(6));
$smarty->assign('now_page',$page->now_page);

$smarty->assign('page_title', '宝宝币领取列表');
$smarty->display('receive/receive.htm');
    
?>