<?php

spl_autoload_register ('autoload');

require_once(ROOT.DS. 'config' .DS. 'config.php');

/**
 * @param $class_name
 * @throws Exception
 */
function autoload($class_name) {

    $lib_path = ROOT.DS . 'lib' . DS . ucfirst(strtolower($class_name)) . '.php';
    $controllers = ROOT.DS . 'controllers' . DS . str_replace('controller', '', strtolower($class_name))  . '.controller.php';
    $model_path = ROOT.DS . 'models' . DS . ucfirst(strtolower($class_name)) . '.php';

    if ( file_exists($lib_path) ) {
        require_once ($lib_path);
    } elseif ( file_exists($controllers) ){
        require_once ($controllers);
    } elseif ( file_exists( $model_path) ) {
        require_once ($model_path);
    } else {
        throw new Exception("Failed to include class: " . $class_name);
    }

}




