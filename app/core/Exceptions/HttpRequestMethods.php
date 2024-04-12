<?php

namespace App\Core\Exceptions;

class HttpRequestMethods
{
    /**
     * @param string $allowedMethod
     * @param string|null $message
     * @return void
     */
    public static function MethodNotAllowed(string $allowedMethod = "post", string|null $message = null): void
    {
        header("HTTP/1.1 405 Method Not Allowed");
        header("Allow: ".strtoupper($allowedMethod));
        echo !is_null($message) ? $message : null;
        exit;
    }
}