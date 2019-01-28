<?php

session_start();

use Core\Commons;
use Core\AssetRender;

$url_path = urldecode(Commons::url_path());
$asset_path = $_SERVER['DOCUMENT_ROOT'] . $url_path;

if (Commons::starts_with($url_path, '/_finix/private/')) {
    $_SESSION['auth_status'] = 'INTRUSION_BLOCKED';
    header('Location: /');
    exit;
}

if (Commons::starts_with($url_path, '/files/') && $_SESSION['auth_status'] !== 'ACTIVE') {
    $_SESSION['auth_status'] = 'AUTH_REQUIRED';
    header('Location: /');
    exit;
}

if (Commons::is_path_dir($url_path)) {
    if (Commons::is_path_file($url_path . 'index.php')) {
        include_once $asset_path . 'index.php';
    } else {
        include_once $_SERVER['DOCUMENT_ROOT'] . '/_finix/public/index.php';
    }
    exit;
} elseif (Commons::is_path_file($url_path)) {
    if (AssetRender::file_extension_parse($asset_path) == 'php' &&
            $asset_path != $_SERVER['SCRIPT_FILENAME']) {
        include_once $asset_path;
        exit;
    } elseif (AssetRender::file_extension_parse($asset_path) != 'php') {
        $mime_type = AssetRender::file_mime($asset_path);
        header('Content-Type: ' . $mime_type);
        header('Content-Length: ' . filesize($asset_path));
        AssetRender::file_out($asset_path);
        exit;
    }
}

http_response_code(404);