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

<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>名称</th>
        <th>排序</th>
        <th>版主</th>
        <th>修改</th>
        <th>删除</th>
    </tr>
    </thead>


    <?php if (is_array($data)) {
        foreach ($data AS $key => $v) { ?>

            <form action="admin_subjectQuery.php" method="get">
                <tr>
                    <td><input type="text" name="name" value="<?php echo $v['classname']; ?>"></td>

                    <td>
                        <input type="text" name="orderby" value="<?php echo $v['orderby']; ?>">
                    </td>
                    <td>
                        <input type="text" name="banzhuid" value="<?php echo $v['banzhuid']; ?>">
                    </td>
                    <input type="hidden" name="cid" value="<?php echo $v['cid']; ?>"/>
                    <td>
                        <!--<button type="submit"><a href="classUpdate.html">修改</a></button>-->
                        <input type="submit" name="xiugai" value="修改"/>
                    </td>
                    <td>
                        <a href="admin_subjectQuery.php?del=1&cid=<?php echo $v['cid']; ?>">删除</a>
                    </td>

                </tr>
            </form>
        <?php }
    } ?>

</table>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" id="addnew">
    <a href="admin_subjectAdd.php?parentid=<?php echo $pid; ?>">添加小版块</a>
</button>
</body>
</html>
