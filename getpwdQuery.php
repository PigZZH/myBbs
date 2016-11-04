<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-10-31
 * Time: 10:00
 */
include 'common/common.php';

include("class.phpmailer.php");
include("class.smtp.php");

if (!empty($_POST['regsubmit'])) {
    if ($_POST['yzm'] == strtolower($_SESSION['yzm'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $yourname = $username;
        $sql = db_select($conn, 'bbs_user', '*', 'username="' . $username . '" and email="' . $email . '"');
        if (!empty($sql)) {
            //你只需填写一下信息即可****************************
            $smtp = "smtp.126.com";//必填，设置SMTP服务器 QQ邮箱是smtp.qq.com ，QQ邮箱默认未开启，请在邮箱里设置开通。网易的是 smtp.163.com 或 smtp.126.com
            $youremail = 'hao0661@126.com'; // 必填，开通SMTP服务的邮箱；也就是发件人Email。
            $password = "Hao616968"; //必填， 以上邮箱对应的密码
            //$ymail = "717006230@qq.com"; //收信人的邮箱地址，也就是你自己收邮件的邮箱
            $ymail = $email;//收信人的邮箱地址，也就是你自己收邮件的邮箱
            $yname = "白夜行"; //收件人称呼
            //填写信息结束 ****************************
            function get_ip()
            {
                if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
                    $ip = getenv("HTTP_CLIENT_IP");
                else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
                    $ip = getenv("HTTP_X_FORWARDED_FOR");
                else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
                    $ip = getenv("REMOTE_ADDR");
                else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
                    $ip = $_SERVER['REMOTE_ADDR'];
                else
                    $ip = "unknown";
                return ($ip);
            }

            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = $smtp;
            $mail->Username = $youremail;
            $mail->Password = $password; //必填， 以上邮箱对应的密码
            $mail->From = $youremail;
            $mail->FromName = WEB_NAME; //发件人称呼
            $mail->AddAddress($ymail, $yname);
            //echo "<script>alert('用户！');</script>";
            /*if($_POST['username']){*/
            $shu = rand(000000, 999999);
            //echo "<br>".$sql;修改表，存储随机数
            $set = ['forget' => $shu];
            //var_dump($set);
            db_update($conn, 'bbs_user', $set, 'username="' . $username . '"');

            $sj = time();
            $wz = "xpecial" . rand(0000000, 9999999);
            $key = md5("www.xpecial.top");
            $url = "localhost/Discuz1604/xiugai.php?name=" . $username . "&and=" . $shu . "&sj=" . $sj . "&wz=" . $wz . "&key=" . $key . "";
            $ip = get_ip();
            //$mail->Subject = $yourname."市购房产网 -【密码找回】";
            $mail->Subject = WEB_NAME . " -【密码找回】";
            //$html = '姓名：'.$yourname.'<br>电话'.$tel.'<br>QQ:'.$qq.'<br>邮箱：'.$email.'<br>IP：'.$ip.'<br>内容：'.$sm;
            $html = $yourname . '<br>这封信是由 ' . $yname . ' 系统发送的密码找回邮件。<br>您收到这封邮件，是由于您在' . $yname . '进行了密码找回操作，或用户修改 Email 使用了这个邮箱地址。如果您并没有访问过' . $yname . '，或没有进行上述操作，请忽略这封邮件。您不需要退订或进行其他进一步的操作。<br>您的物理IP：' . $ip . '<br><br>----------------------------------------------------------------------<br  /><h5><b>密码找回说明</b></h5>----------------------------------------------------------------------<br  /><br>如果您是 ' . $yname . ' 的新用户，或在修改您的注册 Email 时使用了本地址，我们需要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。<br>您只需点击下面的链接即可重置您的帐号密码：<br><a href="' . $url . '">' . $url . '</a><br>(如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问<b>请在6小时内完成此操作</>)感谢您的访问，祝您使用愉快！<br><br>此致<br>' . $yname . ' 管理团队.<br>http://www.xpecial.top/';

            $mail->MsgHTML($html);
            $mail->IsHTML(true);
            if (!$mail->Send()) {
                header("Content-Type: text/html; charset=utf-8");
                echo '<script>alert("系统错误,请联系管理员!");history.go(-1);</script>';
                //echo '<script>alert("系统错误，请联系管理员！");</script>';

            } else {
                header("Content-Type: text/html; charset=utf-8");
                echo '<script>alert("发送成功，请登陆邮箱查看！");history.go(-1);</script>';


            }
        } else {
            echo '<script>alert("您的用户名与Email不匹配,请检查后重试");history.go(-1);</script>';

        }
    } else {
        echo '<script>alert("您的验证码输入错误");history.go(-1);</script>';

    }
} else {
    echo '<script>alert("操作非法");history.go(-1);</script>';

}

