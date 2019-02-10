<?php

$username = $_POST['email'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {
    $basic_auth->add_user('aspaciop@rakwireless.com', 'admin');
    $_SESSION['auth_email'] = $username;
    $_SESSION['auth_password'] = $password;
    if ($basic_auth->login_test($username, $password)) {
        $_SESSION['auth_status'] = 'ACTIVE';
    } else {
        $_SESSION['auth_status'] = 'AUTH_FAILED';
    }
}

if ($_SESSION['auth_status'] === 'ACTIVE') {
    header('Location: /files/');
    exit;
}