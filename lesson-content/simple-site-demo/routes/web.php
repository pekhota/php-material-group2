<?php

$appController = new \App\Controllers\Application($view);
$loginController = new \App\Controllers\Login($view);

$router->get("/", [$appController, 'index']);
$router->get("/login", [$loginController, 'showLoginForm']);
$router->get("/user", function () use ($view) {
    if (!empty($_SESSION['user'])) {
        echo "Hello ".$_SESSION['user'];
    } else {
        throw new RuntimeException("Private area");
    }
});
$router->post("/login", [$loginController, 'handleForm']);


$router->get("/subscribe", function () use ($view) {
    $content = $view->render("layout/base", [
        'header' => $view->render("layout/header"),
        'content' => $view->render("layout/subscribe"),
        'footer' => $view->render("layout/footer"),
    ]);

    echo $content;
});

$router->post("/subscribe", function () {
    $email = $_POST["email"] ?? throw new \App\Exceptions\NotFoundException();
    file_put_contents(__DIR__."/../storage/app/emails.txt", $email, FILE_APPEND);
});


$router->set404Handler(function () {
    echo "404 not found";
});
