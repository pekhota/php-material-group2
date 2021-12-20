<?php

namespace App\Middleware;

class Demo
{
    public function before() {
        echo "Demo: Before middleware triggered!";
    }

    public function after() {
        echo "Demo: After middleware triggered!";
    }

}