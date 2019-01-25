<?php

//setcookie('_AUTH_ERROR_', 'xUA-401', time()+10, '/');
//header('Location: /', true, 303);

//echo "Unauthorized Access";

echo $_SERVER['PHP_AUTH_USER'];