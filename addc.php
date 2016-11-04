<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-25
 * Time: 14:21
 */
include 'common/common.php';
$cid = (int)$_REQUEST['classid'];

$title = '发帖' . '-' . WEB_NAME;
if (!isset($_SESSION['username']) || !isset($_REQUEST['classid'])) {
    echo "<script>alert('操作非法');window.location='index.php';</script>";
}

if (!empty($_POST['topicsubmit'])) {
    /*獲取數據*/
    $title = trim($_POST['subject']);
    $regtime = $_SERVER['REQUEST_TIME'];
    $uid = $_SESSION['uid'];
    $regip = $_SERVER['REMOTE_ADDR'];
    $regip = ($_SERVER['REMOTE_ADDR'] == '::1') ? $_SERVER['REMOTE_ADDR'] = '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
    $regip = ip2long($regip);
    $authorid = $_SESSION['username'];
    $content = $_POST['fwb'];
    $price = $_POST['price'];
    $data['title'] = $title;
    $data['authorid'] = $authorid;
    $data['content'] = $content;
    $data['addtime '] = $regtime;
    $data['addip'] = $regip;
    $data['tid'] = $cid;
    $data['price'] = $price;
    if (db_insert($conn, 'bbs_details', $data)) {
        /*發帖加金幣*/
        $grade = $_SESSION['price'];
        $newprice = intval($grade + 2);;
        $gold = ['grade' => "$newprice"];
        db_update($conn, 'bbs_user', $gold, "uid=$uid");
        $_SESSION['price'] = $newprice;
        echo "<script>alert('发帖成功');window.location='list.php?classid=" . $data['tid'] . "';</script>";
    } else {
        echo '注册失败';
    }
}
include template("addc.html");