<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css"
          href="admin/css/bootstrap-responsive.css"/>
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

        @media ( max-width: 980px) {
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
    <font color="#777777"><strong>帖子信息：</strong></font>

</form>
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>帖子标题</th>
        <th>回复内容</th>
        <th>发帖人</th>
        <th>删除</th>
    </tr>
    </thead>
    <?php if (is_array($data)) {
        foreach ($data AS $key => $value) { ?>
            <tr>
                <td><a href="detail.php?id=<?php echo $value['id']; ?>"
                       target="_blank"><?php echo $value['title']; ?></a></td>
                <td width="200">
                    <pre><?php echo $value['content']; ?></pre>
                </td>
                <td><?php echo $value['uid']; ?></td>
                <td><?php if ($value['del']) { ?> <a href="disposetz.php?rid=<?php echo $value['rid']; ?>&amp;del=0">
                            取消删除</a><?php } else { ?><a href="disposetz.php?rid=<?php echo $value['rid']; ?>&amp;del=1">
                            删除</a><?php } ?></td>
            </tr>

        <?php }
    } ?>
    <tr></tr>

</table>
<?php echo fpage($count, $limit, [0, 1, 2, 3, 4, 6, 7, 8]);; ?>

</body>

</html>
