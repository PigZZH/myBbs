<?php

include 'common/common.php';
if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
$webname = WEB_NAME;
$webbtm = WEB_BTM;
$webicp = WEB_ICP;

if (!empty($_POST['buttom'])) {

    $str = file_get_contents('config/config.php');


    foreach ($_POST as $key => $val) {

        $pattern = "/define\('$key','.*?'\);/";
        $replace = "define('$key','$val');";
        $str = preg_replace($pattern, $replace, $str);

    }


    file_put_contents('config/config.php', $str);
    header('location:admin_main.php');

}
include template('admin_main.html');

