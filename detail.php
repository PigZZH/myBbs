<?php

include 'common/common.php';
/*数据库连接*/

$id = $_GET['id'];
/*查看数增加*/
db_update($conn, 'bbs_details', 'count = count +1', "id = $id");
/*每页显示的数量*/

$pagesize = 10;
/*分页查询出帖子的回复*/
$page = empty($_GET['page']) ? 1 : (int)$_GET['page'];
$sql = "select count(*) as c from bbs_replay where tid=$id";
$result = mysqli_query($conn, $sql);
$countArray = mysqli_fetch_assoc($result);
$count = ceil(($countArray['c'] + 1) / $pagesize);
$prev = ($page == 1) ? 1 : ($page - 1);
$next = ($page == $count) ? $count : ($page + 1);
if ($page > $count) {
    $page = $count;
} else if ($page < 1) {
    $page = 1;
}
/*蚂蚁线开始*/
/*查询帖子的tid*/
$cid = select_returnone($conn, 'bbs_details', 'tid', "id=$id");
/*查询母板块的id*/
$bid = select_returnone($conn, 'bbs_category', 'parentid', "cid=$cid");
/*查询母板块的名字*/
$bname = select_returnone($conn, 'bbs_bigtable', 'name', "bid=$bid");
/*查询子版块的名字*/
$zname = select_returnone($conn, 'bbs_category', 'classname', "cid=$cid");
/*查询帖子的名字*/
$tzname = select_returnone($conn, 'bbs_details', 'title', "id=$id");
/*蚂蚁线结束*/
/*帖子的查看数*/
$cknum = select_returnone($conn, 'bbs_details', 'count', "id=$id");
/*帖子的回复数*/
$hfnum = select_returnone($conn, 'bbs_replay', 'count(id)', "tid=$id");
/*如果是第一頁的分頁*/
$flag = 1;
if ($page == 1) {
    $offset = ($page - 1) * $pagesize;
    $pages = $pagesize - 1;
    /*查詢樓主的帖子*/
    $fils = ['authorid', 'title', 'content', 'addtime', 'price'];
    $data = db_select($conn, 'bbs_details', $fils, "id=$id");

    if ($data) {
        foreach ($data as $key => $value) {
            $arid = $value['authorid'];
            $title = $value['title'];
            $content = $value['content'];
            $addtime = $value['addtime'];
            $price = $value['price'];
        }
        /*查询下一个主题*/
        $nextid = db_select($conn, 'bbs_details', 'id', "addtime<$addtime and tid = $cid", 'addtime desc', 1);
        /*设置发送时间*/
        $sendtime = Lasttime($addtime, 1);
        /*判断是否购买过这个帖子*/
        if ($price > 0 && isset($_SESSION['uid'])) {
            $uid = $_SESSION['uid'];
            $judge = db_select($conn, 'bbs_order', 'oid', "uid=$uid and tid=$id");

        }

    }
    /*var_dump($data);*/
    /*发表时间*/

    $fils1 = ['content', 'createtime', 'uid', 'id'];
    /*查询第一页的回帖信息*/
    $data2 = db_select($conn, 'bbs_replay', $fils1, "tid=$id and del<>1", 'createtime', "$offset,$pages");
} else {
    $offset = ($page - 1) * $pagesize - 1;

    $fils1 = ['content', 'createtime', 'uid', 'id'];
    /*查询其他页面的回帖信息*/
    $data2 = db_select($conn, 'bbs_replay', $fils1, "tid=$id and del<>1", 'createtime', "$offset,$pagesize");

}

/*共有多少页*/
$totalpage = $countArray['c'] + 1;
/*判断多少到多少页*/
$foffset = $offset + 1;
$soffset = $offset + 2;
/*沙发板凳楼层*/
if ($page == 1) {
    for ($i = 0; $i < $pagesize - 1; $i++) {
        $data2[$i]['louceng'] = $i + 2;
    }
} else {
    for ($i = 0; $i < $pagesize; $i++) {
        $data2[$i]['louceng'] = $i + 1 + $pagesize * ($page - 1);
    }
}


include template('detail.html');