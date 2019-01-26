<?php

$username = $_POST['email'];

if (!empty($username)) {
    if (in_array($username, $basic_auth->users)) {
        $xua = [true, 'Recovery Email Sent'];
    } else {
        $xua = [true, 'User Doesn\'t Exist'];
    }
}