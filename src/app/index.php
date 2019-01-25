<?php

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    header('Location: https://'.$_POST['username'].':'.$_POST['password'].'@stash.rakwireless.com/files/');
}

echo $_COOKIE['_AUTH_ERROR_'];