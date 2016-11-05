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
        <th>大板块名称</th>
        <th>查看小板块</th>
        <th>小板块管理</th>
        <th>排序</th>
        <th>修改</th>
        <th>删除</th>
    </tr>
    </thead>

    <?php if(is_array($biddata)){foreach($biddata AS $key=>$value) { ?>

    <form action="admin_classQuery.php" method="get">
        <tr>
            <td><input type="text" name="name" value="<?php echo $value['name']; ?>"></td>
            <td><select>
                <?php if($data){?>
                <?php if(is_array($data)){foreach($data AS $k=>$v) { ?>
                <?php if($value['bid']==$v['parentid']){?>
                <option/>
                &nbsp;<?php echo $v['classname']; ?></option>
                <?php }?>
                <?php }}?>
                <?php }?>
            </select>
            </td>
            <td>
                <button><a href="admin_subjectShow.php?parentid=<?php echo $value['bid']; ?>">管理小板块</a></button>
            </td>
            <td>
                <input type="text" name="orderby" value="<?php echo $value['orderby']; ?>"><input type="hidden" name="bid"
                                                                                     value="<?php echo $value['bid']; ?>"/>
            </td>

            <td>
                <!--<button type="submit"><a href="classUpdate.html">修改</a></button>-->
                <input type="submit" name="xiugai" value="修改"/>
            </td>
            <td>
                <a href="admin_classQuery.php?del=1&bid=<?php echo $value['bid']; ?>">删除</a>
            </td>

        </tr>
    </form>


    <?php }}?>

</table>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" id="addnew">
    <a href="admin_classAdd.php">添加大板块</a>
</button>
</body>
</html>
