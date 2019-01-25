<?php

error_reporting(0);

$github_event = $_SERVER['HTTP_X_GITHUB_EVENT'];
$hub_signature = $_SERVER['HTTP_X_HUB_SIGNATURE'];
$deploy_secret = $_SERVER['DEPLOY_SECRET'];
$php_input = file_get_contents("php://input");
$sha1_hmac_hash = hash_hmac('sha1', $php_input, $deploy_secret);

if (!empty($github_event) && !empty($hub_signature) && $hub_signature == 'sha1='.$sha1_hmac_hash && $github_event == 'push') {
    header('Content-Type: text/plain');
    echo shell_exec("git pull --recurse-submodules && git submodule init && git submodule update");
} else {
    http_response_code(400);
    exit;
}