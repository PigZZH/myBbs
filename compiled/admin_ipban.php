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
        <th>IP</th>

        <th>解封时间</th>
        <th>解封</th>
    </tr>
    </thead>

    <?php if (is_array($data)) {
        foreach ($data AS $key => $value) { ?>
            <form action="admin_ipQuery.php" method="get">
        <tr>
            <th><?php echo long2ip($value['ip']); ?></th>
            <th><?php echo date("Y/m/d h:i:s", $value['time']); ?></th>
            <th><input type="submit" name="submit" value="解封"></th>
            <INPUT type="HIDDEN" NAME="ip" VALUE="<?php echo $value['ip']; ?>">
        </tr>
    </form>

        <?php }
    } ?>
</table>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button type="button" id="addnew">
    <a href="admin_banipAdd.php">添加封锁ip</a>
</button>
</body>
</html>
