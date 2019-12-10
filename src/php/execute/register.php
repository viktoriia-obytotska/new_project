<?php

require_once ROOT_DIR . '/../php/helpers/register.php';

$register = new Register($_POST['login'], $_POST['email'], $_POST['password']);
$register->existLogin($_POST['login']);
$register->existEmail($_POST['email']);
if($register->existLogin() or $register->existEmail()){
    require_once ROOT_DIR . '/../views/register.phtml';
    die;
}

$result = $register->addUser();
if($result){
    header('Location: /views/login?register=success&login=' . $_POST['login']);
}
echo 'Error in registration';
