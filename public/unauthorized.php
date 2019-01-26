<?php

if (!empty($_COOKIE['_AUTH_ERROR_'])) {
    if ($_COOKIE['_AUTH_ERROR_'] !== 'sSO') {
        setcookie('_AUTH_ERROR_', 'xAF', time()+10, '/');
    }
}

?>