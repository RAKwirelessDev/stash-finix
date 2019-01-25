<?php

setcookie('AUTH_ERROR_', 'xUA-401', time()+10);
header('Location: /');

echo "Unauthorized Access";