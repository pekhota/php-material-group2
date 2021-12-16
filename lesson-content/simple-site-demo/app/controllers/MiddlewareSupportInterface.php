<?php

namespace App\Controllers;

interface MiddlewareSupportInterface
{
    public function before();
    public function after();
}