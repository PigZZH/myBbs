<!DOCTYPE html>
<html>
<head>
    <link href="js/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="Css/bootstrap-responsive.css"/>
    <link rel="stylesheet" type="text/css" href="Css/style.css"/>
    <script type="text/javascript" src="Js/jquery.js"></script>
    <script type="text/javascript" src="Js/jquery.sorted.js"></script>
    <script type="text/javascript" src="Js/bootstrap.js"></script>
    <script type="text/javascript" src="Js/ckform.js"></script>
    <script type="text/javascript" src="Js/common.js"></script>
    <script type="text/javascript" src="js/showdate.js"></script>
    <style type="text/css">
        body {
            font-size: 20px;
            padding-bottom: 40px;
            background-color: #e9e7ef;
            font-size: 17px;
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
<h3><strong>基本信息：</strong></h3>
<form action="admin_userEditQ.php" method="post">
    <table class="table table-condensed">

        <tr>
            <td width="18%" height="30" align="center">用 户 名：</td>
            <td width="82%" class="word_grey"><input type="text" name="username" value="<?= $data[0]['username'] ?>">
            </td>

        </tr>
        <tr>
            <td width="18%" height="30" align="center">真实姓名：</td>
            <td width="82%" class="word_grey"><input type="text" name="realname" value="<?= $data[0]['realname'] ?>">
            </td>
        </tr>

        <tr>
            <td height="28" align="center">用户类型：</td>
            <td height="28"><select name="udertype">
                    <option value="0">普通用户</option>
                    <option value="1">管理员</option>

                </select></td>
        </tr>
        <tr>
            <td height="28" align="center">E-mail：</td>
            <td height="28"><input type="email" name="email" value="<?= $data[0]['email'] ?>"></td>
        </tr>
        <tr>
            <td height="28" align="center">金币数：</td>
            <td height="28"><input type="text" name="grade" value="<?= $data[0]['grade'] ?>"></td>
        </tr>


        <tr>
            <td height="28" align="center"></td>
            <td height="28"><input type="submit" name="person" value="提交修改"></td>
        </tr>
    </table>
</form>
<h3><strong>操作记录：</strong><br></h3>
&nbsp;&nbsp;&nbsp;&nbsp;<strong>浏览记录：</strong>

<table class="table table-condensed">
    <tr>
        <td class="word_grey">最后登录时间 &nbsp;</td>

    </tr>

    <tr>

        <td class="word_grey"><?= TimeDb($data[0]['lasttime'], 1) ?></td>

    </tr>

</table>
<!--/////////////////////////////////////-->

<!--/////////////////////////////////////-->

<h3><strong>已发主题：</strong></h3>
<table class="table table-condensed">


    <tr>

        <td class="word_grey"> &nbsp;&nbsp; &nbsp;&nbsp;</td>

        <td class="word_grey">主题ID &nbsp;&nbsp; &nbsp;&nbsp;</td>
        <td class="word_grey">标题 &nbsp;&nbsp; &nbsp;&nbsp;</td>
        <td class="word_grey">发表时间</td>
        <td class="word_grey">删除 &nbsp;&nbsp; &nbsp;&nbsp;</td>
        <!--<td class="word_grey"><a><button>删除</button></a></td>-->
    </tr>
    <?php if ($data1) {
        foreach ($data1 as $key => $value) { ?>
            <tr>
                <td class="word_grey"> &nbsp;&nbsp; &nbsp;&nbsp;</td>
                <td class="word_grey"><?= $value['id'] ?></td>
                <td class="word_grey"><a target="_blank"
                                         href="detail.php?id=<?php echo $value['id']; ?>"><?= $value['title'] ?></a>
                </td>
                <td class="word_grey"><?= TimeDb($value['addtime']) ?></td>
                <td class="word_grey"><?php if ($value['del']) { ?><a
                        href="disposetz.php?tid=<?php echo $value['id']; ?>&del=0">
                            <button type="submit">取消删除</button></a><?php } else { ?><a
                        href="disposetz.php?tid=<?php echo $value['id']; ?>&del=1">
                            <button type="submit">删除</button></a><?php } ?></td>
            </tr>

        <?php }
    } ?>
</table>
<!--/////////////////////////////////////-->
<h3><strong>已发回复：</strong></h3>
<table class="table table-condensed">


    <tr>
        <td class="word_grey">主题ID &nbsp;&nbsp; &nbsp;&nbsp;</td>
        <td class="word_grey">内容</td>
        <td class="word_grey">操作时间 &nbsp;&nbsp; &nbsp;&nbsp;</td>
        <td class="word_grey"><a>
                <button>删除</button>
            </a></td>
    </tr>
    <?php if (is_array($data2)) {
        foreach ($data2 AS $key => $value) { ?>
            <tr>
                <td class="word_grey"><?php echo $value['id']; ?></td>
                <td class="word_grey"><?php echo $value['content']; ?></td>
                <td class="word_grey"><?php echo TimeDb($value['createtime']); ?></td>
                <td class="word_grey"><?php if ($value['del']) { ?><a
                        href="disposetz.php?rid=<?php echo $value['id']; ?>&del=0">
                            <button type="submit">取消删除</button></a><?php } else { ?><a
                        href="disposetz.php?rid=<?php echo $value['id']; ?>&del=1">
                            <button type="submit">删除</button></a><?php } ?></td>
            </tr>
        <?php }
    } ?>
</table>

</table>
</body>
</html>
