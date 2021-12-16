<?php

namespace App\Controllers;

class Notification
{
    public function sendEmail() {
        echo "Hello ".$_SESSION['user'];
    }
}