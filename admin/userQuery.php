<?php
include "../common/common.php";
$conn = connect(DB_HOST, DB_USER, DB_PWD, DB_NAME, DB_CHARSET);
if (isset($_GET['menuname'])) {
    $select = $_GET['menuname'];
    $data = db_select($conn, 'bbs_user', '*', "username like '%$select%' or email like '%$select%' ", null, setLimit(10));
    $count = select_returnone($conn, 'bbs_user', 'count(uid) as count', "username like '%$select%' or email like '%$select%'");
} else {
    $data = db_select($conn, 'bbs_user', '*', null, 'uid desc', setLimit(10));
    $count = select_returnone($conn, 'bbs_user', 'count(uid) as count');
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
    <font color="#777777"><strong>用户名：</strong></font>
    <input type="text" name="menuname" id="menuname" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
    <a href="">
        <button type="submit" class="btn btn-primary">查询</button>
    </a>
    <button type="button" id="addnew"><a href="teachersAdd.html">添加用户</a></button>
</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>

        <th>用户名</th>

        <th>Email</th>

        <th>创建时间</th>

        <th>删除用户</th>
    </tr>
    </thead>
    <?php foreach ($data as $key => $value) { ?>
        <tr>


            <td><a href="useredit.php?id=<?= $value['uid'] ?>"><?= $value['username'] ?></a></td>

            <td><?= $value['email'] ?></td>
            <td><?= TimeDb($value['regtime'], 0) ?></td>

            <td><a href="lockuser.php?allowlogin=<?= $value['allowlogin'] ?>&id=<?= $value['uid'] ?>">
                    <button type="submit">锁定</button>
                </a><?php if ($value['allowlogin'] == 1) {
                    echo '已锁定';
                } ?></td>
            <td><a href="deletecheck.php?id=<?= $value['uid'] ?>">
                    <button type="submit">删除</button>
                </a></td>

        </tr>
    <?php }
    ?>
    <tr>
        <td colspan="5"><?= fpage($count, 10, [0, 1, 2, 3, 4, 6, 7, 8]); ?></td>
    </tr>
</table>

</body>
</html>
