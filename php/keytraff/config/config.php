<?php

Config::set('site_name', 'KeyTraff');


//Routes. ROute name => method prefix

Config::set('routes', array(
    'default'   => '',
    'admin'     => 'admin_'
));

Config::set('default_route', 'default');
Config::set('default_controller', 'home');
Config::set('default_action', 'index');

Config::set('db.host', '127.0.0.1:3306');
Config::set('db.user', 'root');
Config::set('db.password', '');
Config::set('db.db_name', 'keytraff');