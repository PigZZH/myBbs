<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-30
 * Time: 16:43
 */
include '../common/common.php';
{
    $value['id']}
if (isset($_GET['linkid'])) {
    $linkid = $_GET['linkid'];
    if (db_update($conn, 'bbs_friendlovelink', $_POST, "id = $linkid")) {
        echo "<script>alert('更新成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        echo "<script>alert('更新失败');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

    }
} else {
    echo "<script>alert('操作非法');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
}