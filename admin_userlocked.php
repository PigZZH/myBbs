<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-30
 * Time: 9:01
 */
include './common/common.php';
if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
if (isset($_GET['menuname'])) {
    $select = $_GET['menuname'];
    $data = db_select($conn, 'bbs_user', '*', "uid like '%$select%' or username like '%$select%' or email like '%$select%' and allowlogin=1", null, setLimit(5));
    $count = select_returnone($conn, 'bbs_user', 'count(uid) as count', "username like '%$select%' or email like '%$select%' and allowlogin=1");
} else {
    $data = db_select($conn, 'bbs_user', 'uid,username,email', 'allowlogin = 1 or bancount >=5', null, setLimit(5));
    $count = select_returnone($conn, 'bbs_user', 'count(uid) as count', 'allowlogin=1');
}

include template("admin_userlocked.html");