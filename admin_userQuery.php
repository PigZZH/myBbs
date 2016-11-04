<?php
include "./common/common.php";
if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
$suoding = '已锁定';
if (isset($_GET['menuname'])) {
    $select = $_GET['menuname'];
    $data = db_select($conn, 'bbs_user', '*', "username like '%$select%' or email like '%$select%' ", null, setLimit(10));
    $count = select_returnone($conn, 'bbs_user', 'count(uid) as count', "username like '%$select%' or email like '%$select%'");
} else {
    $data = db_select($conn, 'bbs_user', '*', null, 'uid desc', setLimit(10));
    $count = select_returnone($conn, 'bbs_user', 'count(uid) as count');
}

include template("admin_userQuery.html");
