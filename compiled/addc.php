<?php include template("head.html"); ?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!--LIST start-->
<div id="wp" class="wp">

    <form method="post" autocomplete="off" id="postform" action="addc.php">
        <div id="ct" class="ct2_a ct2_a_r wp cl">
            <div class="mn">
                <div class="bm bw0 cl" id="editorbox">
                    <ul class="tb cl mbw">
                        <li class="a"><a href="javascript:;">发表帖子</a></li>
                    </ul>

                    <div id="postbox">
                        <div class="pbt cl">
                            <div class="z">
                                <span><input type="text" name="subject" id="subject" class="px"
                                             onkeyup="showLength(this,&#39;checklen&#39;,80);" style="width: 25em"
                                             tabindex="1"></span>
                                <span id="subjectchk">还可输入 <strong id="checklen">80</strong> 个字符</span>
                            </div>
                        </div>

                        <textarea name="fwb"></textarea>
                        <script type="text/javascript">CKEDITOR.replace('fwb');</script>
                        <br/><br/>


                        <div id="e_body_loading">

                        </div>

                        <div id="post_extra" class="ptm cl">


                            <div id="post_extra_c">
                                <div id="extra_price_c" class="exfm cl">
                                    售价:<input type="text" id="price" name="price" class="px pxs" onblur="extraCheck(2)"
                                              value="0"> 金钱<span class="xg1">(最高 30 )</span>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="classid" name="classid" value="<?php echo $cid; ?>">

                        <div class="mtm mbm pnpost">
                            <button type="submit" id="postsubmit" class="pn pnc" value="true" name="topicsubmit">
                                <span>发表帖子</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>


</div>
<!--LIST end-->
<?php include template("foot.html"); ?>

