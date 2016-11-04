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
<font color="#777777"><strong>站点信息：</strong></font>
<form action="#" method="post" class="definewidth m20" enctype="multipart/form-data">
    <table style="margin-left:10px;margin-top:3px;">
        <tr>
            <td>站点名称：</td>
            <td><input type="text" name="WEB_NAME" style="height: 20px;width:400px;"
                       placeholder='<?php echo $webname; ?>' value="<?php echo $webname; ?>"/></td>
        </tr>
        <tr>
            <td>网站名称</td>
            <td><input type="text" name="WEB_BTM" style="height: 20px;width:400px;" placeholder='<?php echo $webbtm; ?>'
                       value="<?php echo $webbtm; ?>"/></td>
        </tr>
        <tr>
            <td>网站备案信息代码:</td>
            <td><input type="text" name="WEB_ICP" style="height: 20px;width:400px;" placeholder='<?php echo $webicp; ?>'
                       value="<?php echo $webicp; ?>"/></td>
        </tr>
        <tr>
            <td><input type="hidden" name="buttom" value="true"></td>
            <td>
                <button style="margin-left:5px;" type="submit" class="btn btn-primary">
                    保&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp存
                </button>
                &nbsp;&nbsp;
            </td>
        </tr>
    </table>
</form>

</body>
</html>


