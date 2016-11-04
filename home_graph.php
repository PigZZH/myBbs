<?php
include 'head.php';
?>
<html>
<head>
    <title>个人资料</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="views/css/home_graph.css"/>
    <script type="text/javascript" src="public/ckeditor/ckeditor.js"></script>
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
            <div class="rightOne">个性签名</div>
            <form action="personcheck.php">
                <div class="rightTwo">
                    <textarea class="ckeditor" name="Signature" cols="40" rows="4"></textarea>
                </div>
                <br/>
                <input type="submit" name="graph"/>
            </form>
        </div>
    </div>
</div>
</body>
</html>