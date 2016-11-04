<?php include template("head.html"); ?>
<body mycollectionplug="bind">

<!--REG START-->
<div id="wp" class="wp">
    <div id="ct" class="ptm wp cl">
        <div class="mn">
            <div class="bm" id="main_message">
                <div class="bm_h bbs" id="main_hnav">
                    <h3 id="layer_reginfo_t" class="xs2">立即注册</h3>
                </div>
                <p id="returnmessage4"></p>
                <form method="post" autocomplete="off" name="register" id="registerform" action="reg1.php">
                    <div id="layer_reg" class="bm_c">
                        <div class="mtw">
                            <div id="reginfo_a">
                                <div class="rfm">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th><span class="rq">*</span><label for="5sMVeV">用户名:</label></th>
                                            <td><input type="text" id="5sMVeV"
                                                       onblur="checkRegOut(&#39;5sMVeV&#39;,&#39;请输入用户名&#39;);"
                                                       onfocus="checkReg(&#39;5sMVeV&#39;)" name="username" class="px"
                                                       autocomplete="off" size="25" maxlength="15"></td>
                                            <td class="tipcol"><i id="tip_5sMVeV" class="p_tip">用户名由 3 到 12 个字符组成</i>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="rfm">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th><span class="rq">*</span><label for="WXETc3">密码:</label></th>
                                            <td><input type="password" id="WXETc3"
                                                       onblur="checkRegOut(&#39;WXETc3&#39;,&#39;请输入密码&#39;);"
                                                       onfocus="checkReg(&#39;WXETc3&#39;)" name="password" size="25"
                                                       class="px"></td>
                                            <td class="tipcol"><i id="tip_WXETc3" class="p_tip">请填写密码,由 3 到 12 个字符组成</i>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="rfm">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th><span class="rq">*</span><label for="LzI33d">确认密码:</label></th>
                                            <td><input type="password" id="LzI33d"
                                                       onblur="checkRegOut(&#39;LzI33d&#39;,&#39;请确认密码&#39;);"
                                                       onfocus="checkReg(&#39;LzI33d&#39;)" name="repassword" size="25"
                                                       class="px"></td>
                                            <td class="tipcol"><i id="tip_LzI33d" class="p_tip">请再次输入密码</i></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="rfm">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th><span class="rq">*</span><label for="FQ817D">Email:</label></th>
                                            <td><input type="email" id="FQ817D" name="mail"
                                                       onblur="checkRegOut(&#39;FQ817D&#39;,&#39;请输入正确的邮箱地址&#39;);"
                                                       onfocus="checkReg(&#39;FQ817D&#39;)" size="25" class="px"><br><em
                                                    id="emailmore">&nbsp;</em></td>
                                            <td class="tipcol"><i id="tip_FQ817D" class="p_tip">请输入正确的邮箱地址</i></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="rfm">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th><span class="rq">*</span><label for="yzm">验证码:</label></th>
                                            <td><input style="width:50px;" maxlength="4" type="text" id="yzm" name="yzm"
                                                       onfocus="checkReg(&#39;yzm&#39;)" size="25" class="px"><br><em
                                                    id="emailmore">&nbsp;</em></td>
                                            <td class="tipcol"><i id="tip_yzm" class="p_tip"><img src="yzm.php"
                                                                                                  id="p_yzm"
                                                                                                  onclick="show(&#39;p_yzm&#39;)"
                                                                                                  style="cursor:pointer">
                                                    <a href="javascript:;" onclick="show(&#39;p_yzm&#39;)">看不清？</a></i>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="layer_reginfo_b">
                        <div class="rfm mbw bw0">
                            <table width="100%">
                                <tbody>
                                <tr>
                                    <th>&nbsp;</th>
                                    <td>
									<span id="reginfo_a_btn">
									<em>&nbsp;</em>
									<button class="pn pnc" id="registerformsubmit" type="submit" name="regsubmit"
                                            value="true">
                                        <strong>提交</strong>
                                    </button>
									</span>
                                    </td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function checkReg(obj) {
        document.getElementById('tip_' + obj).style.display = 'block';
    }

    function checkRegOut(obj, test) {
        if (document.getElementById(obj).value == '') {
            document.getElementById('tip_' + obj).innerHTML = '<b style="color:red;">' + test + '</b>';
        } else {
            document.getElementById('tip_' + obj).style.display = 'none';
        }
    }

    function show(obj) {
        document.getElementById(obj).src = 'yzm.php?math=' + Math.random();
    }
</script>

<?php include 'foot.php'; ?>


</body>
<iframe id="tmp_downloadhelper_iframe" style="display: none;"
        src="./用户注册 - aa_files/saved_resource.html"></iframe></html>
