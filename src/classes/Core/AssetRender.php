<?php

namespace Core;

class AssetRender
{

    private static $segment_size = (1024*2024)*16; // 16MB
    private static $mime_types = [
        'txt' => 'text/plain',
        'htm' => 'text/html',
        'html' => 'text/html',
        'php' => 'text/html',
        'css' => 'text/css',
        'js' => 'application/javascript',
        'json' => 'application/json',
        'xml' => 'application/xml',
        'swf' => 'application/x-shockwave-flash',
        'flv' => 'video/x-flv',

        // images
        'png' => 'image/png',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'gif' => 'image/gif',
        'bmp' => 'image/bmp',
        'ico' => 'image/vnd.microsoft.icon',
        'tiff' => 'image/tiff',
        'tif' => 'image/tiff',
        'svg' => 'image/svg+xml',
        'svgz' => 'image/svg+xml',

        // archives
        'zip' => 'application/zip',
        'rar' => 'application/x-rar-compressed',
        'exe' => 'application/x-msdownload',
        'msi' => 'application/x-msdownload',
        'cab' => 'application/vnd.ms-cab-compressed',

        // audio/video
        'mp3' => 'audio/mpeg',
        'qt' => 'video/quicktime',
        'mov' => 'video/quicktime',

        // adobe
        'pdf' => 'application/pdf',
        'psd' => 'image/vnd.adobe.photoshop',
        'ai' => 'application/postscript',
        'eps' => 'application/postscript',
        'ps' => 'application/postscript',

        // ms office
        'doc' => 'application/msword',
        'rtf' => 'application/rtf',
        'xls' => 'application/vnd.ms-excel',
        'ppt' => 'application/vnd.ms-powerpoint',
        'docx' => 'application/msword',
        'xlsx' => 'application/vnd.ms-excel',
        'pptx' => 'application/vnd.ms-powerpoint',

        // open office
        'odt' => 'application/vnd.oasis.opendocument.text',
        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
    ];
    private static $operation_files = [
        'php',
        'htaccess',
        'htpasswd'
    ];

    public static function file_mime(string $file_name) {
        $idx = self::file_extension_parse($file_name);

        if (isset(self::$mime_types[$idx] )) {
            return self::$mime_types[$idx];
        } else {
            return 'application/octet-stream';
        }
    }

    public static function file_extension_parse(string $file_name) {
        $idx = explode('.', $file_name);
        $count_explode = count($idx);
        return strtolower($idx[$count_explode-1]);
    }

    public static function file_out(string $file_path) {
        if (!self::is_file_downloadable($file_path)) {
            ErrorHandler::interrupt('sys::FILE_ACCESS_DENIED', 400);
        }
        set_time_limit(0);
        $h = @fopen($file_path, "rb");
        while (!feof($h)) {
            print(fread($h, self::$segment_size));
            flush();
            if (connection_status()!=0) {
                @fclose($file_path);
                exit;
            }
        }
        @fclose($h);
        exit;
    }

    public static function is_file_downloadable(string $file_path) {
        $idx = self::file_extension_parse($file_path);
        if (in_array($idx, self::$operation_files)) {
            return false;
        }
        return true;
    }

}