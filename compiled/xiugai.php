<?php include template("head.html"); ?>


<!--REG START-->
<div id="wp" class="wp">
    <div id="ct" class="ptm wp cl">
        <div class="mn">
            <div class="bm" id="main_message">
                <div class="bm_h bbs" id="main_hnav">
                    <h3 id="layer_reginfo_t" class="xs2">找回密码</h3>
                </div>
                <p id="returnmessage4"></p>
                <form method="post" autocomplete="off" name="register" id="registerform" action="xiugaichk.php">
                    <div id="layer_reg" class="bm_c">
                        <div class="mtw">
                            <div id="reginfo_a">
                                <div class="rfm">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th><span class="rq">*</span><label for="5sMVeV">密码:</label></th>
                                            <td><input type="password" id="5sMVeV" name="pwd" class="px"
                                                       autocomplete="off" size="25" maxlength="15"></td>

                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="rfm">
                                    <table>
                                        <tbody>
                                        <tr>
                                            <th><span class="rq">*</span><label for="FQ817D">重复密码:</label></th>
                                            <td><input type="password" id="FQ817D" name="repwd" size="25"
                                                       class="px"><br><em id="emailmore">&nbsp;</em></td>
                                            <input type="hidden" name="and" value="<?php echo $and; ?>">
                                            <input type="hidden" name="username" value="<?php echo $name; ?>">
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
<!--REG END-->
<?php include template("foot.html"); ?>
