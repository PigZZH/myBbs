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

    <?php if ($data){ ?>
        <?php if (is_array($data)) {
            foreach ($data AS $key => $value) { ?>
                <tr>
                    <td> <?php echo $value['uid']; ?></td>
                    <td> <?php echo $value['username']; ?></td>
                    <td> <?php echo $value['email']; ?></td>
                    <td>
                        <a href="admin_userBancheck.php?allowlogin=<?php echo $value['uid']; ?>&id=<?php echo $value['uid']; ?>">
                            <button type="submit">解封</button>
                        </a></td>
                </tr>
            <?php }
        } ?>

    <?php } else { ?>
    <tr>
        <td>无此数据</td>
    <tr><?php } ?>

</table>

</body>
</html>

