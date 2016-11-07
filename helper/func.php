<?php
/**
 * Created by PhpStorm.
 * User: hao06
 * Date: 2016-08-26
 * Time: 19:12
 */
//时间处理函数
function Lasttime($a)
{
    date_default_timezone_set('PRC');
    if ($a == 0 || $a == null) {
        return '';
    }
    $time = time() - $a;

    if ($time < 60) {
        return '刚刚';
    }
    if ($time >= 60 && $time < 1800) {
        return floor($time / 60) . '分钟前';
    }
    if ($time >= 1800 && $time < 3600) {
        return '半小时前';
    }
    if ($time >= 3600 && $time < 86400) {
        return date('Y-m-d H:i:s', $a);
    }
    if ($time >= 86400 && $time <= 31536000) {
        return date('Y-m-d H:i:s', $a);
    }
    if ($time >= 31536000) {
        return date('Y-m-d H:i:s', $a);
    }
}

//快捷显示时间
function TimeDb($time, $type = 0)
{
    date_default_timezone_set('PRC');
    if ($time == 0 || $time == null) {
        return '';
    }
    if ($type == 1) {
        return date('Y-m-d H:i:s', $time);
    } else {
        return date('Y-m-d', $time);
    }

}

//检查email是否合法
function checkEmail($mail)
{
    $pattern = '/^[\w-]+@([a-zA-Z0-9-]+\.)+((com)|(cn)|(net)|(edu))$/i';
    if (preg_match($pattern, $mail)) {
        return false;
    } else {
        return true;
    }
}

//检查密码是否为纯数字
/**
 * @param $password 密码
 * @return bool
 */
function checkPwd($password)
{
    if (is_numeric($password)) {   //    '/1/[\D]+/'
        return false;
    } else {
        return true;
    }
}

//查询用户的距离下一次升级还差积分,头衔,头衔图片
/**
 * @param $conn 数据库链接
 * @param $username 用户名
 * @param int $type 需要显示的内容
 *                  1距下次升级还差的积分
 *                  0头衔
 *                  2头衔的图片
 * @return string
 */
function leavel($conn, $username, $type = 0)
{
    $price = select_returnone($conn, 'bbs_user', 'grade', 'username="' . $username . '"');

    if ($type == 0) {
        if ($price < 60) {
            return '韶华一笑间';
        }

        if ($price < 120) {
            return '独赏二月雪';
        }
        if ($price < 210) {
            return '畅意三江水';
        }
        if ($price < 330) {
            return '莫问四书意';
        }
        if ($price < 480) {
            return '甘首五朝臣';
        }
        if ($price < 660) {
            return '胸怀六国志';
        }
        if ($price < 870) {
            return '可吟七步诗';
        }
        if ($price < 1110) {
            return '能识八方语';
        }
        if ($price < 1380) {
            return '有为九子能';
        }
        if ($price < 1680) {
            return '有为九子能';
        }
        if ($price < 2010) {
            return '尝以士自居';
        }
        if ($price > 2370) {
            return '却具王侯心';
        }
    } elseif ($type == 1) {
        if ($price < 60) {
            $sj = 120 - $price;
            return '距离升级还差' . "$sj" . '积分';
        }

        if ($price < 120) {
            $sj = 210 - $price;
            return '距离升级还差' . "$sj" . '积分';
        }
        if ($price < 210) {
            $sj = 330 - $price;
            return '距离升级还差' . "$sj" . '积分';
        }
        if ($price < 330) {
            $sj = 480 - $price;
            return '距离升级还差' . "$sj" . '积分';
        }
        if ($price < 480) {
            $sj = 600 - $price;
            return '距离升级还差' . "$sj" . '积分';
        }
        if ($price < 660) {
            $sj = 870 - $price;
            return '距离升级还差' . "870-$price" . '积分';
        }
        if ($price < 870) {
            $sj = 1110 - $price;
            return '距离升级还差' . "$sj" . '积分';
        }
        if ($price < 1110) {
            $sj = 1380 - $price;
            return '距离升级还差' . "$sj" . '积分';
        }
        if ($price < 1380) {
            $sj = 1680 - $price;
            return '距离升级还差' . "$sj" . '积分';
        }
        if ($price < 1680) {
            $sj = 2010 - $price;
            return '距离升级还差' . "$sj" . '积分';
        }
        if ($price < 2010) {
            $sj = 2370 - $price;
            return '距离升级还差' . "$sj" . '积分';
        }
        if ($price > 2370) {

            return '舍我其谁';
        }
    } elseif ($type == 2) {
        if ($price < 60) {
            return '<img src="./img/1/chulingrenwu.png " width="55px" height="55px"><img src="./img/1/banyuetanyou.png " width="55px" height="55px">';
        }

        if ($price < 120) {
            return '<img src="./img/1/banyuetanyou.png " width="55px" height="55px">';
        }
        if ($price < 210) {
            return '<img src="./img/1/dishuchuanshi.png " width="55px" height="55px">';

        }
        if ($price < 330) {
            return '<img src="./img/1/dishuchuanshi.png " width="55px" height="55px"><img src="./img/1/hainabaichuan.png " width="55px" height="55px">';

        }
        if ($price < 480) {
            return '<img src="./img/1/yijuchengming.png " width="55px" height="55px"><img src="./img/10.gif"><img src="./img/11.gif"><img src="./img/22.gif">';
        }
        if ($price < 660) {

        }
        if ($price < 870) {

        }
        if ($price < 1110) {

        }
        if ($price < 1380) {
            return '<img src="./img/10.gif"><img src="./img/11.gif"><img src="./img/22.gif"><img src="./img/33.gif"><img src="./img/55.gif"><img src="./img/88.gif"><img src="./img/99.gif">';
        }
        if ($price < 1680) {
            return '<img src="./img/10.gif"><img src="./img/11.gif"><img src="./img/22.gif"><img src="./img/33.gif"><img src="./img/55.gif"><img src="./img/88.gif"><img src="./img/99.gif">';
        }
        if ($price < 2010) {
            return '<img src="./img/10.gif"><img src="./img/11.gif"><img src="./img/22.gif"><img src="./img/33.gif"><img src="./img/55.gif"><img src="./img/88.gif"><img src="./img/99.gif">';
        }
        if ($price > 2370) {
            return '&nbsp&nbsp<img src="./img/1/tianxiawushuang.png " width="55px" height="55px"><img src="./img/1/luntangugan.png " width="55px" height="55px"><img src="./img/10.gif"><img src="./img/11.gif"><img src="./img/22.gif"><img src="./img/33.gif"><img src="./img/55.gif"><img src="./img/88.gif"><img src="./img/99.gif">';
        }
    }
}

//获取ip的函数
function getIP()
{
    global $ip;
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if (getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if (getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknow";
    return $ip;
}