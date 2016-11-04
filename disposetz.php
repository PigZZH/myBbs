<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-20
 * Time: 17:13
 */
include 'common/common.php';
/*数据库连接*/
if (empty($_SESSION['type'])) {
    echo "<script>alert('请先登录并验证您的管理员身份');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
}
if (!empty($_GET['tid'])) {
    if ($_SESSION['type'] == 1) {
        /*var_dump($_GET);*/
        $id = $_GET['tid'];
        unset($_GET['tid']);
        if(isset($_GET['realdel'])&&$_GET['realdel']==1){
            unset($_GET['realdel']);
            if(db_deleted($conn,'bbs_details',"id=$id")){
                echo "<script>alert('操作成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
            } else {
                echo "<script>alert('操作失败请刷新后重试');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
            }
        }

        if (db_update($conn, 'bbs_details', $_GET, "id=$id")) {
            echo "<script>alert('操作成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
        } else {
            echo "<script>alert('操作失败请刷新后重试');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

        }

    }
}
if (!empty($_GET['rid'])) {
    if ($_SESSION['type'] == 1) {
        /*var_dump($_GET);*/
        $id = $_GET['rid'];
        unset($_GET['rid']);
        if(isset($_GET['realdel'])&&$_GET['realdel']==1){
            unset($_GET['realdel']);
            if(db_deleted($conn,'bbs_replay',"id=$id")){
                echo "<script>alert('操作成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
            } else {
                echo "<script>alert('操作失败请刷新后重试');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
            }
        }
        if (db_update($conn, 'bbs_replay', $_GET, "id=$id")) {
            echo "<script>alert('操作成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
        } else {
            echo "<script>alert('操作失败请刷新后重试');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

        }
    }
}