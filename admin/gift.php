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
        gift_list();
        break;
    case "add_gift":
        add_gift();
        break;
    case "do_add_gift":
        do_add_gift();
        break;
    case "mod_gift":
        mod_gift();
        break;
    case "do_mod_gift":
        do_mod_gift();
        break;
    case "del_gift":
        del_gift();
        break;
    case "del_sel_gift":
        del_sel_gift();
        break;
    case "get_qrcode":
        get_qrcode();
        break;
    case "add_cat":
        add_cat();
        break;
    case "do_add_cat":
        do_add_cat();
        break;
    case "del_cat":
        del_cat();
        break;
    case "del_sel_cat":
        del_sel_cat();
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
function gift_list()
{
    global $db, $smarty;

    //搜索条件
    $con 		= get_con();

    //排序字段
   // $order 	 	= 'ORDER BY rank DESC, addtime DESC';

    //列表信息
    $now_page 	= irequest('page');
    $now_page 	= $now_page == 0 ? 1 : $now_page;
    $page_size 	= 30;
    $start    	= ($now_page - 1) * $page_size;
    $sql 		= "SELECT * FROM gift {$con}  LIMIT {$start}, {$page_size}";
    $arr 		= $db->get_all($sql);

    $sql 		= "SELECT COUNT(id) FROM gift {$con}";
    $total 		= $db->get_one($sql);
    $page     	= new page(array('total'=>$total, 'page_size'=>$page_size));

    include "inc/plugin/phpqrcode.php";
    foreach($arr as $key=>$val){
        // 没有二维码图片的时候
        if(!is_file($_SERVER['DOCUMENT_ROOT'] . "/ChildrenDay/upload/phpqrcode/gift-".$val['id'].".jpg")){
            $value="http://tongwanjie.famishare.net/ChildrenDay/main.php?action=exchange&giftid=".$val['id'];
            $errorCorrectionLevel = 'L';
            $matrixPointSize = 12;
            QRcode::png($value,$_SERVER['DOCUMENT_ROOT'] . "/ChildrenDay/upload/phpqrcode/gift-".$val['id'].".jpg", $errorCorrectionLevel, $matrixPointSize);
        }
    }

    $smarty->assign('gift_list'   ,   $arr);
    $smarty->assign('pageshow'    ,   $page->show(6));
    $smarty->assign('now_page'    ,   $page->now_page);

    //案例分类
    $smarty->assign('merchant', get_merchant());

    $smarty->assign('page_title', '礼品列表');
    $smarty->display('gift/gift_list.htm');
}

/*------------------------------------------------------ */
//-- 获得礼品商户
/*------------------------------------------------------ */
function get_merchant()
{
    global $db;

    $sql = "SELECT id,name FROM merchant ORDER BY rank desc";
    $res = $db->get_all($sql);

    return $res;
}


/*------------------------------------------------------ */
//-- 添加案例
/*------------------------------------------------------ */	
function add_gift()
{
    global $smarty;

    if (!empty($_SESSION['case_image_img']))
    {
        $gift['image'] = $_SESSION['case_image_img'];
    }

    $smarty->assign('gift', $gift);

    //案例分类
    $smarty->assign('merchant', get_merchant());

    $smarty->assign('action', 'do_add_gift');
    $smarty->assign('page_title', '添加礼品');
    $smarty->display('gift/gift.htm');
}

/*------------------------------------------------------ */
//-- 添加案例
/*------------------------------------------------------ */	
function do_add_gift()
{
    global $db, $smarty;

    $name    	= crequest('name');
    $brief    	= crequest('brief');
    $buy_gold 	= irequest('buy_gold');
    $image 	= crequest('image_path');
    $merchant_id= irequest('merchant_id');
    $sql 		= "SELECT name FROM merchant where id=$merchant_id";
    $merchant_name 		= $db->get_one($sql);

    $addtime	= now_time();

    check_null($name  	,   '商户名称');
    check_null($buy_gold  	,   '所需宝宝币');
    check_null($merchant_id  	,   '所属商家');


    $sql = "INSERT INTO gift (name,brief, image, buy_gold, merchant_id, merchant_name, addtime) VALUES ('{$name}', '{$brief}', '{$image}', '{$buy_gold}', '{$merchant_id}', '{$merchant_name}', '{$addtime}')";
    $db->query($sql);

    unset($_SESSION['case_image_img']);

    $url_to = "gift.php?action=list";
    url_locate($url_to, '添加成功');
}

/*------------------------------------------------------ */
//-- 修改案例
/*------------------------------------------------------ */	
function mod_gift()
{
    global $db, $smarty;

    //分类
    $smarty->assign('merchant', get_merchant());
    $id = irequest('id');
    $sql = "SELECT * FROM " . PREFIX . "gift WHERE id = '{$id}'";
    $gift = $db->get_row($sql);
    $smarty->assign('gift', $gift);
    $smarty->assign('url_path', URL_PATH);
    $smarty->assign('now_page', irequest('now_page'));
    $smarty->assign('action', 'do_mod_gift');
    $smarty->assign('page_title', '修改礼品');
    $smarty->display('gift/gift.htm');
}

/*------------------------------------------------------ */
//-- 修改案例
/*------------------------------------------------------ */	
function do_mod_gift()
{
    global $db;

    $id 	  	= irequest('id');
    $name    	= crequest('name');
    $brief    	= crequest('brief');
    $buy_gold 	= irequest('buy_gold');
    $image 	= crequest('image_path');
    $merchant_id= irequest('merchant_id');
    $sql 		= "SELECT name FROM merchant where id=$merchant_id";
    $merchant_name 		= $db->get_one($sql);

    $addtime	= now_time();

    check_null($name  	,   '商户名称');
    check_null($buy_gold  	,   '所需宝宝币');
    check_null($merchant_id  	,   '所属商家');


    $sql = "UPDATE gift SET "
        . "name = '{$name}', "
        . "brief = '{$brief}', "
        . "merchant_id = '{$merchant_id}', "
        . "merchant_name = '{$merchant_name}', "
        . "buy_gold = '{$buy_gold}', "
        . "image = '{$image}', "
        . "addtime = '{$addtime}' "
        . "WHERE id = '{$id}'";
    $db->query($sql);

    unset($_SESSION['case_image_img']);

    $now_page = irequest('now_page');
    $url_to = "gift.php?action=list&page={$now_page}";
    url_locate($url_to, '修改成功');
}

/*------------------------------------------------------ */
//-- 删除案例
/*------------------------------------------------------ */	
function del_gift()
{
    global $db;

    $id = irequest('id');
    $sql = "SELECT image FROM gift WHERE id = '{$id}'";
    $row = $db->get_row($sql);
    del_img($row['image']);

    $sql = "DELETE FROM gift WHERE id = '{$id}'";
    $db->query($sql);

    $now_page = irequest('now_page');
    $url_to = "gift.php?action=list&page={$now_page}";
    href_locate($url_to);
}

/*------------------------------------------------------ */
//-- 批量删除案例
/*------------------------------------------------------ */	
function del_sel_gift()
{
    global $db;

    $id = crequest('checkboxes');
    if (empty($id))alert_back('请选中需要删除的选项');

    $sql = "SELECT image FROM gift WHERE id IN ({$id})";
    $imgs_all = $db->get_all($sql);
    for ($i = 0; $i < count($imgs_all); $i++) {
        del_img($imgs_all[$i]['image']);
    }

    $sql = "DELETE FROM gift WHERE id IN ({$id})";
    $db->query($sql);


    $now_page = irequest('now_page');
    $url_to = "gift.php?action=list&page={$now_page}";
    href_locate($url_to);
}

function upload_file($file)
{
    //$file = $_FILES['file_source'];
    $pos = strrpos($file['name'], '.');
    $file_type = substr($file['name'], $pos);
    $file_name = date('YmdHis' . rand(111111, 999999)) . $file_type;
    move_uploaded_file($file["tmp_name"], '../upload/gift/' . $file_name);

    return $file_name;
}

function get_qrcode()
{
    global $db, $smarty;
    $id = irequest('id');
    $sql = "SELECT * FROM " . PREFIX . "gift WHERE id = '{$id}'";
    $gift = $db->get_row($sql);
    $smarty->assign('gift', $gift);
    $smarty->display('gift/image.htm');
}


?>
