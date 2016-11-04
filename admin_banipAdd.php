<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-11-02
 * Time: 14:19
 */
include './common/common.php';

if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}

include template('admin_banipAdd.html');