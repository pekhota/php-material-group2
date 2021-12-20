<?php

namespace App\Middleware;

class Authorised
{
    public function before() {
        echo "Before middleware triggered!";
//        $this->authUser();
    }

//    public function authUser() {
//        if (empty($_SESSION['user'])) {
//            throw new \RuntimeException("Private area");
//        }
//    }

    public function after() {
        echo "After middleware triggered!";
    }

}