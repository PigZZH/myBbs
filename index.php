<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-22
 * Time: 20:15
 */
include 'common/common.php';
$file = ['classname', 'replycount', 'motifcount', 'cid', 'parentid', 'banzhuid'];
$files = ['bid', 'name'];
/*判断是否指定显示母模块*/
$title = '首页' . '-' . WEB_NAME;
if (isset($_GET['bigid'])) {
    $bigid = $_GET['bigid'];
    $bdata = db_select($conn, 'bbs_bigtable', $files, "bid=$bigid order by orderby");

} else {
    $bigid = null;
    $bdata = db_select($conn, 'bbs_bigtable', $files, null, 'orderby');
}
//友情链接数据库
$ydata = db_select($conn, 'bbs_friendlovelink', 'name,link', null, 'orderby desc');
/*$bdata= db_select($conn.'bbs_bigtable',$files,"bid=1");*/
/*查询总帖子数*/
$tiezishu = select_returnone($conn, 'bbs_details', 'count(id)');
/*查询会员数*/
$huiyuanshu = select_returnone($conn, 'bbs_user', 'count(uid)');
/*查询新注册的会员*/
$newuser = select_returnone($conn, 'bbs_user', 'username', null, 'regtime desc');
/*查询出所有的子板块*/
$data = db_select($conn, 'bbs_category', $file, null, 'orderby');
/*统计每个模块回复数*/
$replayno = db_select($conn, 'bbs_replay group by cid', 'cid ,count(cid) as c');
//本版块内最后发表的数据
/*$zdata = db_select($conn,'bbs_details group by tid','max(addtime),id,addtime,authorid,title,tid');
foreach($zdata as $zkey => $zvalue){
    $zdel[$zkey] = $zvalue['tid'];
    $zdel[$zkey][]
}*/

$rela = array();
if (is_array($replayno)) {
    foreach ($replayno as $k => $v) {
        /*$rela = array("$v['cid']" => "$v['c']");*/
        $a = $v['c'];
        $b = $v['cid'];
        $rela[$b] = $a;
    }
}
/*统计每个模块的帖子数*/
$detailno = db_select($conn, 'bbs_details group by tid', 'tid,count(tid) as t');
if (is_array($detailno)) {
    foreach ($detailno as $detaval) {
        $deal[$detaval['tid']] = $detaval['t'];
    }
}
include template("index.html");
