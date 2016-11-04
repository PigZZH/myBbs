<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-25
 * Time: 15:09
 */
include 'common/common.php';
if (empty($_GET['parentid'])) {
    echo "<script>alert('操作非法');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
} else {
    $parentid = $_GET['parentid'];
}
include template('admin_subjectAdd.html');