<?php

require_once ROOT_DIR . '/../php/helpers/users.php';

$user = getUser($_POST['login'], $_POST['password']);

if(!$user){
    $error = 'wrong login or password';
    require_once ROOT_DIR . '/../views/login.phtml';
    die;
}
unset ($user['password']);
$_SESSION['auth_user'] = $user;

setcookie('old_session_id', session_id(), time() + 3600 * 24 * 7);
header('Location; /views/welcome');