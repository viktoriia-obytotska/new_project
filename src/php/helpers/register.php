<?php

class Register{
    private $login;
    private $email;
    private $password;

    public function __construct($login, $email, $password){
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
    }

    public function getLogin()
    {
        return $this->login;
    }
    public function setLogin()
    {
        return $this->login;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword()
    {
        return $this->password;
    }

    public function existLogin(): bool
    {
        $sql = "SELECT count(*) as cnt_rows FROM users WHERE login = '$this->login'";
        $query = mysqli_query($GLOBALS['main_connect'], $sql);
        $result = mysqli_fetch_assoc($query);
        return (bool)$result['cnt_rows'];
    }

    public function existEmail(): bool
    {
        $sql = "SELECT count(*) as cnt_rows FROM users WHERE email = '$this->email'";
        $query = mysqli_query($GLOBALS['main_connect'], $sql);
        $result = mysqli_fetch_assoc($query);
        return (bool)$result['cnt_rows'];
    }

    public function addUser(): bool
    {
        $password = md5($_POST['password']);
        $sql = "INSERT INTO `users` (`id`, `login`, `email`, `password`) 
                VALUES (NULL, '$this->login', '$this->email', '$this->password')";
        return mysqli_query($GLOBALS['main_connect'], $sql);
    }

    public function getUser(string $userName, string $password): ?array
    {
        $password = md5($_POST['password']);
        $sql = "SELECT * FROM users
                     WHERE (login = '$userName' or email = '$userName')
                     AND password = '$password'";
        $result = mysqli_query($GLOBALS['main_connect'], $sql);
        return mysqli_fetch_assoc($result);
    }
}

