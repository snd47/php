<?php

class Config {
    protected static $settings = array();
    // настройки приложения будут представлятся в виде пар ключ-значение

    public static function get($key) {
        return isset(self::$settings[$key]) ? self::$settings[$key] : null;
    }

    public static function set($key, $value) {
        self::$settings[$key] = $value;
    }
}