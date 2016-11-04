<?php include template("head.html"); ?>
<html>
<head>
    <title>个人资料</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/home.css"/>
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
            <div class="rightOne">基本资料</div>
            <form action="home.php" method="post">
                <div class="rightTwo">
                    <div class="ipt">
                        用户名&nbsp;&nbsp;<input type="text" name="name" value="<?php echo $username; ?>" disabled="true"/>
                    </div>
                    <div class="ipt">
                        真实姓名&nbsp;<input type="text" name="realname" value="<?php echo $realname; ?>"/>
                    </div>
                    <div class="ipt">
                        性别&nbsp;&nbsp;&nbsp;<input type="radio" name="sex" value="1" id="man"/><label
                            for="man">男</label>
                        <input type="radio" name="sex" value="0" id="wan"/><label for="wan">女</label>
                    </div>
                    <div class="ipt">
                        生日&nbsp;&nbsp;&nbsp;<input type="date" value="<?php echo $birthday; ?>" name="birthday"/>
                    </div>
                    <div class="ipt">
                        QQ号码&nbsp;&nbsp;<input type="text" name="qq" value="<?php echo $qq; ?>"/>
                    </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="person" value="提交"/>
            </form>
        </div>
    </div>
</div>
</body>
</html>
