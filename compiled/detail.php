<?php include template("head.html"); ?>


<link rel="stylesheet" type="text/css" href="css/view.css">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!--LIST start-->
<div id="wp" class="wp">

    <div id="pt" class="bm cl">
        <div class="z">
            <a href="index.php">论坛</a><a>&nbsp>&nbsp</a><a
                href="index.php?bigid=<?php echo $bid; ?>"><?php echo $bname; ?></a><a>&nbsp>&nbsp</a><a
                href="list.php?classid=<?php echo $cid; ?>"><?php echo $zname; ?></a><a>&nbsp>&nbsp</a><a
                href="detail.php?id=<?php echo $id; ?>"><?php echo $tzname; ?></a>
        </div>
        <div class="z"></div>
    </div>


    <div id="ct" class="wp cl">
        <div id="pgt" class="pgs mbm cl pbm bbs">
            <div class="pgt"></div>
            <span class="y pgb" id="visitedforums"><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">返回列表</a></span>
            <a id="newspecial" href="addc.php?classid=<?php echo $cid; ?>" target="_blank"
               title="发新帖"><img src="img/pn_post.png" alt="发新帖"></a>
            <a id="post_reply" href="detail.php?id=<?php echo $id; ?>#f_pst" title="回复"><img
                    src="img/pn_reply.png" alt="回复"></a>
        </div>
        <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 1) { ?>
            <div id="modmenu" class="xi2 pbm">
                <a href="disposetz.php?tid=<?php echo $id; ?>&amp;del=1">删除主题</a><span class="pipe">|</span>
                <a href="disposetz.php?tid=<?php echo $id; ?>&amp;zhiding=1">置顶</a><span class="pipe">|</span>
                <a href="disposetz.php?tid=<?php echo $id; ?>&amp;gaoliang=1">高亮</a><span class="pipe">|</span>
                <a href="disposetz.php?tid=<?php echo $id; ?>&amp;style=1">精华</a><span class="pipe">|</span>
            </div>
        <?php } ?>

        <?php if ($page == 1) { ?>

            <div id="postlist" class="pl bm">
                <!--楼主 START-->
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="pls ptm pbm">
                            <div class="hm">
                                <span class="xg1">查看:</span> <span class="xi1"><?php echo $cknum; ?></span><span
                                    class="pipe">|</span><span
                                    class="xg1">回复:</span> <span class="xi1"><?php echo $hfnum; ?></span>
                            </div>
                        </td>
                        <td class="plc ptm pbn">
                            <div class="y">
                                <a href="detail.php?id=<?php if (isset($nextid[0])) { ?><?php echo $nextid[0]['id']; ?><?php } ?>"
                                   title="下一主题"><img
                                        src="./img/thread-next.png" alt="下一主题" class="vm"></a>
                            </div>
                            <h1 class="ts">
                                <?php echo $title; ?> </h1>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <style>
                    .max_pic {
                        max-width: 120px;
                    }
                </style>
                <div id="post_114">
                    <table id="pid114" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td class="pls" rowspan="2">
                                <div class="pi">
                                    <div class="authi"><a href="detail.php?id=114#"
                                                          target="_blank" class="xw1"><?php echo $arid; ?></a></div>
                                </div>
                                <div>
                                    <div class="avatar" onmouseover="showbpic(&#39;userinfo&#39;,&#39;114&#39;)">
                                        <img
                                            src="<?php echo select_returnone($conn, 'bbs_user', 'picture', 'username=' . "'$arid'"); ?>"
                                            class="max_pic">
                                    </div>
                                    <p><em><!-- 等级头衔 -->
                                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo leavel($conn, $arid); ?></em></p>
                                    <p><em><?php echo leavel($conn, $arid, 2); ?></em></p>

                                </div>

                            </td>
                            <td class="plc">
                                <div class="pi">
                                    <div id="fj" class="y">
                                        <label class="z">电梯直达</label>
                                        <input id="louceng" type="text" class="px p_fre z" size="2" title="跳转到指定楼层">
                                        <a href="javascript:;" id="fj_btn" class="z" title="跳转到指定楼层"><img
                                                src="img/fj_btn.png" onclick="golouceng()" alt="跳转到指定楼层"
                                                class="vm"></a>
                                        <script>
                                            function golouceng() {
                                                location.href = 'detail.php?id=<?php echo $id; ?>#post_' + document.getElementById('louceng').value;
                                            }
                                        </script>
                                    </div>
                                    <strong>
                                        <a href="http://www.jsnowman.top/func_bbs/detail.php?id=114"
                                           id="postnum4">楼主</a>
                                    </strong>
                                    <div class="pti">
                                        <div class="pdbt">
                                        </div>
                                        <div class="authi">
                                            <img class="authicn vm" id="authicon114"
                                                 src="img/online_admin.gif">
                                            <em id="authorposton114">发表于<?php echo $sendtime; ?></em>
                                            <!--<span class="pipe">|</span><a href="#">只看该作者</a>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="pct">
                                    <style type="text/css">.pcb {
                                            margin-right: 0
                                        }</style>
                                    <?php if ($price > 0) { ?>
                                        <?php if (!empty($judge)) { ?>
                                            <div class="pcb">
                                                <div class="locked">
                                                    付费主题, 价格: <strong><?php echo $price; ?> 金钱 </strong>
                                                </div>
                                                <div class="t_fsz">
                                                    <table cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td class="t_f" id="postmessage_114">
                                                                <p><?php echo $content; ?></p></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div id="comment_114" class="cm">
                                                </div>
                                                <div id="post_rate_div_114"></div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="pcb">
                                                <div class="locked">
                                                    <a href="http://localhost/Discuz1604/pay.php?id=<?php echo $id; ?>&amp;pay=<?php echo $price; ?>"
                                                       class="y viewpay" title="购买主题">购买主题</a>
                                                    <em class="right">
                                                    </em>
                                                    本主题需向作者支付 <strong><?php echo $price; ?> 金钱 </strong> 才能浏览
                                                </div>
                                                <div id="comment_20" class="cm">
                                                </div>
                                                <div id="post_rate_div_20"></div>
                                            </div>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <div class="pcb">
                                            <div class="t_fsz">
                                                <table cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td class="t_f" id="postmessage_114">
                                                            <p><?php echo $content; ?></p></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="comment_114" class="cm">
                                            </div>
                                            <div id="post_rate_div_114"></div>
                                        </div>
                                    <?php } ?>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td class="plc plm">
                            </td>
                        </tr>
                        <tr>
                            <td class="pls"></td>
                            <td class="plc">
                                <div class="po">
                                    <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 1) { ?>
                                        <span class="y">
									<label for="manage5">
                                        <a href="detail.php?tid=<?php echo $id; ?>&amp;del=1">删除</a><span
                                            class="pipe">|</span>
                                        <a href="detail.php?tid=<?php echo $id; ?>&amp;istop=1">置顶</a><span
                                            class="pipe">|</span>
                                        <a href="detail.php?tid=<?php echo $id; ?>&amp;elite=1">精华</a>
                                    </label>
								</span>
                                    <?php } ?>
                                    <div class="pob cl">
                                        <em>
                                            <a class="fastre" href="detail.php?id=<?php echo $id; ?>#f_pst">回复</a>
                                        </em>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!--楼主 END-->

                <?php if ($data2) { ?>
                    <?php if (is_array($data2)) {
                        foreach ($data2 AS $key => $value) { ?>
                            <?php if (isset($value['uid'])) { ?>
                                <!--回复列表 START-->
                                <div id="post_<?php echo $value['louceng']; ?>">
                                    <table id="pid115" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td class="pls" rowspan="2">
                                                <div class="pi">
                                                    <div class="authi"><?php echo $value['uid']; ?></div>
                                                </div>

                                                <div>
                                                    <div class="avatar"
                                                         onmouseover="showbpic(&#39;userinfo&#39;,&#39;115&#39;)">
                                                        <img
                                                            src="<?php echo db_txselect($conn, 'bbs_user', "$value[uid]"); ?>"
                                                            class="max_pic">
                                                    </div>
                                                    <div>
                                                        <p><em><!-- 等级头衔 -->
                                                                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo leavel($conn, $value['uid']); ?></em>
                                                        </p>
                                                        <p><em><?php echo leavel($conn, $value['uid'], 2); ?></em></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="plc">
                                                <div class="pi">
                                                    <strong><a><?php echo $value['louceng']; ?>楼</a></strong>
                                                    <div class="pti">
                                                        <div class="pdbt">
                                                        </div>
                                                        <div class="authi">
                                                            <img class="authicn vm" id="authicon115"
                                                                 src="img/online_admin.gif">
                                                            <em id="authorposton115">发表于 <span
                                                                    title="2016-08-26 09:00:55"><?= Lasttime($value['createtime']) ?></span></em>
                                                            <!--<span class="pipe">|</span><a href="#">只看该作者</a>-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pct">
                                                    <div class="pcb">
                                                        <div class="t_fsz">
                                                            <table cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                <tr>
                                                                    <td class="t_f" id="postmessage_115">
                                                                        <p>
                                                                            <?php echo $value['content']; ?></p></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div id="comment_115" class="cm">
                                                        </div>
                                                        <div id="post_rate_div_115"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="plc plm"></td>
                                        </tr>
                                        <tr>
                                            <td class="pls"></td>
                                            <td class="plc">
                                                <div class="po">
                                                    <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 1) { ?>
                                                        <span class="y">
									<label for="manage5">
                                        <a href="disposetz.php?rid=<?php echo $value['id']; ?>&amp;del=1">删除</a><span
                                            class="pipe"><!--|</span><a
                                            href="http://www.jsnowman.top/func_bbs/detail.php?id=114&amp;hid=115&amp;istopht=1">置顶</a><span
                                            class="pipe">|</span><a
                                            href="http://www.jsnowman.top/func_bbs/detail.php?id=114&amp;hid=115&amp;isdislpay=1">屏蔽</a>-->
                                    </label>
								</span>
                                                    <?php } ?>
                                                    <div class="pob cl">
                                                        <em>
                                                            <a class="fastre"
                                                               href="detail.php?id=<?php echo $id; ?>#f_pst">回复</a>
                                                        </em>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="ad">
                                            <td class="pls"></td>
                                            <td class="plc"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--回复列表 END-->
                            <?php } ?>
                        <?php }
                    } ?>
                <?php } ?>
            </div>
        <?php } else { ?>
            <?php if ($data2) { ?>
                <?php if (is_array($data2)) {
                    foreach ($data2 AS $key => $value) { ?>
                        <?php if (isset($value['uid'])) { ?>
                            <div id="postlist" class="pl bm">
                                <!--回复列表 START-->
                                <div id="post_1">
                                    <table id="pid115" cellspacing="0" cellpadding="0">
                                        <tbody>
                                        <tr>
                                            <td class="pls" rowspan="2">
                                                <div class="pi">
                                                    <div class="authi"><?php echo $value['uid']; ?></div>
                                                </div>
                                                <div>
                                                    <div class="avatar"
                                                         onmouseover="showbpic(&#39;userinfo&#39;,&#39;115&#39;)">
                                                        <img
                                                            src="<?php echo db_txselect($conn, 'bbs_user', "$value[uid]"); ?>"
                                                            class="max_pic">
                                                    </div>

                                                </div>
                                            </td>
                                            <td class="plc">
                                                <div class="pi">
                                                    <strong><a><?php echo $value['louceng']; ?>楼</a></strong>
                                                    <div class="pti">
                                                        <div class="pdbt">
                                                        </div>
                                                        <div class="authi">
                                                            <img class="authicn vm" id="authicon115"
                                                                 src="img/online_admin.gif">
                                                            <em id="authorposton115">发表于 <span
                                                                    title="2016-08-26 09:00:55"><?= Lasttime($value['createtime']) ?></span></em>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pct">
                                                    <div class="pcb">
                                                        <div class="t_fsz">
                                                            <table cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                <tr>
                                                                    <td class="t_f" id="postmessage_115">
                                                                        <p><?php echo $value['content']; ?></p></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div id="comment_115" class="cm">
                                                        </div>
                                                        <div id="post_rate_div_115"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="plc plm"></td>
                                        </tr>
                                        <tr>
                                            <td class="pls"></td>
                                            <td class="plc">
                                                <div class="po">
                                                    <?php if (isset($_SESSION['type']) && $_SESSION['type'] == 1) { ?>
                                                        <span class="y">
									<label for="manage5">
                                        <a href="disposetz.php?rid=<?php echo $value['id']; ?>&amp;del=1">删除</a><span
                                            class="pipe">|</span><!--<a
                                            href="http://www.jsnowman.top/func_bbs/detail.php?id=114&amp;hid=115&amp;istopht=1">置顶</a><span
                                            class="pipe">|</span><a
                                            href="http://www.jsnowman.top/func_bbs/detail.php?id=114&amp;hid=115&amp;isdislpay=1">屏蔽</a-->
                                        >
                                    </label>
								</span>
                                                    <?php } ?>
                                                    <div class="pob cl">
                                                        <em>
                                                            <a class="fastre"
                                                               href="detail.php?id=<?php echo $id; ?>#f_pst">回复</a>
                                                        </em>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="ad">
                                            <td class="pls"></td>
                                            <td class="plc"></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--回复列表 END-->
                            </div>
                        <?php } ?>
                    <?php }
                } ?>
            <?php } ?>
        <?php } ?>
        <div class="pgs mtm mbm cl">
			<span class="pgb y" id="visitedforumstmp">
			<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">返回列表</a></span>
            <a id="newspecialtmp" href="http://www.jsnowman.top/func_bbs/addc.php?classid=5" target="_blank"
               title="发新帖"><img src="img/pn_post.png" alt="发新帖"></a>
            <a id="post_replytmp" href="detail.php?id=<?php echo $id; ?>#f_pst" title="回复"><img
                    src="img/pn_reply.png" alt="回复"></a>
        </div>
        <div style="width:960px; margin:0 auto; padding:10px 0px; text-align:right">
            &nbsp;&nbsp;<input type="text"
                               onkeydown="javascript:if(event.keyCode==13){var page=(this.value&gt;4)?4:this.value;location=&#39;/func_bbs/detail.php?id=74&amp;page=&#39;+page+&#39;&#39;}"
                               value="1" style="width:25px"><input type="button" value="GO"
                                                                   onclick="javascript:var page=(this.previousSibling.value&gt;4)?4:this.previousSibling.value;location=&#39;/func_bbs/detail.php?id=74&amp;page=&#39;+page+&#39;&#39;">&nbsp;&nbsp;&nbsp;<?php echo $page; ?>
            &nbsp;&nbsp;&nbsp;<a
                href="detail.php?id=<?php echo $id; ?>&amp;page=1">首 页</a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                href="detail.php?id=<?php echo $id; ?>&amp;page=<?php echo $prev; ?>">上一页</a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                href="detail.php?id=<?php echo $id; ?>&amp;page=<?php echo $next; ?>">下一页</a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                href="detail.php?id=<?php echo $id; ?>&amp;page=<?php echo $count; ?>">尾页</a>&nbsp;&nbsp;&nbsp;&nbsp;共有<b><?php echo $totalpage; ?></b>条记录&nbsp;&nbsp;&nbsp;&nbsp;每页显示<b><?php echo $pagesize; ?></b>条，本页<b><?php if ($page == 1) { ?><?php echo $foffset; ?><?php } else { ?><?php echo $soffset; ?><?php } ?>
                -<?php if ($page == $count) { ?><?php echo $countArray['c']; ?><?php } else { ?><?php echo $pagesize * ($page); ?>
                <?php } ?></b>条&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $page; ?>/<?php echo $count; ?></b>页&nbsp;&nbsp;
        </div>
        <!--回帖 START-->
        <div id="f_pst" class="pl bm bmw">
            <form method="post" autocomplete="off" id="fastpostform" action="replay.php">
                <table cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="pls">
                            <div class="avatar"><img
                                    src="<?php if (isset($_SESSION['uid'])) { ?><?php echo $_SESSION['picture']; ?><?php } else { ?>img/avatar_blank.gif<?php } ?>"
                                    class="max_pic"></div>
                        </td>
                        <td class="plc">
                            <span id="fastpostreturn"></span>
                            <div class="cl">
                                <div id="fastsmiliesdiv" class="y">
                                    <script type="text/javascript" src="img/ckeditor.js"></script>
                                    <script src="img/sample.js" type="text/javascript"></script>
                                    <textarea name="fwb"></textarea>
                                    <script type="text/javascript">CKEDITOR.replace('fwb');</script>
                                    <br/><br/><br>
                                    <input type="hidden" name="tid" value="<?= $id ?>">
                                    <input type="hidden" name="cid" value="<?= $cid ?>">
                                </div>
                                <p class="ptm pnpost">
                                    <button type="submit" name="replysubmit" id="fastpostsubmit" class="pn pnc vm"
                                            value="replysubmit" tabindex="5">
                                        <strong>发表回复</strong></button>
                                </p>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <!--回帖 END-->
    </div>


</div>
<!--LIST end-->
<?php include template("foot.html"); ?>

