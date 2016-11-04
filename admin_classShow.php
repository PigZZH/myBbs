<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-30
 * Time: 20:31
 */
include './common/common.php';

if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
//查询所有大板块
$biddata = db_select($conn, 'bbs_bigtable', '*', null, 'orderby desc');
//查询所有的子版块
$data = db_select($conn, 'bbs_category', '*');

include template("admin_classShow.html");

