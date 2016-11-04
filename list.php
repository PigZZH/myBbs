<?php
include 'common/common.php';

/*设置每一页显示帖子的数量*/
$pagesize = 10;
/*获取传入的值*/
$page = empty($_GET['page']) ? 1 : (int)$_GET['page'];
$cid = empty($_GET['classid']) ? 1 : (int)$_GET['classid'];


/*
 * 蚂蚁线数据查询*/
$hmy1 = $bid = select_returnone($conn, 'bbs_category', 'parentid', "cid=$cid");
$my1 = select_returnone($conn, 'bbs_bigtable', 'name', "bid=$bid");
$my2 = select_returnone($conn, 'bbs_category', 'classname', "cid = $cid");
$title = "$my2" . '-' . WEB_NAME;
/*
 * 查询所有的子版块*/
$files = ['cid', 'classname', 'parentid'];
$zdata = db_select($conn, 'bbs_category', $files);
/*
 * 查询所有的母板块*/
$fails = ['cid', 'classname'];
$mdata = db_select($conn, 'bbs_bigtable', 'bid,name');
/*
 * 子版块的帖子数*/
$tznum = db_select($conn, 'bbs_details', 'count(id) as n', "tid=$cid");
/*
 * 分頁*/
if (isset($_REQUEST['classid'])) {
    $classid = $_REQUEST['classid'];
} else {
    $classid = 1;
}
/*查询今日的帖子*/
//获取当天的年份
$y = date("Y");
//获取当天的月份
$m = date("m");
//获取当天的号数
$d = date("d");
//将今天开始的年月日时分秒，转换成unix时间戳(开始示例：2015-10-12 00:00:00)
$todayTime = mktime(0, 0, 0, $m, $d, $y);
//$todayTime即是当天零点的时间戳
$todaycount = select_returnone($conn, 'bbs_details', 'count(id) as c', "addtime>$todayTime and tid =$cid");
/*查询当前板块的版主*/
$bz = select_returnone($conn, 'bbs_category', 'banzhuid', "cid=$cid");
/*判断是否为精品贴*/
if (isset($_GET['elite'])) {
    $elite = (int)$_GET['elite'];
    $linkelite = "&elite=$elite";

    $sql = "select count(*) as c from bbs_details where tid=$classid and style=$elite";
    $result = mysqli_query($conn, $sql);
    $countArray = mysqli_fetch_assoc($result);
    $count = ceil($countArray['c'] / $pagesize);
    if ($page > $count) {
        $page = $count;
    } else if ($page < 1) {
        $page = 1;
    }
    $offset = ($page - 1) * $pagesize;
    $realoffset = $offset + 1;
    $fails1 = ['authorid', 'title', 'id', 'addtime', 'style', 'price', 'zhiding', 'gaoliang'];
    $data = db_select($conn, 'bbs_details', $fails1, "tid=$classid and style=$elite and del<>1", 'addtime ', "$offset,$pagesize");
    $prev = ($page == 1) ? 1 : ($page - 1);
    $next = ($page == $count) ? $count : ($page + 1);
} else {

    $sql = "select count(*) as c from bbs_details where tid=$classid";
    $result = mysqli_query($conn, $sql);
    $countArray = mysqli_fetch_assoc($result);
    $count = ceil($countArray['c'] / $pagesize);
    if ($page > $count) {
        $page = $count;
    } else if ($page < 1) {
        $page = 1;
    }
    $offset = ($page - 1) * $pagesize;
    $realoffset = $offset + 1;
    $fails1 = ['authorid', 'title', 'id', 'addtime', 'style', 'price', 'zhiding', 'gaoliang'];
    $data = db_select($conn, 'bbs_details', $fails1, "tid=$classid and del<>1", 'zhiding desc,addtime desc', "$offset,$pagesize");
    $prev = ($page == 1) ? 1 : ($page - 1);
    $next = ($page == $count) ? $count : ($page + 1);
}
/*
 * 帖子的回復數*/
$reply = db_select($conn, 'bbs_replay', 'tid,count(tid) as c', "cid=$cid group by tid");
if ($reply) {
    $relano = array();
    foreach ($reply as $k => $v) {
        /*$rela = array("$v['cid']" => "$v['c']");*/
        $a = $v['c'];
        $b = $v['tid'];
        $relano[$b] = $a;
    }
}

/*
 * 帖子的查看数*/
$chakan = db_select($conn, 'bbs_details', 'id,count', "tid=$cid");
if ($chakan) {
    foreach ($chakan as $ckvalue) {
        $a = $ckvalue['id'];
        $b = $ckvalue['count'];
        $ckno[$a] = $b;
    }
}

include template('list.html');

