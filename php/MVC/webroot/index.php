<?php


define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');

require_once (ROOT.DS.'lib'.DS.'init.php');

$uri = $_SERVER['REQUEST_URI'];
$router = new Router($uri);

//  Session test
// Session::setFlash('Test flash message');

session_start();


try {
    App::run($uri);
} catch (Exception $e) {
    echo $e;
}
/*
$test = App::$db->query('select * from pages');
echo "<pre>";
print_r($test);*/

