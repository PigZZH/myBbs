<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-27
 * Time: 19:42
 */
include './common/common.php';
//连接数据库

define('WEB_SITE', 'http://localhost/Discuz1604/');

//echo BASE_PATH;
//exit;
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    $suffixArray = ['png', 'jpg', 'jpeg', 'gif', 'jpe', 'wbmp'];
    $mimeArray = ['image/png', 'image/jpeg', 'image/gif', 'image/wbmp'];
    $array = upload('tx', $mimeArray, $suffixArray, pow(1024, 2), SITE_ROOT . 'upload/', false);

    if (!$array[0]) {
        echo "<script>alert('上传头像失败');window.location='home_tx.php';</script>";
    }

    $name = basename($array[1]);

    $webName = WEB_SITE . 'upload/' . $name;
    $set = ['picture' => "$webName"];
    if (db_update($conn, 'bbs_user', $set, "uid=$uid")) {
        echo "<script>alert('上传头像成功');window.location='home_tx.php';</script>";
        $_SESSION['picture'] = $webName;
    } else {
        echo "<script>alert('上传头像失败');window.location='home_tx.php';</script>";
    }
    //echo $webName;
} else {
    echo "<script>alert('未登录');window.location='home_tx.php';</script>";
}

