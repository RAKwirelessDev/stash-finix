<?php

if ($_COOKIE['_AUTH_ERROR_'] !== 'sSO') {
    setcookie('_AUTH_ERROR_', 'xAF', time()+10, '/');
}

?>