<?php include template("head.html"); ?>
<head>
    <title>个人资料</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="./css/home_tx.css"/>
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
            <div class="rightOne">当前头像</div>
            <div class="rightTwo"><img src="<?php echo $picturelink; ?>"></div>
            <div class="rightOne">设置我的新头像</div>
            <form action="txupload.php" method="post" enctype="multipart/form-data">
                <div class="rightThree">
                    <input type="file" name="tx"/>
                </div>

                <input type="submit" name="pic"/>
            </form>
        </div>
    </div>
</div>
</body>
