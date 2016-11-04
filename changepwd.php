<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-11-01
 * Time: 9:32
 */
include "./common/common.php";
if (!empty($_SESSION['uid']) || $_POST['upa']) {
    $opwd = md5($_POST['opwd']);
    $sql = db_select($conn, 'bbs_user', 'uid', 'password="' . $opwd . '"');
    if (!empty($sql)) {
        $uid = $sql[0]['uid'];
        $pwd = trim($_POST['npwd']);
        $repwd = trim($_POST['rnpwd']);
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
        $password = md5($_POST['npwd']);
        $email = $_POST['email'];
        //验证email
        if (checkEmail($email)) {
            echo "<script>alert('邮箱格式不正确');history.go(-1);</script>";
            exit;
        }
        $set = ['password' => $password, 'email' => $email];
        if (db_update($conn, 'bbs_user', $set, "uid=$uid")) {
            //echo "<script>alert('密码修改成功');history.go(-1);</script>";
        }
    }
} else {
    echo "<script>alert('您未登录,请登陆后重试');history.go(-1);</script>";
}