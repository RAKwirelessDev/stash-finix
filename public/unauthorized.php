<?php

if ($_COOKIE['_AUTH_ERROR_'] !== 'sSO') {
    setcookie('_AUTH_ERROR_', 'xAF', time()+10, '/');
}

?>
<!DOCTYPE html>
<html><head><meta name="theme-color" content="#3498db"><meta http-equiv="refresh" content="0; URL='/'" /></head><body style="background: #3498db;"></body></html>