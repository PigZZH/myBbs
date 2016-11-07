<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-22
 * Time: 17:58
 */
include './common/common.php';
$fip = $_SERVER["REMOTE_ADDR"];
$rip = ip2long($fip);


$flag = db_select($conn, 'bbs_ip', 'time', "ip=$rip");
if (isset($flag)) {
    $ftime = $flag[0]['time'];
    if ($ftime > time()) {
        echo "<script>alert('对不起您的ip已被封锁');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
        die;
    } else {
        db_deleted($conn, 'bbs_ip', "ip=$ip");
    }
}
$username = $_POST['username'];
$password = md5($_POST['password']);
$sql = "select uid,allowlogin,udertype,grade,picture,lasttime,bancount from bbs_user where username = '$username' and password = '$password'";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $allowlogin = $data['allowlogin'];
    $bancount = $data['bancount'];
    if ($allowlogin == 1 || $bancount >= 5) {
        echo "<script>alert('您已被封号，请联系管理员解封');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

    } else {
        /*获取数据*/
        $uid = $data['uid'];
        $_SESSION['uid'] = $uid;
        @$_SESSION['username'] = $username;
        $usertype = $data['udertype'];
        $_SESSION['type'] = $usertype;
        $price = $data['grade'];
        $_SESSION['price'] = $price;
        $picture = $data['picture'];
        $_SESSION['picture'] = $picture;
        /*判断是否获得登录金币*/
        $lasttime = $data['lasttime'];
        //获取当天的年份
        $y = date("Y");
        //获取当天的月份
        $m = date("m");
        //获取当天的号数
        $d = date("d");
        //将今天开始的年月日时分秒，转换成unix时间戳(开始示例：2015-10-12 00:00:00)
        $todayTime = mktime(0, 0, 0, $m, $d, $y);
        //$todayTime即是当天零点的时间戳
        if ($lasttime < $todayTime) {
            $newprice = intval($price + 10);
            $gold = ['grade' => "$newprice"];
            db_update($conn, 'bbs_user', $gold, "uid=$uid");
        }
        $lasttime = time();
        $updata = ['lasttime' => "$lasttime", 'bancount' => 0];
        //更新最后登录的时间 登录次数限制

        db_update($conn, 'bbs_user', $updata, "uid = $uid");

        echo "<script>alert('登陆成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

    }


} else {
    echo "<script>alert('登录失败密码或账号错误');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    $sql = "update bbs_user set bancount=(bancount+1) where username = '$username'";
    $result = mysqli_query($conn, $sql);

}
mysqli_close($conn);