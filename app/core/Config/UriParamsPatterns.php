<?php

namespace App\Core\Config;

class UriParamsPatterns
{
    /**
     * @return string[]
     */
    public function allPattern(): array
    {
        return [
            '{slug}' => '([0-9a-zA-Z-]+)',
            '{id}' => '([0-9]+)'
        ];
    }
}