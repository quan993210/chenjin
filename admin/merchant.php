<?php
/**
 * Created by PhpStorm.
 * User: xkq
 * Date: 2017/8/4 0004
 * Time: 20:49
 */
set_include_path(dirname(dirname(__FILE__)));
include_once("inc/init.php");
session_start();

$action = crequest("action");
$action = $action == '' ? 'list' : $action;

switch ($action)
{
    case "list":
        merchant_list();
        break;
    case "add_merchant":
        add_merchant();
        break;
    case "do_add_merchant":
        do_add_merchant();
        break;
    case "mod_merchant":
        mod_merchant();
        break;
    case "do_mod_merchant":
        do_mod_merchant();
        break;
    case "del_merchant":
        del_merchant();
        break;
    case "del_sel_merchant":
        del_sel_merchant();
        break;
    case "del_one_img":
        del_one_img();
        break;
    case "upload_batch_photo":
        upload_batch_photo();
        break;
}

function get_con()
{
    global $smarty;

    //文章分类

    $con= "";
    //关键字
    $keyword = crequest('keyword');
    $smarty->assign('keyword', $keyword);
    if (!empty($keyword))
    {
        $con = " WHERE (name like '%{$keyword}%' or brief like '%{$keyword}%' or captain like '%{$keyword}%')";
    }


    return $con;
}

/*------------------------------------------------------ */
//-- 案例列表
/*------------------------------------------------------ */	
function merchant_list()
{
    global $db, $smarty;

    //搜索条件
    $con 		= get_con();

    //排序字段
    $order 	 	= 'ORDER BY rank DESC, addtime DESC';

    //列表信息
    $now_page 	= irequest('page');
    $now_page 	= $now_page == 0 ? 1 : $now_page;
    $page_size 	= 30;
    $start    	= ($now_page - 1) * $page_size;
    $sql 		= "SELECT * FROM merchant {$con} {$order} LIMIT {$start}, {$page_size}";
    $arr 		= $db->get_all($sql);

    $sql 		= "SELECT COUNT(id) FROM merchant {$con}";
    $total 		= $db->get_one($sql);
    $page     	= new page(array('total'=>$total, 'page_size'=>$page_size));

    $smarty->assign('merchant_list'   ,   $arr);
    $smarty->assign('pageshow'    ,   $page->show(6));
    $smarty->assign('now_page'    ,   $page->now_page);

    //案例分类
    //$smarty->assign('merchant_category', get_merchant_category());

    $smarty->assign('page_title', '商户列表');
    $smarty->display('merchant/merchant_list.htm');
}

/*------------------------------------------------------ */
//-- 添加案例
/*------------------------------------------------------ */	
function add_merchant()
{
    global $smarty;

    if (!empty($_SESSION['case_logo_img']))
    {
        $merchant['logo'] = $_SESSION['case_logo_img'];
    }

    $smarty->assign('merchant', $merchant);

    //案例分类
   // $smarty->assign('merchant_category', get_merchant_category());

    $smarty->assign('action', 'do_add_merchant');
    $smarty->assign('page_title', '添加商户');
    $smarty->display('merchant/merchant.htm');
}

/*------------------------------------------------------ */
//-- 添加案例
/*------------------------------------------------------ */	
function do_add_merchant()
{
    global $db, $smarty;

    $name    	= crequest('name');
    $brief    	= crequest('brief');
    $captain    	= crequest('captain');
    $phone   = irequest('phone');
    $address 	= crequest('address');
    $gold 	= irequest('gold');
    $rank = irequest('rank');
    $logo 	= crequest('logo_path');
    $addtime	= now_time();

    check_null($name  	,   '商户名称');
    check_null($captain  	,   '商户联系人');
    check_null($phone  	,   '联系人电话');
    check_null($gold  	,   '可领取金币');


    $sql = "INSERT INTO merchant (name, logo, brief, captain, phone, address, gold, rank, addtime) VALUES ('{$name}', '{$logo}', '{$brief}', '{$captain}', '{$phone}', '{$address}', '{$gold}', '{$rank}', '{$addtime}')";
    $db->query($sql);

    unset($_SESSION['case_logo_img']);


   /* $aid  = $_SESSION['admin_id'];
    $text = '添加商户，添加商户ID：' . $db->insert_id();
    operate_log($aid, 'merchant', 1, $text);*/

    $url_to = "merchant.php?action=list";
    url_locate($url_to, '添加成功');
}

/*------------------------------------------------------ */
//-- 修改案例
/*------------------------------------------------------ */	
function mod_merchant()
{
    global $db, $smarty;

    //分类
    $id = irequest('id');
    $sql = "SELECT * FROM " . PREFIX . "merchant WHERE id = '{$id}'";
    $merchant = $db->get_row($sql);
    $smarty->assign('merchant', $merchant);
    $smarty->assign('url_path', URL_PATH);
    $smarty->assign('now_page', irequest('now_page'));
    $smarty->assign('action', 'do_mod_merchant');
    $smarty->assign('page_title', '修改商户');
    $smarty->display('merchant/merchant.htm');
}

/*------------------------------------------------------ */
//-- 修改案例
/*------------------------------------------------------ */	
function do_mod_merchant()
{
    global $db;

    $id 	  	= irequest('id');
    $name    	= crequest('name');
    $brief    	= crequest('brief');
    $captain    	= crequest('captain');
    $phone   = irequest('phone');
    $address 	= crequest('address');
    $gold 	= irequest('gold');
    $rank = irequest('rank');
    $logo 	= crequest('logo_path');
    $addtime	= now_time();

    check_null($name  	,   '商户名称');
    check_null($captain  	,   '商户联系人');
    check_null($phone  	,   '联系人电话');
    check_null($gold  	,   '可领取金币');


    $sql = "UPDATE merchant SET "
        . "name = '{$name}', "
        . "brief = '{$brief}', "
        . "captain = '{$captain}', "
        . "phone = '{$phone}', "
        . "address = '{$address}', "
        . "gold = '{$gold}', "
        . "rank = '{$rank}', "
        . "logo = '{$logo}', "
        . "addtime = '{$addtime}' "
        . "WHERE id = '{$id}'";
    $db->query($sql);

    unset($_SESSION['case_logo_img']);

    $now_page = irequest('now_page');
    $url_to = "merchant.php?action=list&page={$now_page}";
    url_locate($url_to, '修改成功');
}

/*------------------------------------------------------ */
//-- 删除案例
/*------------------------------------------------------ */	
function del_merchant()
{
    global $db;

    $id = irequest('id');
    $sql = "SELECT logo FROM merchant WHERE id = '{$id}'";
    $row = $db->get_row($sql);
    del_img($row['logo']);

    $sql = "DELETE FROM merchant WHERE id = '{$id}'";
    $db->query($sql);

    $now_page = irequest('now_page');
    $url_to = "merchant.php?action=list&page={$now_page}";
    href_locate($url_to);
}

/*------------------------------------------------------ */
//-- 批量删除案例
/*------------------------------------------------------ */	
function del_sel_merchant()
{
    global $db;

    $id = crequest('checkboxes');
    if (empty($id))alert_back('请选中需要删除的选项');

    $sql = "SELECT logo FROM merchant WHERE id IN ({$id})";
    $imgs_all = $db->get_all($sql);
    for ($i = 0; $i < count($imgs_all); $i++) {
        del_img($imgs_all[$i]['logo']);
    }

    $sql = "DELETE FROM merchant WHERE id IN ({$id})";
    $db->query($sql);


    $now_page = irequest('now_page');
    $url_to = "merchant.php?action=list&page={$now_page}";
    href_locate($url_to);
}

function upload_file($file)
{
    //$file = $_FILES['file_source'];
    $pos = strrpos($file['name'], '.');
    $file_type = substr($file['name'], $pos);
    $file_name = date('YmdHis' . rand(111111, 999999)) . $file_type;
    move_uploaded_file($file["tmp_name"], '../upload/merchant/' . $file_name);

    return $file_name;
}

/*------------------------------------------------------ */
//-- 删除案例图片
/*------------------------------------------------------ */	
function del_one_img()
{
    $pic_path = crequest('pic_path');
    del_img($pic_path);

    $id = irequest('id');
    if (!empty($id))
    {
        global $db;
        $replace_img = $pic_path . '|';
        $sql = "UPDATE merchant SET pics = replace(pics, '{$replace_img}', '') WHERE id = '{$id}'";
        $db->query($sql);
    }

    echo '1';
}
?>
