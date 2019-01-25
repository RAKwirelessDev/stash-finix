<?php

const _ROUTES_ = [
    '/' => 'index.php',
    '/signup/' => 'signup.php',
    '/reset/' => 'reset.php',

    
    '/unauthorized/' => 'error-401.php'
    '/forbidden/' => 'error-403.php'
    '{PAGE_NOT_FOUND}' => 'error-404.php'
];