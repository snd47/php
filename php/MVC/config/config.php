<?php
/**
 * main config of our site
 * User: Sasha
 * Date: 1/23/2019
 * Time: 16:29
 */

config::set('site_name', 'Your Site Name');

config::set('languages', array('en', 'fr'));

//Routes. ROute name => method prefix

config::set('routes', array(
    'default'   => '',
    'admin'     => 'admin_'
));

config::set('default_route', 'default');
config::set('default_language', 'en');
config::set('default_controller', 'pages');
config::set('default_action', 'index');

config::set('db.host', 'localhost');
config::set('db.user', 'root');
config::set('db.password', '');
config::set('db.db_name', 'mvc');


config::set('salt', 'jdpa4jdpaojpjgpaojgf7');
