<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-31
 * Time: 15:42
 */
include "./common/common.php";

if (!empty($_POST['regsubmit'])) {
    $username = $_POST['username'];
    $and = $_POST['and'];
    $flag = db_select($conn, 'bbs_user', 'uid', 'username="' . $username . '" and forget="' . $and . '"');
    if (empty($flag)) {
        echo "<script>alert('操作非法,你想干嘛?');history.go(-1);</script>";
        exit;
    }
    $pwd = trim($_POST['pwd']);
    $repwd = trim($_POST['repwd']);
    if ($pwd != $repwd) {
        echo "<script>alert('两次输入的密码不一致');history.go(-1);</script>";
        exit;
    }
    if (strlen($pwd) < 3) {
        echo "<script>alert('密码长度必须大于3个字符');history.go(-1);</script>";
        exit;
    }
    if (!checkPwd($pwd)) {
        echo "<script>alert('密码不能为纯数字');history.go(-1);</script>";
        exit;
    }
    $password = md5($_POST['pwd']);
    $set = ['password' => "$password", 'forget' => null];
    $result = db_update($conn, 'bbs_user', $set, 'username="' . $username . '"');
    if ($result) {
        echo "<script>alert('提交成功,你现在可以登录了');window.location='index.php';</script>";
    } else {
        echo "<script>alert('提交失败,请联系管理员');history.go(-1);</script>";
    }

} else {
    echo "<script>alert('操作非法!');history.go(-1);</script>";
}
