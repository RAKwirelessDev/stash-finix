<?php

setcookie('_AUTH_ERROR_', 'xFA-403', time()+10, '/');
header('Location: /', true, 303);

echo "Forbidden Access";