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
    $qdata = ['classname' => "$name", 'orderby' => "$orderby", 'banzhuid' => "$banzhuid", 'parentid' => "$pid"];
    if (db_insert($conn, 'bbs_category', $qdata)) {
        echo "<script>alert('添加成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        echo "<script>alert('操作非法');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
}