<?php
/**
 * Created by IntelliJ IDEA.
 * User: thinkam
 * Date: 1/24/18
 * Time: 12:55 AM
 */

namespace util;


class StringUtil
{
    public static function dealInput($str) {
        $str = trim($str);
        $str = stripcslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }
}