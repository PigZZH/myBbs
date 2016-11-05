<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-25
 * Time: 14:49
 */
include './common/common.php';
if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";
    die;

}

if (!empty($_GET['xiugai'])) {
    $cid = $_GET['cid'];
    $name = $_GET['name'];
    $orderby = $_GET['orderby'];
    $banzhuid = $_GET['banzhuid'];
    $qdata = ['classname' => "$name", 'orderby' => "$orderby", 'banzhuid' => "$banzhuid"];
    if (db_update($conn, 'bbs_category', $qdata, "cid = $cid")) {
        echo "<script>alert('修改成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        echo "<script>alert('修改成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
} elseif (!empty($_GET['del'])) {
    $cid = $_GET['cid'];
    if (db_deleted($conn, 'bbs_category', "cid=$cid")) {
        echo "<script>alert('删除成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        echo "<script>alert('删除成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
} elseif (!empty($_GET['add'])) {

    $name = $_GET['name'];
    $orderby = $_GET['orderby'];
    $banzhuid = $_GET['banzhuid'];
    $pid = $_GET['pid'];
    $qdata = ['classname' => "$name", 'orderby' => "$orderby", 'banzhuid' => "$banzhuid", 'parentid' => "$pid",'picture'=>'img/forum.gif'];
    if (db_insert($conn, 'bbs_category', $qdata)) {
        echo "<script>alert('添加成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        echo "<script>alert('操作非法');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
}
if(isset($_POST['pic'])){
    define('WEB_SITE', 'http://localhost/Discuz1604/');
    $cid = $_POST['cid'];
        $suffixArray = ['png', 'jpg', 'jpeg', 'gif', 'jpe', 'wbmp'];
        $mimeArray = ['image/png', 'image/jpeg', 'image/gif', 'image/wbmp'];
        $array = upload('tx', $mimeArray, $suffixArray, pow(1024, 2), SITE_ROOT . 'upload/', false);

        if (!$array[0]) {
            echo "<script>alert('上传失败');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
        }

        $name = basename($array[1]);

        $webName = WEB_SITE . 'upload/' . $name;
        $set = ['picture' => "$webName"];
        if (db_update($conn, 'bbs_category', $set, "cid=$cid")) {
            echo "<script>alert('上传成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

        } else {
            echo "<script>alert('上传失败');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
        }
        //echo $webName;
}