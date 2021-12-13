<?php

session_start();

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

function dd(...$var) {
    echo "<pre>";
    var_dump(...$var);
    echo "</pre>";
    die();
}

