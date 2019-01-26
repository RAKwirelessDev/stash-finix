<?php

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    header('Location: https://'.$_POST['username'].':'.$_POST['password'].'@stash.rakwireless.com/files/');
    exit;
}

if (!empty($_COOKIE['_AUTH_ERROR_'])) {
    if ($_COOKIE['_AUTH_ERROR_'] === 'xUA') {
        $xua = true;
    }
}

setcookie('_AUTH_ERROR_', '', time()-3600, '/');
