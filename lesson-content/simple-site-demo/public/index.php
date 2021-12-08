<?php

$requestUri = $_SERVER["REQUEST_URI"];

require_once __DIR__."/../app/functions.php";
require_once __DIR__."/../app/handler.php";

$routes = [
    "/" => function() {
        $content = view(__DIR__."/../layout/base.php", [
            'header' => view(__DIR__."/../layout/header.php", []),
            'content' => view(__DIR__."/../layout/content.php", []),
            'footer' => view(__DIR__."/../layout/footer.php"),
        ]);
        echo $content;
//        echo "Hello from main page!";
    },
    "/news" => function() {
        $content = view(__DIR__."/../layout/base.php", [
            'header' => view(__DIR__."/../layout/header.php", []),
            'content' => view(__DIR__."/../layout/news.php", []),
            'footer' => view(__DIR__."/../layout/footer.php"),
        ]);
        echo $content;
    },
    "/articles" => function() {
        echo "Beautiful articles from the best well known authors!";
    }
];

//
//handle();
$found = false;
foreach ($routes as $route => $handler) {
    if ($route == $requestUri) {
        $handler();
        $found = true;
    }
}

if (!$found) {
    echo "404";
}

//echo "<pre>";
//var_dump($_SERVER);
//echo "</pre>";
//echo "Hello from index.php";