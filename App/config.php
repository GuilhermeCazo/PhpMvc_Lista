<?php

// definindo as constantes
define('BASEDIR', dirname(__FILE__, 2));
define('VIEWS', BASEDIR . '/View/modules/');


 //outras constantases
$_ENV['db']['host'] = 'localhost:3307';
$_ENV['db']['user'] = 'root';
$_ENV['db']['pass'] = 'etecjau';
$_ENV['db']['database'] = 'db_mvc';