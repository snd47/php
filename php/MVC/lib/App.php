<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 1/23/2019
 * Time: 21:15
 */


class App
{
    protected static $router;

    public static $db;

    /**
     * @return mixed
     */
    public static function getRouter(){
        return self::$router;
    }


    /**
     * @param $uri
     * @throws Exception
     */
    public static function run($uri) {
        self::$router = new Router($uri);

        self::$db = new Db( Config::get('db.host'), Config::get( 'db.user' ), Config::get( 'db.password' ), Config::get( 'db.db_name' ) );

        Lang::load(self::$router->getLanguage());

        $controller_class = ucfirst(self::$router->getController()).'Controller';
        $controller_method = strtolower( self::$router->getMethodPrefix().self::$router->getAction() );

        //Calling controller method
        $controller_object = new $controller_class();

        if( method_exists( $controller_object, $controller_method ) ){
            //Controllers action may return a view path
            $view_path = $controller_object->$controller_method();
            $view_object = new View($controller_object->getData(), $view_path);
            $content = $view_object->render();
        } else {
            throw new Exception('Method ' . $controller_method . ' of class ' . $controller_class . ' does not exist!');
        }

        $layout = self::$router->getRoute();
        $layout_path = VIEWS_PATH.DS.$layout.'.html';
        $layout_view_object = new View(compact('content'), $layout_path);
        echo $layout_view_object->render();
    }
}