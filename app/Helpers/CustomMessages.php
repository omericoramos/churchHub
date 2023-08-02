<?php


// private static $response;
if (!function_exists('errorResponse')) {
    function errorResponse($message)
    {
        $error = json_encode([
            'status' => "errors", 'message' => $message
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK | JSON_FORCE_OBJECT);
        return $error;
    }
}
if (!function_exists('sucessResponse')) {
    function sucessResponse($message)
    {
        $sucesso = json_encode([
            'status' => "success", 'message' => $message
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        return $sucesso;
    }
}
