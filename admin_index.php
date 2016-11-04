<?php

include 'common/common.php';
/*数据库连接*/
if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
include template('admin_index.html');
