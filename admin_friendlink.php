<?php
include './common/common.php';

if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
$data = db_select($conn, 'bbs_friendlovelink', '*', null, 'id asc');
/*删除友情链接*/
if (!empty($_GET['delete']) && $_GET['delete'] == 1) {
    if (isset($_GET['linkid'])) {
        $linkid = $_GET['linkid'];
        if (db_deleted($conn, 'bbs_friendlovelink', "id = $linkid")) {
            echo "<script>alert('用户删除成功');window.location='admin_friendlink.php';</script>";
        } else {
            echo "<script>alert('删除失败');window.location='admin_friendlink.php';</script>";

        }
    } else {
        echo "<script>alert('操作非法');window.location='admin_friendlink.php';</script>";
    }


} elseif (!empty($_GET['xiugai']) && $_GET['xiugai'] == 1) {      //修改友情链接
    if (isset($_GET['linkid'])) {
        $linkid = $_GET['linkid'];
        if (db_update($conn, 'bbs_friendlovelink', $_POST, "id = $linkid")) {
            echo "<script>alert('更新成功');window.location='admin_friendlink.php';</script>";
        } else {
            echo "<script>alert('更新失败');window.location='admin_friendlink.php';</script>";

        }
    } else {
        /*echo "<script>alert('操作非法');window.location='admin_friendlink.php';</script>";*/
    }
}
include template('admin_friendlink.html');