<?php

require_once ROOT_DIR . '/../php/helpers/register.php';

$user = new Register($_POST['login'], $_POST['email'], $_POST['password']);
$user->getUser($_POST['login'], $_POST['password']);
if(!$user){
    $error = 'wrong login or password';
    require_once ROOT_DIR . '/../views/login.phtml';
    die;
}
