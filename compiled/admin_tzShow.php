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
        <th>发帖人</th>
        <th>加精</th>
        <th>高亮</th>
        <th>置顶</th>
        <th>删除</th>
    </tr>
    </thead>
    <?php if (is_array($data)) {
        foreach ($data AS $key => $value) { ?>
            <tr>
                <td width="200"><a target="_blank"
                                   href="detail.php?id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a>
                </td>
                <td><?php echo $value['authorid']; ?></td>
                <td><?php if ($value['style']) { ?> <a href="disposetz.php?tid=<?php echo $value['id']; ?>&amp;style=0">
                            取消精华</a><?php } else { ?><a
                        href="disposetz.php?tid=<?php echo $value['id']; ?>&amp;style=1">加精</a><?php } ?></td>
                <td><?php if ($value['zhiding']) { ?> <a
                        href="disposetz.php?tid=<?php echo $value['id']; ?>&amp;zhiding=0">取消置顶</a><?php } else { ?><a
                        href="disposetz.php?tid=<?php echo $value['id']; ?>&amp;zhiding=1">置顶</a><?php } ?></td>
                <td><?php if ($value['gaoliang']) { ?> <a
                        href="disposetz.php?tid=<?php echo $value['id']; ?>&amp;gaoliang=0">取消高亮</a><?php } else { ?><a
                        href="disposetz.php?tid=<?php echo $value['id']; ?>&amp;gaoliang=1">高亮</a><?php } ?></td>
                <td><?php if ($value['del']) { ?> <a href="disposetz.php?tid=<?php echo $value['id']; ?>&amp;del=0">
                            取消删除</a><?php } else { ?><a href="disposetz.php?tid=<?php echo $value['id']; ?>&amp;del=1">
                            删除</a><?php } ?></td>
            </tr>

        <?php }
    } ?>
    <tr></tr>

</table>
<?= fpage($count, $limit, [0, 1, 2, 3, 4, 6, 7, 8]); ?>

</body>

</html>
