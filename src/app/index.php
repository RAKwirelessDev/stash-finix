<?php

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {
    $basic_auth->add_user('admin', 'admin');
    if ($basic_auth->login_test($username, $password)) {
        header('Location: https://'.$username.':'.$password.'@stash.rakwireless.com/files/');
    } else {
        $xua = true;
    }
}

if (!empty($_COOKIE['_AUTH_ERROR_'])) {
    if ($_COOKIE['_AUTH_ERROR_'] === 'xAF') {
        $xua = true;
    } elseif ($_COOKIE['_AUTH_ERROR_'] === 'sAG') {
        header('Location: /files/');
        exit;
    }
}

setcookie('_AUTH_ERROR_', '', time()-3600, '/');
