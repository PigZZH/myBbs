<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-21
 * Time: 10:40
 */
include 'common/common.php';
if (isset($_SESSION['username']) && isset($_GET['id']) && isset($_GET['pay'])) {
    /*判断帖子是否购买过*/
    $uid = $_SESSION['uid'];
    $tid = $_GET['id'];
    $judge = db_select($conn, 'bbs_order', 'oid', "uid=$uid and tid=$tid");
    if ($judge) {
        echo "<script>alert('帖子已经购买过');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    } else {
        $userprice = db_select($conn, 'bbs_user', 'grade', "uid = $uid");
        $tzprice = $_GET['pay'];
        if ($userprice[0]['grade'] >= $tzprice) {
            $newgrade = $userprice[0]['grade'] - $tzprice;
            $grade = ['grade' => $newgrade];
            /*更新用户购买后的金币数*/
            db_update($conn, 'bbs_user', $grade, "uid=$uid");
            $buytime = time();
            $order = ['uid' => $uid, 'tid' => $tid, 'rate' => $tzprice, 'addtime' => $buytime];
            db_insert($conn, 'bbs_order', $order);
            $_SESSION['price'] = $newgrade;
            echo "<script>alert('购买成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
        } else {
            echo "<script>alert('对不起您的积分不足');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

        }
    }
} else {
    echo "<script>alert('你没登录');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
}