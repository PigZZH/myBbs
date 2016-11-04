<?php
include './common/common.php';
if (empty($_SESSION['uid'])) {
    $title = '修改密码';
    $name = $_GET['name'];
    $and = $_GET['and'];//?name=654321&and=9555053&sj=1363676749
    $sj = $_GET['sj'];//&wz=sgfangchan6334838&key=86e2dd1f526b6d24badfd35b092456b5
    $wz = $_GET['wz'];
    $key = $_GET['key'];
    $sj2 = 84600 + $sj;
    $yanzheng = time();
//echo $yanzheng;echo "<br>";echo "name= ".$name;echo "<br>";echo "and= ".$and;echo "<br>";echo "sj= ".$sj;
//echo "<br>";echo "sj2= ".$sj2;echo "<br>";echo "key= ".$key;echo "<br>";echo "wz= ".$wz;echo "<br>";
    if ($yanzheng >= $sj2) {
        echo "<script>alert('连接已失效，请从新获取！');window.close();</script>";//连接失效，点击确定关闭窗口
        exit;
    }
    include template('xiugai.html');
} else {
    echo "<script>alert('您已登录,点击退出!');window.location='logout.php';</script>";

}