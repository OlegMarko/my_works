<?php

//======FRONT--CONTROLLER====

// 1. Загальні настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);



// 2. Підключення файлів системи
define('ROOT', dirname(__FILE__));
require_once ROOT.'/components/Router.php';
require_once ROOT.'/components/Db.php';

// 3. З'єднання з базою даних


// 4. Router
$router = new Router();
$router->run();
