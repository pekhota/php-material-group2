<?php

namespace App\Middleware;

class Authorised
{
//    public function before() {
//        dd("before from trait class");
//        $this->authUser();
//    }

    public function authUser() {
        if (empty($_SESSION['user'])) {
            throw new \RuntimeException("Private area");
        }
    }

//    public function after() {
//
//    }

}