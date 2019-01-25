<?php


setcookie('_AUTH_ERROR_', 'xFA-403', time()+10);
header('Location: /');