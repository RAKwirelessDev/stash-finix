<?php

//setcookie('_AUTH_ERROR_', 'xUA', time()+10, '/');
//header('Location: /', true, 303);

//echo "Unauthorized Access";

header('Content-Type: text/plain');
print_r($_SERVER);