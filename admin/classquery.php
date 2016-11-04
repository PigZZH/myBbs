<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-30
 * Time: 20:31
 */
include '../common/common.php';
{
    $value['id']}
$biddata = db_select($conn, 'bbs_bigtable', '*', null, 'orderby desc');

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css"
          href="Css/bootstrap-responsive.css"/>
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
        <th>大类名称</th>
        <th>查看小类</th>
        <th>小类管理</th>
        <th>排序</th>
        <th>修改</th>
        <th>删除</th>
    </tr>
    </thead>
    <?php foreach ($biddata as $key => $value) {
        $bid = $value['bid'];
        ?>


        <tr>
            <td><?= $value['name'] ?></td>
            <td><select>
                    <?php $data1 = db_select($conn, 'bbs_category', 'banzhuid,cid,classname,orderby', "parentid = $bid");
                    foreach ($data1 as $k => $v) {
                        ?>
                        <option/>&nbsp;<?= $v['classname'] ?></option>
                    <?php } ?>
                </select>
            </td>
            <td>
                <button type="submit"><a href="subjectQuery.html">管理小类</a></button>
            </td>
            <td>
                <input type="text" value="<?= $value['orderby'] ?>">
            </td>

            <td>
                <button type="submit"><a href="classUpdate.html">修改</a></button>
            </td>
            <td>
                <button type="submit">删除</button>
            </td>

        </tr>
    <?php } ?>

</table>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" id="addnew">
    <a href="classAdd.html">添加大类</a>
</button>
</body>
</html>
