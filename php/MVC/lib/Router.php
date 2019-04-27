<?php
/**
 * Created by PhpStorm.
 * User: Sasha
 * Date: 1/23/2019
 * Time: 14:22
 */

class Router
{
    protected $uri;

    protected $controller;

    protected $action;

    protected $params;

    protected $route;

    protected $method_prefix;

    protected $language;

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    public function __construct($uri)
    {
        $this->uri = urldecode(trim($uri, '/'));

        //Get defaults
        $routes = config::get('routes');
        $this->route = config::get('default_route');
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
        $this->language = config::get('default_language');
        $this->controller = config::get('default_controller');
        $this->action = config::get('default_action');

        $uri_parts = explode('?', $this->uri);

        //Get path like /lng/controller/actionparam1/params2/.../.../
        $path = $uri_parts[0];

        $path_parts = explode('/', $path);

        if ( count($path_parts) ){

            //get route or language at first element
            if( in_array(strtolower(current($path_parts)), array_keys($routes)) ){
                $this->route = strtolower(current($path_parts));
                $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
                array_shift($path_parts);
            } elseif( in_array(strtolower(current($path_parts)), config::get('languages')) ){
                $this->language = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            //Get controller - nex element of array
            if ( current($path_parts) ) {
                $this->controller = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            //Get action
            if ( current($path_parts) ) {
                $this->action = strtolower( current($path_parts) );
                array_shift($path_parts);
            }
            //Get params - all the rest
            $this->params = $path_parts;
        }
    }

    public static function redirect($location){
        header("Location: $location");
    }

}