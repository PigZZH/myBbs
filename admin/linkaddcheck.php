<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-30
 * Time: 19:34
 */
include '../common/common.php';
{
    $value['id']}
var_dump($_POST);
if (db_insert($conn, 'bbs_friendlovelink', $_POST)) {
    echo "<script>alert('更新成功');window.location='youqinglianjie.php';</script>";

}
