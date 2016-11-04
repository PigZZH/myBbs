<?php

include './common/common.php';


if (!$conn) {
    die;
}

if ($_POST['yzm'] == strtolower($_SESSION['yzm'])) {
    if (!empty($_POST['regsubmit'])) {
        $picture = 'img/avatar_blank.gif';

        $username = trim($_POST['username']);
        if (strlen($username) < 3) {
            echo "<script>alert('用户名必须大于3个字符');history.go(-1);</script>";
            exit;
        }
        $flag = db_select($conn, 'bbs_user', 'username', 'username="' . $username . '"');


        if (!empty($flag)) {
            echo "<script>alert('用户名已存在 ');history.go(-1);</script>";

        }

        $pwd = trim($_POST['password']);
        $repwd = trim($_POST['repassword']);
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

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $email = $_POST['mail'];
        //验证email
        if (checkEmail($email)) {
            echo "<script>alert('邮箱格式不正确');history.go(-1);</script>";
            exit;
        }
        $time = time();
        $ip = ($_SERVER['REMOTE_ADDR'] == '::1') ? $_SERVER['REMOTE_ADDR'] = '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
        $ip = ip2long($ip);
        $sql = "insert into bbs_user(username,password,regtime,lasttime,regip,email,picture) values('" . $username . "','" . $password . "','" . $time . "','" . $time . "','" . $ip . "','" . $email . "','" . $picture . "')";
        echo $sql;
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('注册成功');window.location='index.php';</script>";
        } else {
            echo "<script>alert('注册失败');history.go(-1);</script>";
        }

        mysqli_close($conn);
    } else {
        echo "<script>alert('操作非法');history.go(-1);</script>";
    }

} else {
    echo '<script>alert("验证码错误");history.go(-1);</script>';

}


/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-22
 * Time: 9:33
 */

