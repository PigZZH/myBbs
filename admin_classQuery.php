<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-25
 * Time: 10:01
 */
include './common/common.php';

if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
/*var_dump($_GET);
var_dump($_POST);*/
//修改大板块
if (!empty($_GET['xiugai'])) {
    $bid = $_GET['bid'];
    $name = $_GET['name'];
    $orderby = $_GET['orderby'];
    $data = ['name' => "$name", 'orderby' => $orderby];
    if (db_update($conn, 'bbs_bigtable', $data, "bid = $bid")) {
        echo "<script>alert('修改成功');window.location='admin_classShow.php';</script>";
    } else {
        echo "<script>alert('修改失败');window.location='admin_classShow.php';</script>";
    }

} elseif (!empty($_GET['del'])) {//删除大板块
    $bid = $_GET['bid'];
    echo 'cnm';
    if (db_deleted($conn, 'bbs_bigtable', "bid=$bid")) {
        echo "<script>alert('删除成功');window.location='admin_classShow.php';</script>";
    }
} elseif (!empty($_GET['add'])) {//添加大板块
    $name = $_GET['name'];
    $orderby = $_GET['orderby'];
    $data = ['name' => "$name", 'orderby' => $orderby];
    if (db_insert($conn, 'bbs_bigtable', $data)) {
        echo "<script>alert('添加成功');window.location='admin_classShow.php';</script>";

    } else {
        echo "<script>alert('添加失败');window.location='admin_classShow.php';</script>";
    }
}