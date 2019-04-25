<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 1/23/2019
 * Time: 14:15
 */

class Config
{
    protected static $settings = array();

    public static function get($key) {
        return isset(self::$settings[$key]) ? self::$settings[$key] : null;
    }

    public static function set($key, $value) {
        self::$settings[$key] = $value;
    }
}