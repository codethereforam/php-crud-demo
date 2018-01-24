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

    //解析URL参数
    private static function parseUrlParam($query){
        $queryArr = explode('&', $query);
        $params = array();
        if($queryArr[0] !== ''){
            foreach( $queryArr as $param ){
                list($name, $value) = explode('=', $param);
                $params[urldecode($name)] = urldecode($value);
            }
        }
        return $params;
    }

    //获取URL参数
    public static function getUrlParam($cparam, $url = ''){
        $parse_url = parse_url($url);
        $query = isset($parse_url['query']) ? $parse_url['query'] : '';
//        error_log($query . "\r", 3, 'php.log');
        $params = self::parseUrlParam($query);
        return isset($params[$cparam]) ? $params[$cparam] : '';
    }
}