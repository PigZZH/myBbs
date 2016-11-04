<?php include template("head.html"); ?>

    <div id="wp" class="wp">
        <!--蚂蚁线 star-->
        <div id="pt" class="bm cl">
            <div class="z">
                <a href="index.php">论坛</a></div>
            <div class="z"></div>
        </div>
        <!--蚂蚁线 end-->

        <div id="ct" class="wp cl">
            <!--1-->
            <div id="chart" class="bm bw0 cl">
                <div class="y">
                    <p class="chart z">
                        帖子: <em><?php echo $tiezishu; ?></em><span class="pipe">|</span>
                        会员: <em><?php echo $huiyuanshu; ?></em><span class="pipe">|</span>
                        欢迎新会员: <em><?php echo $newuser; ?></em>
                    </p>
                </div>
            </div>
            <!--1-->
            <!--板块开始-->
            <div class="mn">
                <div class="fl bm">
                    <?php if ($bdata) { ?>
                        <?php if (is_array($bdata)) {
                            foreach ($bdata AS $key => $value) { ?>
                                <!--板块 start-->
                                <div class="bm bmw  cl">
                                    <div class="bm_h cl">
                                        <h2><a href="index.php?bigid=<?php echo $value['bid']; ?>">
                                                <?php echo $value['name']; ?><!--<?php echo $value['name']; ?>--></a>
                                        </h2>
                                    </div>
                                    <div id="category_1" class="bm_c">
                                        <table cellspacing="0" cellpadding="0" class="fl_tb">
                                            <tbody>
                                            <?php if ($data) { ?>
                                                <?php if (is_array($data)) {
                                                    foreach ($data AS $k => $v) { ?>
                                                        <?php if ($value['bid'] == $v['parentid']) { ?>
                                                            <tr>
                                                                <td class="fl_icn">
                                                                    <a href="list.php?classid=<?php echo $v['cid']; ?>"><img
                                                                            src="img/forum.gif"
                                                                            alt="<?= $v['classname'] ?>"></a>
                                                                </td>
                                                                <td>
                                                                    <h2>
                                                                        <a href="list.php?classid=<?php echo $v['cid']; ?>"><?= $v['classname'] ?></a>
                                                                    </h2>
                                                                    <p class="xg2"></p>
                                                                    <p>版主: <span
                                                                            class="xi2"><?php echo $v['banzhuid']; ?></span>
                                                                    </p>
                                                                </td>
                                                                <td class="fl_i">
                                                                    <span
                                                                        class="xi2"><?php if (isset($deal[$v['cid']])) { ?><?php echo $deal[$v['cid']]; ?><?php } else { ?>0<?php } ?></span><span
                                                                        class="xg1"> /<?php if (isset($rela[$v['cid']])) { ?><?php echo $rela[$v['cid']]; ?><?php } else { ?>0<?php } ?></span>
                                                                </td>
                                                                <td class="fl_by">
                                                                    <div>
                                                                        <a href="detail.php?id=<?php echo select_returnone($conn, 'bbs_details', 'id', 'tid ="' . $v['cid'] . '"', 'addtime desc'); ?>"
                                                                           class="xi2"><?php echo select_returnone($conn, 'bbs_details', 'title', 'tid ="' . $v['cid'] . '"', 'addtime desc'); ?></a>
                                                                        <cite><span
                                                                                title="2016-08-26"><?php echo Lasttime(select_returnone($conn, 'bbs_details', 'addtime', 'tid ="' . $v['cid'] . '"', 'addtime desc')); ?></span> <?php echo select_returnone($conn, 'bbs_details', 'authorid', 'tid ="' . $v['cid'] . '"', 'addtime desc'); ?>
                                                                        </cite></div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php }
                                                } ?>
                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--板块 end-->
                            <?php }
                        } ?>
                    <?php } ?>


                </div>
                <div class="bm lk">
                    <div id="category_lk" class="bm_c ptm">
                        <ul class="m mbn cl">
                            <li class="lk_logo mbm bbda cl">
                                <img src="./img/logo_88_31.gif" border="0" alt="官方论坛">
                                <div class="lk_content z">
                                    <h5><a href="http://www.discuz.net/" target="_blank">官方论坛</a></h5>
                                    <p>提供最新 Discuz! 产品新闻、软件下载与技术交流</p>
                                </div>
                            </li>
                        </ul>

                        <ul class="x mbm cl">
                            <?php if (is_array($ydata)) {
                                foreach ($ydata AS $key => $value) { ?>
                                    <li><a href="<?php echo $value['link']; ?>" target="_blank"
                                           title="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></a></li>
                                <?php }
                            } ?>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!--CONTENT end-->


<?php include template("foot.html"); ?>