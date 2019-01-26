<?php

$username = $_POST['email'];

if (!empty($username)) {
    if (in_array($username, $basic_auth->users)) {

    } else {
        $xua = [true, 'User Doesn\'t Exist'];
    }
}