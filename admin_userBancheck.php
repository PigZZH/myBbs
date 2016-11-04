<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-30
 * Time: 9:33
 */
include "./common/common.php";
if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
if (isset($_GET['allowlogin']) && isset($_GET['id'])) {
    $uid = $_GET['id'];
    $allowlogin = (int)$_GET['allowlogin'];
    $allowlogin = ['allowlogin' => 0, 'bancount' => 0];
    $result = db_update($conn, 'bbs_user', $allowlogin, "uid = $uid");
    if ($result) {
        echo "<script>alert('用户解锁成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        echo "<script>alert('解锁失败或操作非法');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
} else {
    echo "<script>alert('操作非法');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
}