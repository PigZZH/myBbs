<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-11-02
 * Time: 13:37
 */
include 'common/common.php';
/*数据库连接*/
if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
include template('admin_ipban.html');
