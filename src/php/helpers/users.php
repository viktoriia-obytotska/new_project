<?php

function existLogin(string $login): bool
{
    $sql = "SELECT count(*) as cnt_rows FROM users WHERE login = '$login'";
    $query = mysqli_query($GLOBALS['main_connect'], $sql);
    $result = mysqli_fetch_assoc($query);

    return (bool)$result['cnt_rows'];
}

function existEmail(string $email): bool
{
    $sql = "SELECT count(*) as cnt_rows FROM users WHERE email = '$email'";
    $query = mysqli_query($GLOBALS['main_connect'], $sql);
    $result = mysqli_fetch_assoc($query);

    return (bool)$result['cnt_rows'];
}

function addUser(string $login, string $email, string $password): bool
{
    $password = md5($password);
   $sql = "INSERT INTO `users` (`id`, `login`, `email`, `password`) 
                VALUES (NULL, '$login', '$email', '$password')";
   return mysqli_query($GLOBALS['main_connect'], $sql);
}

function getUser(string $userName, string $password): ?array
{
    $password = md5($password);
    $sql = "SELECT * FROM users
                     WHERE (login = '$userName' or email = '$userName')
                     AND password = '$password'";
    $result = mysqli_query($GLOBALS['main_connect'], $sql);
    return mysqli_fetch_assoc($result);
}