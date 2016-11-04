<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-30
 * Time: 9:39
 */
include "./common/common.php";
if (isset($_GET['id'])) {
    $uid = $_GET['id'];
    $data = db_select($conn, 'bbs_user', '*', 'username="' . $uid . '"');//用户信息
    $data1 = db_select($conn, 'bbs_details', 'id,title,content,addtime,del', 'authorid="' . $uid . '"');//主题信息
    $data2 = db_select($conn, 'bbs_replay', 'id,content,createtime,del', 'uid="' . $uid . '"');//回帖信息

}

include template("admin_userEdit.html");
