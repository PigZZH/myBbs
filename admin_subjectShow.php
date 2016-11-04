<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-25
 * Time: 14:09
 */
include './common/common.php';
if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
if (!empty($_GET['parentid'])) {
//查询的子版块
    $pid = $_GET['parentid'];
    $data = db_select($conn, 'bbs_category', '*', "parentid=$pid");

}
include template("admin_subjectShow.html");