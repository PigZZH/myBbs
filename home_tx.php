<?php
include 'common/common.php';
/*数据库连接*/
$title = '修改头像';
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    //查询出头像的地址
    $picturelink = db_select($conn, 'bbs_user', 'picture', "uid=$uid")[0]['picture'];

}


include template("home_tx.html");