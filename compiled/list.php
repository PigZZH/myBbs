<?php include template("head.html"); ?>
<head>

    <link rel="stylesheet" type="text/css" href="css/list.css">
</head>
<!--LIST start-->
<div id="wp" class="wp">
    <div id="pt" class="bm cl">
        <div class="z">
            <a
                href="index.php">论坛</a><a>&nbsp>&nbsp</a><a
                href="index.php?bigid=<?php echo $hmy1; ?>"><?php echo $my1; ?></a><a>&nbsp>&nbsp</a><a
                href="list.php?classid=<?php echo $cid; ?>"><?php echo $my2; ?></a>
        </div>
    </div>
    <div class="boardnav">
        <div id="ct" class="wp cl" style="margin-left:145px">
            <div id="sd_bdl" class="bdl" style="width:130px;margin-left:-145px">
                <div class="tbn" id="forumleftside"><h2 class="bdl_h">版块导航</h2>
                    <!--左边开始-->
                    <?php if (is_array($mdata)) {
                        foreach ($mdata AS $value) { ?>
                            <dl class="a" id="lf_1">
                                <dt><a href="javascript:;"
                                       title="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></a></dt>
                                <?php if (is_array($zdata)) {
                                    foreach ($zdata AS $k => $v) { ?>
                                        <?php if ($value['bid'] == $v['parentid']) { ?>
                                            <dd>
                                                <a href="list.php?classid=<?php echo $v['cid']; ?>"
                                                   title="<?php echo $v['classname']; ?>"><?php echo $v['classname']; ?></a>
                                            </dd>
                                        <?php } ?>
                                    <?php }
                                } ?>
                            </dl>
                        <?php }
                    } ?>
                    <!--左边结束-->
                </div>
            </div>

            <div class="mn">

                <div class="bm bml pbn">
                    <div class="bm_h cl">
                        <h1 class="xs2">
                            <a href="http://www.jsnowman.top/func_bbs/list.php?classid=5"><?php echo $my2; ?></a>
                            <span class="xs1 xw0 i">今日: <strong class="xi1"><?php echo $todaycount; ?></strong><span
                                    class="pipe">|</span>主题: <strong class="xi1"><?php echo $tznum[0]['n']; ?></strong></span>
                        </h1>
                    </div>
                    <div class="bm_c cl pbn">

                        <div>
                            版主: <span class="xi2"><?php echo $bz; ?></span>
                        </div>

                    </div>
                </div>

                <div id="pgt" class="bm bw0 pgs cl">
                    <span class="pgb y"><a href="/index.php">返&nbsp;回</a></span>
                    <a href="addc.php?classid=<?= $cid ?>" id="newspecial" title="发新帖"><img
                            src="img/pn_post.png" alt="发新帖"></a></div>

                <div id="threadlist" class="tl bm bmw">
                    <div class="th">
                        <table cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <th colspan="2">
                                    <div class="tf">
                                        筛选:
                                        <a href="list.php?classid=<?php echo $cid; ?>" class="xi2">全部</a><span
                                            class="pipe">|</span><a
                                            href="list.php?classid=<?php echo $cid; ?>&amp;elite=1"
                                            class="xi2">精华</a></div>
                                </th>
                                <td class="by">作者</td>
                                <td class="num">回复</td>
                                <td class="by">最后发表</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bm_c">
                        <form method="post" autocomplete="off" name="moderate" id="moderate"
                              action="list.php?classid=5">
                            <table summary="forum_2" id="forum_2" cellspacing="0" cellpadding="0">
                                <tbody>
                                <!--回帖列表-->
                                <?php if (isset($data)) { ?>
                                    <?php if (is_array($data)) {
                                        foreach ($data AS $key => $value) { ?>
                                            <tr>
                                                <td class="icn">
                                                    <a href="http://www.jsnowman.top/func_bbs/detail.php?<?php echo $value['id']; ?>"
                                                       title="新窗口打开"
                                                       target="_blank"><img src="img/folder_common.gif"></a>
                                                </td>
                                                <th class="common">
                                                    <a href="detail.php?id=<?php echo $value['id']; ?>" class="xst"
                                                       <?php if ($value['gaoliang'] && $value['gaoliang'] == 1){ ?>style="color:red<?php } ?>"><?php echo $value['title']; ?></a><?php if ($value['price']) { ?>
                                                        - [售价 <span
                                                            class="xw1"><?php echo $value['price']; ?></span> 金钱]<?php } ?>
                                                    <?php if (isset($value['style']) && $value['style'] == 1) { ?>
                                                        <img src="img/digest_1.gif" align="absmiddle" alt="digest"
                                                             title="精华帖">
                                                    <?php } ?>
                                                    <?php if (isset($value['zhiding']) && $value['zhiding'] == 1) { ?>

                                                        <span class="xw1" style="color:red">[置顶]</span>
                                                    <?php } ?>

                                                </th>
                                                <td class="by">
                                                    <cite><?php echo $value['authorid']; ?></cite>
                                                    <em><span class="xi1"></span></em>
                                                </td>
                                                <td class="num"><a
                                                        href="http://www.jsnowman.top/func_bbs/detail.php?id=8"
                                                        class="xi2"><?php if (isset($relano[$value['id']])) { ?><?php echo $relano[$value['id']]; ?><?php } else { ?>0<?php } ?></a><em><?php if (isset($ckno[$value['id']])) { ?><?php echo $ckno[$value['id']]; ?><?php } else { ?>0<?php } ?></em>
                                                </td>
                                                <td class="by">
                                                    <cite></cite><em><span
                                                            title="2015-10-08 12:46:58"><?= Lasttime($value['addtime']); ?></span></em>
                                                </td>
                                            </tr>

                                        <?php }
                                    } ?>
                                <?php } ?>

                                <!--回帖列表结束-->
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>

                <div class="bm bw0 pgs cl">
                    <span class="pgb y"><a href="index.php">返&nbsp;回</a></span>
                    <a href="addc.php?classid=<?= $cid ?>" id="newspecialtmp" title="发新帖"><img
                            src="img/pn_post.png" alt="发新帖"></a></div>
                <div style="width:800px; margin:0 auto; padding:10px 0px; text-align:right">
                    &nbsp;&nbsp;<input type="text"
                                       onkeydown="javascript:if(event.keyCode==13){var page=(this.value&gt;<?php echo $page; ?>)?<?php echo $page; ?>:this.value;location=&#39;list.php?classid=<?= $cid ?>&amp;page=&#39;+page+&#39;&#39;}"
                                       value="1" style="width:25px"><input type="button" value="GO"
                                                                           onclick="javascript:var page=(this.previousSibling.value&gt;<?php echo $count; ?>)?<?php echo $page; ?>:this.previousSibling.value;location=&#39;list.php?classid=<?= $cid ?>&amp;page=&#39;+page+&#39;&#39;">&nbsp;&nbsp;&nbsp;<?php echo $page; ?>
                    &nbsp;&nbsp;&nbsp;<a
                        href="list.php?classid=<?php echo $cid; ?>&amp;page=1">首页</a> <a
                        href="list.php?classid=<?php echo $cid; ?>&amp;page=<?php echo $prev; ?><?php if (isset($_GET['elite'])) { ?><?php echo $linkelite; ?><?php } ?>">上一页</a>
                    <a
                        href="list.php?classid=<?php echo $cid; ?>&amp;page=<?php echo $next; ?><?php if (isset($_GET['elite'])) { ?><?php echo $linkelite; ?><?php } ?>">下一页</a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="list.php?classid=<?php echo $cid; ?>&amp;page=<?php echo $count; ?><?php if (isset($_GET['elite'])) { ?><?php echo $linkelite; ?><?php } ?>">尾
                        页</a>&nbsp;&nbsp;&nbsp;&nbsp;共有<b><?php echo $countArray['c']; ?></b>条记录&nbsp;&nbsp;&nbsp;&nbsp;每页显示<b><?php echo $pagesize; ?></b>条，本页<b><?php echo $realoffset; ?>
                        --<?php if ($page == $count) { ?><?php echo $countArray['c']; ?><?php } else { ?><?php echo $pagesize * ($page); ?><?php } ?></b>条&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $page; ?>
                        /<?php echo $count; ?></b>页&nbsp;&nbsp;
                </div>
            </div>
        </div>
    </div>
</div>
<!--LIST end-->


<?php include template("foot.html"); ?>
