<?php

$username = $_POST['email'];

if (!empty($username)) {
    if (key_exists($username, $basic_auth->users)) {
        $xom = [true, 'Recovery Email Sent'];
    } else {
        $xom = [true, 'User Doesn\'t Exist'];
    }
}