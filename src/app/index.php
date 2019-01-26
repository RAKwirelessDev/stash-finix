<?php

$username = $_POST['email'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {
    $basic_auth->delete_user('admin', 'admin');
    $basic_auth->add_user('aspaciop@rakwireless.com', 'admin');
    if ($basic_auth->login_test($username, $password)) {
        header('Location: https://'.$username.':'.$password.'@'.$_SERVER['HTTP_HOST'].'/files/');
    } else {
        $xua = [true, 'Authentication Failed'];
    }
}

if (!empty($_COOKIE['_AUTH_ERROR_'])) {
    if ($_COOKIE['_AUTH_ERROR_'] === 'xAF') {
        $xua = [true, 'Basic Authentication Failed'];
    } elseif ($_COOKIE['_AUTH_ERROR_'] === 'sAG') {
        header('Location: /files/');
        exit;
    }
}

setcookie('_AUTH_ERROR_', '', time()-3600, '/');
