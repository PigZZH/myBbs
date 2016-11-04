<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-29
 * Time: 19:17
 */
include "../common/common.php";
$conn = connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_CHARSET);
if (isset($_GET['id'])) {
    $uid = $_GET['id'];
    $result = db_deleted($conn, 'bbs_user', "uid=$uid");
    if ($result) {
        echo "<script>alert('用户删除成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        echo "<script>alert('删除失败或操作非法');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
} else {
    echo "<script>alert('操作非法');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
}

