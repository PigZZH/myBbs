<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-24
 * Time: 16:20
 */
include './common/common.php';

if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
if (isset($_GET['add'])) {
    if (db_insert($conn, 'bbs_friendlovelink', $_POST)) {
        echo "<script>alert('更新成功');window.location='admin_friendlink.php';</script>";

    } else {
        echo "<script>alert('更新失败');window.location='admin_friendlink.php';</script>";
    }
}
include template("admin_linkAdd.html");