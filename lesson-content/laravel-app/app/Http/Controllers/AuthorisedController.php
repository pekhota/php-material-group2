<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorisedController extends Controller
{
    public function private(Request $request) {
        dd(Auth::user());
    }

    public function namedRouteExample() {
        // https://laravel.com/docs/8.x/routing#named-routes
//        return redirect(route('hello'), 301);
    }
}
