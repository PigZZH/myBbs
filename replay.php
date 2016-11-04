<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-25
 * Time: 20:40
 */
/*发表帖子*/
include 'common/common.php';


$tid = $_POST['tid'];
if (!empty($_POST['replysubmit']) || isset($_SESSION['username'])) {
    $regtime = $_SERVER['REQUEST_TIME'];
    $regip = $_SERVER['REMOTE_ADDR'];
    $regip = ($_SERVER['REMOTE_ADDR'] == '::1') ? $_SERVER['REMOTE_ADDR'] = '127.0.0.1' : $_SERVER['REMOTE_ADDR'];
    $regip = ip2long($regip);
    @$authorid = $_SESSION['username'];
    $content = $_POST['fwb'];
    $cid = $_POST['cid'];
    $data['uid'] = $authorid;
    $data['content'] = $content;
    $data['createtime '] = $regtime;
    $data['createip'] = $regip;
    $data['tid'] = $tid;
    $data['cid'] = $cid;
    if (db_insert($conn, 'bbs_replay', $data)) {

        echo "<script>alert('发帖成功');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";

    } else {
        echo "<script>alert('你没登录');window.location='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }

}

