<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-30
 * Time: 19:21
 */
include '../common/common.php';
{
    $value['id']}
if (isset($_POST['link'])) {

}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="Css/bootstrap-responsive.css"/>
    <link rel="stylesheet" type="text/css" href="Css/style.css"/>
    <script type="text/javascript" src="Js/jquery2.js"></script>
    <script type="text/javascript" src="Js/jquery2.sorted.js"></script>
    <script type="text/javascript" src="Js/bootstrap.js"></script>
    <script type="text/javascript" src="Js/ckform.js"></script>
    <script type="text/javascript" src="Js/common.js"></script>
    <script type="text/javascript" src="Js/jquerypicture.js"></script>

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
<body>
<br>
<font color="#777777"><strong>请填写链接资料：</strong></font>
<form action="linkaddcheck.php" method="post" class="definewidth m20" enctype="multipart/form-data">
    <table class="table table-bordered table-hover m10" style="margin-left:10px;margin-top:3px;">


        <br>
        <tr>
            <td class="tableleft">链接名称</td>
            <td><input type="text" name="name"/></td>
        </tr>
        <tr>
            <td class="tableleft">链接地址</td>
            <td><input type="text" name="link"/></td>

        </tr>


    </table>
    <br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button type="submit" class="btn btn-primary">提交</button>
</form>
<img src="" id="img0">

<script>
    $("#GoodsPicture").change(function () {
        var objUrl = getObjectURL(this.files[0]);
        console.log("objUrl = " + objUrl);
        if (objUrl) {
            $("#img0").attr("src", objUrl);
        }
    });

    </
    body >
    < / html >
    < script >
    $(function () {
        $('#backid').click(function () {
            window.location.href = "goodsQuery.html";
        });
    });

</script>


