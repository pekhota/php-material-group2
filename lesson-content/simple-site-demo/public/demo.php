<?php

$codeToApply = [
    new \App\Middleware\Demo(),// $request
    new \App\Middleware\CSRF(),// $request
    new \App\Middleware\CSRF(),// $request
    new \App\Middleware\CSRF(),// $request
    new \App\Middleware\CSRF(),// $request
    new \App\Middleware\CSRF(),// $request
];

$routes = [
    "GET" => [
        '/' => [
            "codeToApply" => [],
            "handler" => function(\GuzzleHttp\Psr7\Request $request) : \GuzzleHttp\Psr7\Response {
                return [
                    "message" => "hello world"
                ];
                // {"message":"hello world"}
                // xml
                // serialise
            },
        ]

    ],
    "POST" => [
        "/login" => function() {
            echo "hello from login";
        }
    ]
];

$route = "/";
$method = "GET";

foreach ($routes[$method] as $k => $cb) {
    if ($k == $route) {
        $cb();
//        call_user_func($cb);
//        call_user_func_array($cb, []);


    }
}

function checkCSRF() {

}

function demoCheck() {

}

function middleware1() {
    checkCSRF();
}

function middleware2() {
    demoCheck();
}

$routes1 = [
 '1' => function() {
     checkCSRF();
     demoCheck();
     demoCheck();
     demoCheck();
     demoCheck();
 },
    '2' => function() {
     checkCSRF();
     demoCheck();
     demoCheck();
     demoCheck();
     demoCheck();
 },
    "3" => function() {
        checkCSRF();
        demoCheck();
        demoCheck();
        demoCheck();
        demoCheck();
    },



];
