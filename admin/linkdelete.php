<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-30
 * Time: 16:11
 */
include '../common/common.php';
{
    $value['id']}
if (isset($_GET['linkid'])) {
    $linkid = $_GET['linkid'];
    if (db_deleted($conn, 'bbs_friendlovelink', "id = $linkid")) {
        echo "<script>alert('用户删除成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        echo "<script>alert('删除失败');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

    }
} else {
    echo "<script>alert('操作非法');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
}


