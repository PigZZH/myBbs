<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-29
 * Time: 16:47
 */
session_start();
$_SESSION = array();
setcookie(session_name(), '', time() - 100, '/');
session_destroy();


echo "<script>alert('退出成功');window.location='admin_login.php';</script>";