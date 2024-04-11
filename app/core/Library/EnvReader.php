<?php

namespace App\Core\Library;

class EnvReader
{
    public static function get($field) {
        $env = [];

        $envDir = dirname(__DIR__, 3);
        $envPath = $envDir.'/.env';

        if (!file_exists($envPath)) {
            return $env;
        }

        $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (strpos($line, '=') !== false && substr($line, 0, 1) !== '#') {
                list($key, $value) = explode('=', $line, 2);
                $env[trim($key)] = trim($value);
            }
        }

        //var_dump($env); exit;
        return $env[$field];
    }
}