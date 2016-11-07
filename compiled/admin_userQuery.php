<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="admin/css/bootstrap-responsive.css"/>
    <link rel="stylesheet" type="text/css" href="admin/css/style.css"/>
    <script type="text/javascript" src="admin/js/jquery2.js"></script>
    <script type="text/javascript" src="admin/js/jquery2.sorted.js"></script>
    <script type="text/javascript" src="admin/js/bootstrap.js"></script>
    <script type="text/javascript" src="admin/js/ckform.js"></script>
    <script type="text/javascript" src="admin/js/common.js"></script>

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
        <th>锁定用户</th>

        <th>删除用户</th>
    </tr>
    </thead>
    <?php if (is_array($data)) {
        foreach ($data AS $key => $value) { ?>
            <tr>


                <td>
                    <a href="admin_userEdit.php?id=<?php echo $value['username']; ?>"><?php echo $value['username']; ?></a>
                </td>

                <td><?php echo $value['email']; ?></td>
                <td><?= TimeDb($value['regtime'], 0) ?></td>

                <td>
                    <a href="admin_userLock.php?allowlogin=<?php echo $value['allowlogin']; ?>&id=<?php echo $value['uid']; ?>">
                        <button type="submit">锁定</button>
                    </a><?php if ($value['allowlogin'] == 1 || $value['bancount'] >= 5) { ?>
                        <?php echo $suoding; ?>
                    <?php } ?></td>
                <td><a href="deletecheck.php?id=<?php echo $value['uid']; ?>">
                        <button type="submit">删除</button>
                    </a></td>

            </tr>
        <?php }
    } ?>
    <tr>
        <td colspan="5"><?= fpage($count, 10, [0, 1, 2, 3, 4, 6, 7, 8]); ?></td>
    </tr>
</table>

</body>
</html>
