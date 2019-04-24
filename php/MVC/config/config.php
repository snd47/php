<?php
// Основной конфигурационный файл нашего приложения
// Хранит параметры сайта, параметры подключения к базе данных

Config::set('site_name', 'Your Site Name');

Config::set('languages', array('en', 'fr'));

// Routers. Route name => method prefix

Config::set('routes', array(
    'default'=>'',
    'admin'=> 'admin_',
));

Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');