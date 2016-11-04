<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-26
 * Time: 14:35
 */
include './common/common.php';
if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
//设置每页显示的数量
$limit = 10;
//查询所有主题帖的信息
$data = db_select($conn, 'bbs_details', '*', null, null, setLimit($limit));
//查询所有主题帖子的数量
$cdata = db_select($conn, 'bbs_details', 'count(id) as c');
$count = $cdata[0]['c'];


include template("admin_tzShow.html");