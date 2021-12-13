<?php

namespace App\Controllers;

use App\Exceptions\NotFoundException;
use App\Exceptions\ValidationException;

class Login
{
    private $view;

    /**
     * @param $view
     */
    public function __construct($view)
    {
        $this->view = $view;
    }

    public function showLoginForm() {
        echo $this->view->render("login");
    }

    private function emailExistInDb($email) {
        return true;
    }

    private function validatePassword($password) {
        return $password;
    }

    public function handleForm() {
        $email = $_POST["email"] ?? throw new ValidationException("email field is not set");
        // validate via regexp that email is correct
        $password = $_POST["password"] ?? throw new ValidationException("password field is not set");
        // not empty | > 8 symbols | hard to guess

        if ($this->emailExistInDb($email)) {
            if ($this->validatePassword($password)) {
                // login
                $_SESSION["user"] = $email;

                header("HTTP/1.1 301 Moved Permanently");
                header("Location: /user");
                exit();
            } else {
                throw new ValidationException("password incorrect");
            }
        } else {
            throw new NotFoundException("user is not exist");
        }

    }
}