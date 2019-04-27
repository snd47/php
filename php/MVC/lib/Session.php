<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 1/24/2019
 * Time: 14:30
 */

class Session
{
    protected static $flash_message;

    public static function setFlash($message){
        self::$flash_message = $message;
    }

    public static function hasFlash(){
        return !is_null(self::$flash_message);
    }

    public static function flash(){
        echo self::$flash_message;
        self::$flash_message = null;
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
        var_dump($_SESSION);
    }

    public static function get($key) {
        if (isset($_SESSION[$key])) {
            var_dump("session key is set");
            return $_SESSION[$key];

        }
        return null;
    }

    public static function delete($key) {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

//    public static function destroy() {
//        session_destroy();
//    }

}