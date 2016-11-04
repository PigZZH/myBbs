<?php
include 'common/common.php';
/*数据库连接*/
//判断是否登录
$title = '个人资料';
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    $data = db_select($conn, 'bbs_user', 'email,birthday,sex,qq,realname', "uid=$uid");
    $username = $_SESSION['username'];
    $birthday = date('Y-m-d', $data[0]['birthday']);
    $sex = $data[0]['sex'];
    $qq = $data[0]['qq'];
    $realname = $data[0]['realname'];
    //查询出头像的地址
    //判断是否点击按钮
    if (isset($_POST['person'])) {
        unset($_POST['person']);
        if (isset($_POST['birthday'])) {
            $_POST['birthday'] = strtotime($_POST['birthday']);
        }
        if (db_update($conn, 'bbs_user', $_POST, "uid=$uid")) {
            echo "<script>alert('修改成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
        } else {
            echo "<script>alert('修改失败');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

        }
    }

} else {
    echo "<script>alert('未登录');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

}


include template("home.html");