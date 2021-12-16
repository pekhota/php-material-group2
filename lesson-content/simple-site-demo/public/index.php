<?php

$requestUri = $_SERVER["REQUEST_URI"];
$requestMethod = $_SERVER["REQUEST_METHOD"];

require_once __DIR__ . "/../bootstrap/bootstrap.php";

$db = require_once __DIR__."/../config/db.php";

$conn = new PDO("mysql:host={$db['servername']};dbname={$db['db']}", $db['username'], $db['password']);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//
//$header = require "";

//$stm = $conn->query("SELECT * FROM posts LIMIT 5");
//$rows = $stm->fetchAll();
//dd("point 1", $rows);
//require_once __DIR__."/example.php";
//try {
//    try {
//        throw new \App\Exceptions\NotFoundException("some runtime error");
//    } catch (\App\Exceptions\NotFoundException $e) {
//        echo "exception handler inner:".$e->getMessage();
//        throw $e;
//    }
//} catch (Throwable $e) {
//    echo "exception handler outer:".get_class($e)."->>>>>".$e->getMessage();
//}
//die();

//try {
//
//} catch (PDOException $e) {
//    echo "Connection failed: " . $e->getMessage();
//}

$app = new \Framework\Application(__DIR__ . "/..");
$view = new \Framework\View($app->getProjectRoot() . "/views");
function view($fileName, array $params = []) {
    global $view;
    return $view->render($fileName, $params);
}
$router = new \Framework\Router($requestUri, $requestMethod);
require_once __DIR__ . "/../routes/web.php";

$router->handleRequest();
