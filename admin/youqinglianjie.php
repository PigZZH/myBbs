<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-30
 * Time: 14:50
 */
include '../common/common.php';
{
    $value['id']}
$data = db_select($conn, 'bbs_friendlovelink', '*', null, 'id asc');
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
<form class="form-inline definewidth m20" action="#" method="post">
    <font color="#777777"><strong>友情链接：</strong></font>
    <button type="button" id="addnew"><a href="linkadd.php">添加链接</a></button>
</form>

<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>

        <th>链接名称</th>
        <th>链接地址</th>
        <th>链接排序</th>
        <th>修改</th>
        <th>删除</th>
    </tr>
    </thead>
    <?php
    if ($data) {
        foreach ($data as $kye => $value) {
            ?>

            <tr>
                <form action="linkupadaecheck.php?linkid=<?= $value['id'] ?>" method="post">
                    <td><input type='text' name="name" value="<?= $value['name'] ?>"></td>
                    <td><input type='text' name='link' value="<?= $value['link'] ?>"></td>
                    <td><input type='text' name="orderby" value="<?= $value['orderby'] ?>"></td>
                    <td><input type="submit" value="修改"></td>
                </form>
                <td><a href="linkdelete.php?linkid=<?= $value['id'] ?>">
                        <button>删除</button>
                    </a></td>

            </tr> <?php
        }
    } ?>
    <tr>

    </tr>

</table>


</body>
</html>
