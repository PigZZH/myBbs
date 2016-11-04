<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-28
 * Time: 19:19
 */
include './common/common.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$files = 'uid,allowlogin,udertype,picture,lasttime';
$a = db_select($conn, 'bbs_user', $files, 'username ="' . $username . '" and password = "' . $password . '" and udertype = 1');
if (!empty($a)) {
    //获取数据
    $_SESSION['type'] = 0;
    $uid = $a[0]['uid'];
    $_SESSION['admin_uid'] = $uid;
    @$_SESSION['admin_username'] = $username;
    $usertype = $a[0]['udertype'];
    $_SESSION['type'] = $usertype;
    $lasttime = $a[0]['lasttime'];
    $lasttime = time();
    $updata = ['lasttime' => "$lasttime"];

    //更新最后登录的时间 登录次数限制
    echo "<script>alert('登陆成功');window.location='admin_index.php';</script>";

    db_update($conn, 'bbs_user', $updata, "uid = $uid");
} else {
    echo "<script>alert('登录失败密码或账号错误');window.location='admin_login.php';</script>";
}
