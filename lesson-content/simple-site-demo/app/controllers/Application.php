<?php

namespace App\Controllers;

class Application
{
    private $view;

    /**
     * @param $view
     */
    public function __construct($view)
    {
        $this->view = $view;
    }

    public function index() {
        $content =       $this->view->render("layout/base", [
            'header' =>  $this->view->render("layout/header"),
            'content' => $this->view->render("layout/content"),
            'footer' =>  $this->view->render("layout/footer"),
        ]);
        echo $content;
    }
}