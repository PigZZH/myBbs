<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-29
 * Time: 15:48
 */
include './common/common.php';

if (isset($_POST['person'])) {
    $username = $_POST['username'];
    unset($_POST['name']);
    unset($_POST['person']);
    if (db_update($conn, 'bbs_user', $_POST, 'username="' . $username . '"')) {
        echo "<script>alert('修改成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        echo "<script>alert('修改失败');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

    }
}