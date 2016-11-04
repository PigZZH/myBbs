<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-22
 * Time: 21:55
 */

session_start();
$_SESSION = array();
setcookie(session_name(), '', time() - 100, '/');
session_destroy();


echo "<script>alert('退出成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

/*

//1、清空全局数组
$_SESSION = array();

//2、设置客户端的PHPSESSID过期(清除客户端数据)
setcookie(session_name(),'',time()-100,'/');

//3、清除记录在服务器上的文件
session_destroy();

echo '退出成功<a href="login.php">返回</a>';*/