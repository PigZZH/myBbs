<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0024)http://10.0.151.207/bbs/ -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title><?php echo $title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <link rel="shortcut icon" type="image/ico" href="./img/favicon.ico"/>

</head>

<body mycollectionplug="bind" style="background-size:100%;background:url(img/bowen.jpg) ; ">
<!--TOP start-->
<div id="toptb" class="cl">
    <div class="wp">
        <div class="z"><a href="javascript:void(0);" class="hrefs"
                          onclick="SetHome(this,'http://www.ecmoban.com');">设为首页</a><a
                href="javascript:void(0);" onclick="AddFavorite('我的网站',location.href)">收藏本站</a>
        </div>
    </div>
</div>
<script type="text/JavaScript">
    function SetHome(obj, url) {
        try {
            obj.style.behavior = 'url(#default#homepage)';
            obj.setHomePage(url);
        } catch (e) {
            if (window.netscape) {
                try {
                    netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                } catch (e) {
                    alert("抱歉，此操作被浏览器拒绝！\n\n请在浏览器地址栏输入“about:config”并回车然后将[signed.applets.codebase_principal_support]设置为'true'");
                }
            } else {
                alert("抱歉，您所使用的浏览器无法完成此操作。\n\n您需要手动将【" + url + "】设置为首页。");
            }
        }
    }

    //收藏本站 bbs.ecmoban.com
    function AddFavorite(title, url) {
        try {
            window.external.addFavorite(url, title);
        }
        catch (e) {
            try {
                window.sidebar.addPanel(title, url, "");
            }
            catch (e) {
                alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
            }
        }
    }
</script>
<script>
    function setHomepage(sURL) {

        document.body.style.behavior = 'url(#default#homepage)';
        document.body.setHomePage(sURL);

    }
</script><!--TOP end-->

<!--HEAD start-->

<div id="hd">
    <div class="wp">
        <div class="hdc cl">
            <h2><a href="index.php" title="首页 - aa"><img src="./img/logo1.gif" height="80" border="0"></a></h2>
            <?php if (isset($_SESSION['username'])) { ?>
                <!--<div class="fastlg cl">
                <div class="y pns"><a><?php echo $_SESSION['username']; ?></a> | 欢迎登陆 <a href="logout.php">退出</a>
                    <br>用户权限：普通用户</div>
            </div>-->
                <div id="um">
                    <div class="avt y"><a href="home_tx.php" target="_blank"><img
                                src="<?php echo $_SESSION['picture']; ?>"></a></div>
                    <p>
                        <strong class="vwmy"><a href="http://localhost/bbs/home.php"
                                                target="_blank"><?php echo $_SESSION['username']; ?></a></strong>
                        <span class="pipe">|</span><a href="home.php">设置</a>
                        <span class="pipe">|</span><a href="logout.php">退出</a>
                    </p>
                    <p>
                        <a id="extcreditmenu" href="http://localhost/bbs/#">金币: <?php echo $_SESSION['price']; ?></a>
                        <span class="pipe">|</span>用户权限: <?php if (($_SESSION['type'])) { ?><a href="admin_login.php">管理员</a>
                        <?php } else { ?>普通用户<?php } ?>
                    </p>
                    <iframe id="tmp_downloadhelper_iframe" style="display: none;"
                            src="./首页 - 守望先锋_files/saved_resource.html"></iframe>
                </div>
            <?php } else { ?>

                <form method="post" autocomplete="off" id="lsform" action="login.php">
                    <div class="fastlg cl">
                        <div class="y pns">
                            <table cellspacing="0" cellpadding="0">
                                <tbody>
                                <tr>
                                    <td><span class="ftid">用户名</span></td>
                                    <td><input type="text" name="username" value="" id="ls_username" autocomplete="off"
                                               class="px vm" tabIndex="1"></td>
                                    <td class="fastlg_l">
                                        <label for="ls_cookietime"><input type="checkbox" name="cookietime"
                                                                          id="ls_cookietime" class="pc"
                                                                          value="true">自动登录</label>
                                    </td>
                                    <td>&nbsp;<a href="getpwd.php">找回密码</a></td>
                                </tr>
                                <tr>
                                    <td><label for="ls_password" class="z psw_w">密码</label></td>
                                    <td><input type="password" name="password" id="ls_password" class="px vm"
                                               autocomplete="off" tabIndex="2"></td>
                                    <td class="fastlg_l">
                                        <button type="submit" class="pn vm" name="loginsubmit" value="true"
                                                style="width:75px;"><em>登录</em></button>
                                    </td>
                                    <td>&nbsp;<a href="reg.php" class="xi2 xw1">立即注册</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            <?php } ?>

        </div>

        <div id="nv">
            <ul>
                <li id="mn_home"><a href="index.php" hidefocus="true" title="Space">首页</a></li>
                <?php if (is_array($bigtabledata)) {
                    foreach ($bigtabledata AS $key => $value) { ?>
                        <li id="mn_home"><a href="index.php?bigid=<?php echo $value['bid']; ?>" hidefocus="true"
                                            title="Space"><?php echo $value['name']; ?></a>
                        </li>
                    <?php }
                } ?>


            </ul>
        </div>

        <!--<div id="scbar" class="cl">
            <form id="scbar_form" method="get" autocomplete="off" action="http://10.0.151.207/bbs/search.php"
                  target="_blank">
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="scbar_hot_td">
                            <div id="scbar_hot">
                                <strong class="xw1">热搜: </strong>
                                <a href="http://localhost/bbs/search.php?keywords=%E6%B4%BB%E5%8A%A8" target="_blank"
                                   class="xi2">活动</a>
                                <a href="http://localhost/bbs/search.php?keywords=%E4%BA%A4%E5%8F%8B" target="_blank"
                                   class="xi2">交友</a>
                                <a href="http://localhost/bbs/search.php?keywords=%E6%95%99%E7%A8%8B" target="_blank"
                                   class="xi2">教程</a>
                            </div>
                        </td>
                        <td class="scbar_txt_td"><input type="text" name="keywords" id="scbar_txt"
                                                        onfocus="if(this.value==&#39;请输入搜索内容&#39;){this.value=&#39;&#39;;this.style.color=&#39;#666&#39;;}"
                                                        onblur="if(this.value==&#39;&#39;){this.value=&#39;请输入搜索内容&#39;;this.style.color=&#39;#ccc&#39;;}"
                                                        value="请输入搜索内容" style="color:#CCCCCC" autocomplete="off"></td>
                        <td class="scbar_btn_td" class="scbar_icon_td">
                            <button type="submit" name="searchsubmit" id="scbar_btn" class="pn pnc" value="true"><strong
                                    class="xi2 xs2">搜索</strong></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>-->
        <iframe id="tmp_downloadhelper_iframe" style="display: none;"
                src="./首页 - aa_files/saved_resource.html"></iframe>
    </div>
</div>
<!--HEAD end-->

</body>
</html>
