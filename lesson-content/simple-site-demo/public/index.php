<?php

$requestUri = $_SERVER["REQUEST_URI"];
$requestMethod = $_SERVER["REQUEST_METHOD"];

require_once __DIR__."/../bootstrap/bootstrap.php";

$app = new \Framework\Application(__DIR__."/..");
$view = new \Framework\View($app->getProjectRoot()."/views");
$router = new \Framework\Router($requestUri, $requestMethod);
require_once __DIR__."/../routes/web.php";

$router->handleRequest();
