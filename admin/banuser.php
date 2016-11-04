<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-30
 * Time: 9:01
 */
include '../common/common.php';
$conn = connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_CHARSET);

if (isset($_GET['menuname'])) {
    $select = $_GET['menuname'];
    $data = db_select($conn, 'bbs_user', '*', "uid like '%$select%' or username like '%$select%' or email like '%$select%' and allowlogin=1", null, setLimit(5));
    $count = select_returnone($conn, 'bbs_user', 'count(uid) as count', "username like '%$select%' or email like '%$select%' and allowlogin=1");
} else {
    $data = db_select($conn, 'bbs_user', 'uid,username,email', 'allowlogin = 1', null, setLimit(5));
    $count = select_returnone($conn, 'bbs_user', 'count(uid) as count', 'allowlogin=1');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="Css/bootstrap-responsive.css"/>
    <link rel="stylesheet" type="text/css" href="Css/style.css"/>
    <script type="text/javascript" src="Js/jquery2.js"></script>
    <script type="text/javascript" src="Js/jquery2.sorted.js"></script>
    <script type="text/javascript" src="Js/bootstrap.js"></script>
    <script type="text/javascript" src="Js/ckform.js"></script>
    <script type="text/javascript" src="Js/common.js"></script>

    <style type="text/css">
        body {
            font-size: 20px;
            padding-bottom: 40px;
            background-color: #e9e7ef;
        }

        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }


    </style>
</head>
<body>
<form class="form-inline definewidth m20" action="#" method="get">
    <font color="#777777"><strong>请输入用户名称：</strong></font>
    <input type="text" name="menuname" id="menuname" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>
    &nbsp;&nbsp;
</form>
<table class="table table-bordered table-hover definewidth m5">
    <thead>
    <tr>
        <th>用户ID</th>
        <th>用户名</th>

        <th>邮箱</th>

        <th>解锁</th>
    </tr>
    </thead>

    <?php
    if ($data && $count) {
        foreach ($data as $key => $value) { ?>
            <tr>
                <td> <?= $value['uid'] ?></td>
                <td> <?= $value['username'] ?></td>
                <td> <?= $value['email'] ?></td>
                <td><a href="bancheck.php?allowlogin=<?= $value['uid'] ?>&id=<?= $value['uid'] ?>">
                        <button type="submit">解封</button>
                    </a></td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="5"><?= fpage($count, 5, [0, 1, 2, 3, 4, 6, 7, 8]); ?></td>
        </tr>
    <?php } else {
        echo '<tr><td>无此数据</td><tr>';
    } ?>

</table>

</body>
</html>

