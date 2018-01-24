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
    // deal with user's input
    public static function dealInput($str)
    {
        $str = trim($str);
        $str = stripcslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }

    //parse URL parameters
    private static function parseUrlParam($query)
    {
        $queryArr = explode('&', $query);
        $params = array();
        if ($queryArr[0] !== '') {
            foreach ($queryArr as $param) {
                list($name, $value) = explode('=', $param);
                $params[urldecode($name)] = urldecode($value);
            }
        }
        return $params;
    }

    //get URL parameters
    public static function getUrlParam($cparam, $url = '')
    {
        $parse_url = parse_url($url);
        $query = isset($parse_url['query']) ? $parse_url['query'] : '';
        $params = self::parseUrlParam($query);
        return isset($params[$cparam]) ? $params[$cparam] : '';
    }
}