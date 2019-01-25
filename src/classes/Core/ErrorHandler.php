<?php

namespace Core;

class ErrorHandler
{

    public static function interrupt(string $report, int $response_code = 200) {
        http_response_code($response_code);
        header('Content-Type: text/plain');
        die($report);
    }

}