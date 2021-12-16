<?php

namespace App\Controllers;

use App\Middleware\Authorised;

class User //implements MiddlewareSupportInterface
{
//    use Authorised {
//        before as beforeIsAuthorised;
//    }

    public function test() {
        echo "Hello ".$_SESSION['user'];
    }

//    public function before()
//    {
//        $this->beforeIsAuthorised();
//    }
}