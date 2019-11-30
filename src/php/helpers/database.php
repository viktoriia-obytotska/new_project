<?php

function getConnect($name)
{
    $config = require_once ROOT_DIR . '/../config/databases.php';
    if (!isset($config[$name])){
        echo 'error';die;
    }
    $config = $config[$name];
    return mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
}