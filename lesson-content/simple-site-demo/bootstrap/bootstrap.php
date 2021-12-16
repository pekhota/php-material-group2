<?php

session_start();

require_once __DIR__."/../vendor/autoload.php";

spl_autoload_register(function ($class) {
    $arr = explode("\\", $class);
    $c = count($arr);

    $path = realpath(__DIR__."/..");

    foreach ($arr as $k => $v) {
        $path .= "/";
        $path .= ($k == $c - 1) ? $v : strtolower($v);
    }

    $path .= ".php";

    require_once $path;
});

function redirect($location) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $location");
    exit();
}

function dd(...$var) {
    echo "<pre>";
    var_dump(...$var);
    echo "</pre>";
    die();
}

