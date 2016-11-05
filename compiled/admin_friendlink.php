<!DOCTYPE html>
<html>
<head>
    <title>1</title>
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
<form class="form-inline definewidth m20" action="#" method="post">
    <font color="#777777"><strong>友情链接：</strong></font>
    <button type="button" id="addnew"><a href="admin_linkAdd.php">添加链接</a></button>
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

    <?php if($data){?>
    <?php if(is_array($data)){foreach($data AS $kye=>$value) { ?>
    <tr>
        <form action="admin_friendlink.php?linkid=<?php echo $value['id']; ?>&xiugai=1>" method="post">
            <td><input type='text' name="name" value="<?php echo $value['name']; ?>"></td>
            <td><input type='text' name='link' value="<?php echo $value['link']; ?>"></td>
            <td><input type='text' name="orderby" value="<?php echo $value['orderby']; ?>"></td>
            <td><input type="submit" value="修改"></td>
        </form>
        <td><a href="admin_friendlink.php?linkid=<?php echo $value['id']; ?>&delete=1">
            <button>删除</button>
        </a></td>

    </tr>
    <?php }}?>
    <?php }?>
    <tr>

    </tr>

</table>


</body>
</html>
