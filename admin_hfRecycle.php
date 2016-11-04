<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-26
 * Time: 16:41
 */
include './common/common.php';

if (!isset($_SESSION['admin_uid'])) {
    echo "<script>alert('操作非法');window.location='admin_login.php';</script>";

}
//设置每页显示的数量
$limit = 10;
//查询所有主题帖的信息
$data = db_select($conn, 'bbs_details as d ,bbs_replay as r', 'r.id as rid,r.content,r.uid,r.tid,d.title,d.id,r.del', 'd.id=r.tid and r.del<>0', null, setLimit($limit));

//查询所有主题帖的数量
$cdata = db_select($conn, 'bbs_replay', 'count(id) as c', 'del<>0');
$count = $cdata[0]['c'];
include template("admin_hfShow.html");

/*
select star.name, goods.name from star, goods where star.gid=goods.id
select r.id,r.content,r.uid,r.tid,d.title,d.id from bbs_details as d ,bbs_replay as r where d.id=r.tid;*/
