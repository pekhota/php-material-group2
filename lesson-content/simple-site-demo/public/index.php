<?php

function dd(...$var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();
}

$requestUri = $_SERVER["REQUEST_URI"];
$requestMethod = $_SERVER["REQUEST_METHOD"];

require_once __DIR__."/../app/functions.php";
require_once __DIR__."/../app/handler.php";
require_once __DIR__."/../framework/Router.php";

$router = new Router($requestUri, $requestMethod);

$router->get("/", function () {
    $content = view(__DIR__."/../layout/base.php", [
        'header' => view(__DIR__."/../layout/header.php"),
        'content' => view(__DIR__."/../layout/content.php"),
        'footer' => view(__DIR__."/../layout/footer.php"),
    ]);
    echo $content;
});

//$router->post("/news", function () {
//    echo "hello from news";
//});

$router->set404Handler(function () {
    echo "404 not found";
});

$router->handleRequest();
