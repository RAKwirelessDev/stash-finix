<?php

session_start();

$_SESSION['auth_status'] = 'AUTH_END';
header('Location: /');