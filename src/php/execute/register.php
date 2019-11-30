<?php

require_once ROOT_DIR . '/../php/helpers/users.php';

$existLogin = existLogin($_POST['login']);
$existEmail = existEmail($_POST['email']);

if($existLogin or $existEmail){
    require_once ROOT_DIR . '/../views/register.phtml';
    die;
}

$result = addUser($_POST['login'], $_POST['email'], $_POST['password']);
if($result){
    header('Location: /views/login?register=success&login=' . $_POST['login']);
}
echo 'Error in registration';
