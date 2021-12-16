<?php

namespace App\Models;

class User
{
    private \PDO $connection;
    private $email;
    private $password;

    /**
     * @param \PDO $connection
     * @param $email
     */
    public function __construct(\PDO $connection, $email)
    {
        $this->connection = $connection;
        $this->email = $email;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = sha1($password);
    }

    public function exist() :bool {
        $stm = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
        $stm->bindParam(":email", $this->email);
        $stm->execute();

        return $stm->rowCount() > 0;
    }

    public function save():bool {
        $stm = $this->connection->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        return $stm->execute([$this->email, $this->password]);
    }

    public function load() {
        $stm = $this->connection->prepare("SELECT * FROM users WHERE email = :email");
        $stm->bindParam(":email", $this->email);
        $stm->execute();
        $row = $stm->fetch();
        $this->password = $row['password'];
        return true;
    }

    public function validatePassword(string $password) : bool
    {
        return $this->password === sha1($password);
    }
}