<?php

etcookie('_AUTH_ERROR_', 'xUA', time()+10, '/');
header('Location: /', true, 303);

echo "Unauthorized Access";