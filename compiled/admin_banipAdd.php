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
    <script type="text/javascript" src="admin/js/jquerypicture.js"></script>

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
<body><br>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<font color="#777777"><strong>添加IP：</strong></font>
<form action="admin_ipQuery.php" method="get" class="definewidth m20" enctype="multipart/form-data">
    <table style="margin-left:10px;margin-top:3px;">
        <tr>
            <td>IP地址：</td>
            <td><input type="text" name="name[]"/><input type="text" name="name[]"/><input type="text"
                                                                                           name="name[]"/><input
                    type="text" name="name[]"/></td>
        </tr>
        <tr>
            <td>封禁时间(天)：</td>
            <td><input type="text" name="time" style="width:400px;" placeholder='不输入为无限期'/></td>
            <input type="hidden" name="add" value="1"/>
        </tr>

        <tr>
            <td></td>
            <td>
                <button style="margin-left:5px;" type="submit" class="btn btn-primary" type="button">
                    保&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp存
                </button>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-success" name="backid" id="backid"><a href="admin_classShow.php">
                        返回列表</a></button>
            </td>
        </tr>
    </table>
</form>

</body>
</html>


