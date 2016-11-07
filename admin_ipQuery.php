<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-11-07
 * Time: 9:10
 */
include './common/common.php';
if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";
    die;

}
if (isset($_GET['add']) && $_GET['add'] == 1) {
    $name = $_GET['name'];
    function ip($n)
    {
        if ($n >= 0 && $n <= 255) {
            return $n;
        } else {
            echo "<script>alert('输入的ip地址错误');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
            die();
        }

    }

    array_map('ip', $name);
    $ip = (int)ip2long(implode('.', $name));
    if (!empty($_GET['time'])) {
        $day = $_GET['time'];
        $str = '"+' . $day . ' day"';
        $time = time() + $day * 24 * 60 * 60;
    } else {
        $time = time() + 99999999;
    }
    $set = ['ip' => $ip, 'time' => $time];
    var_dump($set);
    db_insert($conn, 'bbs_ip', $set);
    echo "<script>alert('添加ip地址成功');window.location='admin_ipban.php';</script>";
} elseif (!empty($_GET['submit'])) {
    $ip = $_GET['ip'];
    db_deleted($conn, 'bbs_ip', "ip=$ip");
    echo "<script>alert('解封成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
}