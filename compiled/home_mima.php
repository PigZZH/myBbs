<?php include template("head.html"); ?>
<html>
<head>
    <title>个人资料</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/home_mima.css"/>
</head>
<body>
<div class="main">
    <div class="myx"></div>
    <div class="shezhi">
        <div class="left">
            <div class="leftOne">设 置</div>
            <div class="leftTwo"><a href="home_tx.php">修改头像</a></div>
            <div class="leftThree"><a href="home.php">个人资料</a></div>
            <div class="leftFour"><a href="home_graph.php">个性签名</a></div>
            <div class="leftFive"><a href="home_mima.php">密码安全</a></div>
        </div>
        <div class="right">
            <div class="rightOne">您必须填写旧密码才能修改下列内容</div>
            <form action="changepwd.php" method="post">
                <div class="rightTwo">
                    <div class="ipt">旧密码&nbsp;&nbsp;&nbsp;<input type="password" name="opwd"/></div>
                    <div class="ipt">新密码&nbsp;&nbsp;&nbsp;<input type="password" name="npwd"/></div>
                    <div class="ipt">确认密码&nbsp;&nbsp;<input type="password" name="rnpwd"/></div>
                    <div class="ipt">Email &nbsp;&nbsp;&nbsp;<input type="email" name="email"/></div>
                </div>
                <input type="submit" name="upa"/>
            </form>
        </div>
    </div>
</div>
</body>
</html>