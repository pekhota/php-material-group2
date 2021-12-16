<?php

namespace App\Controllers;

use App\Exceptions\NotFoundException;
use App\Exceptions\ValidationException;
use App\Models\User;
use Framework\View;
use PDO;

class Login
{
    private View $view;
    private PDO $connection;

    /**
     * @param View $view
     * @param PDO $connection
     */
    public function __construct(View $view, PDO $connection)
    {
        $this->view = $view;
        $this->connection = $connection;
    }


    public function showSignupForm() {
        echo $this->view->render("signup");
    }

    public function handleSignUpForm() {
        $email = $_POST["email"] ?? throw new ValidationException("email field is not set");
        $password = $_POST["password"] ?? throw new ValidationException("password field is not set");

        $user = new User($this->connection, $email);
        !$user->exist() ?: throw new ValidationException("user already registered");
        $user->setPassword($password);
        $user->save() ?: throw new \RuntimeException("can't save user");

        redirect("/");
    }

    public function showLoginForm() {
        echo $this->view->render("login");
    }

    public function handleLoginForm() {
        $email = $_POST["email"] ?? throw new ValidationException("email field is not set");
        $password = $_POST["password"] ?? throw new ValidationException("password field is not set");

        $user = new User($this->connection, $email);
        $user->exist() ?: throw new ValidationException("user not exist");
        $user->load();

        $user->validatePassword($password) ?: throw new ValidationException("password incorrect");

        $_SESSION["user"] = $email;
        redirect("/user");
    }

    private function validatePassword($password) {
        dd($password);
        return $password;
    }
}