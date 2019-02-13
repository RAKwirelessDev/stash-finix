<?php

$invitation_code = $_POST['invitation_code'];
$username = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

//echo (int)!empty($invitation_code);exit;

if (!empty($invitation_code) && !empty($username) && !empty($password) && !empty($password_confirm)) {
    if ($access_keys->key_check($invitation_code)) {
        if ($password === $password_confirm) {
            $basic_auth->add_user($username, $password);
            $access_keys->delete_key($invitation_code);
        } else {
            $_SESSION['auth_status'] = 'PASSWD_CONF_ERR';
        }
    } else {
        $_SESSION['auth_status'] = 'XCODE_INVALID';
    }
}
