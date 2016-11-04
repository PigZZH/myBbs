<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-22
 * Time: 9:49
 */
define('SITE_ROOT', str_replace('\\', '/', substr(__DIR__, 0, -6)));
/*require SITE_ROOT.'config/database.php';
//包含文件失败，程序不向下执行，而include包含失败会向下执行
//echo '456';

include(SITE_ROOT.'config/type.php');
//会做重复包含的检查
include_once(SITE_ROOT.'config/type.php');

//echo '123';*/
include SITE_ROOT . 'config/config.php';
include SITE_ROOT . 'helper/mytpl.php';
include SITE_ROOT . 'helper/mysql.php';
include SITE_ROOT . 'helper/func.php';
include SITE_ROOT . 'helper/page.php';
include SITE_ROOT . 'helper/uploadfunc.php';
$conn = connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_CHARSET);
$bigtabledata = db_select($conn, 'bbs_bigtable', 'bid,name', null, 'orderby');
$nowdata = date('y-m-d h:i:s', time());
session_start();
